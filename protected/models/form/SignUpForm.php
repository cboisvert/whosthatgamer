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
            array('email','email'),
            array('email','emailIsUnique'),
            array('password', 'compare', 'compareAttribute'=>'repassword'),
            array('password','length','min'=>6),

        );
    }

    public function emailIsUnique($attribute,$params)
    {
        //on met le email en minuscule et on enlève les espaces superflus
        $email = $this->$attribute = trim(strtolower($this->$attribute));
        //vérification si le email existe déjà
        $criteria = new EMongoCriteria();
        $criteria->email = $email;
        $account = Account::model()->find($criteria);
        if($account!==null)
        {
            if($account->status===Account::STATUS_ACTIVE)
                $this->addError($attribute,'This email have already been used.');
            else if($account->status===Account::STATUS_INACTIVE)
            {
                $this->addError($attribute,'This account have been desactivated. Please contact us for more information.');
                Emails::sendRegistrationConfirmation($email);
            }
            else if($account->status===Account::STATUS_PENDING){
                $this->addError($attribute,'You must confirme your email. We have send another confirmation email to your email address.');
                Emails::sendRegisterEmail($this->email,$account->id);
            }
        }
    }

    public function attributeLabels()
    {
        return array(
            "email"=>"Vous devez remplir le "
        );
    }

    public function save(){
        $account = new Account();
        $account->email = $this->email;
        $account->setPassword($this->password);
        $account->status = Account::STATUS_PENDING;

        if($account->save()){
            Emails::sendRegisterEmail($this->email,$account->id);
            return true;
        }

        else
            throw new exception("ERROR IN MODEL SAVE");
    }


}
