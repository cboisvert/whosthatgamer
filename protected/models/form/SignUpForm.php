<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignUpForm extends CFormModel
{
    public $email;
    public $password;
    public $repassword;



    public function rules()
    {
        return array(
            // username and password are required
            array('email,password,repassword', 'required'),
        );
    }

    public function save(){
        $acccount = new Account();
        $acccount->email = $this->email;
        $acccount->setPassword($this->password);

        if($acccount->save())
            return true;
        else
            throw new exception("ERROR IN MODEL SAVE");
    }


}
