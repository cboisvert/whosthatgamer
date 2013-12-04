<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, password', 'required'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $error = $this->_identity->authenticate();
            if($error == UserIdentity::ERROR_PASSWORD_INVALID){
                $this->addError('password','Incorrect password.');
            }

            else if($error == UserIdentity::ERROR_PASSWORD_INVALID){
                $this->addError('email','Incorrect username');
            }

            else if($error == UserIdentity::ERROR_NONE){
                $duration = 3600*24*1; // 30 days
                $retour = Yii::app()->user->login($this->_identity,$duration);
                return true;
            }

        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            $retour = Yii::app()->user->login($this->_identity,$duration);
            return $retour;
        }
        else
            return false;
    }
}
