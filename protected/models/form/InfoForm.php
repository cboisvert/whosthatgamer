<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class InfoForm extends CFormModel
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $repassword;
    public $age;
    public $id_image;
    public $city;
    public $country;
    public $psnAccount;
    public $liveAccount;
    public $nintendoAccount;
    public $steamAccount;



    public function rules()
    {
        return array(
            // username and password are required
            array('firstname,lastname,country,city,email,password,repassword', 'required'),
            array('email','email'),
            array('email','emailIsUnique'),
            array('password', 'compare', 'compareAttribute'=>'repassword'),
            array('password','length','min'=>6),
            array('age', 'compare', 'operator'=>'>=',"compareValue"=>0),
            array('age,id_image,psnAccount,liveAccount,nintendoAccount,steamAccount','safe'),
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
            }
        }
    }

    public function save(){
        $account = Yii::app()->user->getAccount();
        $account->firstname = $this->firstname;
        $account->lastname = $this->lastname;
        $account->email = $this->email;
        $account->setPassword($this->password);
        $account->id_image = 0;
        $account->city = $this->city;
        $account->country = $this->country;
        $account->psnAccount = $this->psnAccount;
        $account->liveAccount = $this->liveAccount;
        $account->nintendoAccount = $this->nintendoAccount;
        $account->steamAccount = $this->steamAccount;
        $account->status = Account::STATUS_ACTIVE;

        Utils::echoDollar($account);
        Utils::echoDollar($account->save());

        if(!$account->save())
            return false;
        return true;
    }

    public function attributeLabels()
    {
        return array(
            "firstname"=>"Firstname",
            "lastname"=>"Lastname",
            "email"=>"Email",
            "password"=>"Password",
            "repassword"=>"Re-Password",
            "age"=>"Age",
            "id_image"=>"Profile picture",
            "city"=>"City",
            "country"=>"Country",
            "psnAccount"=>"PSN account",
            "liveAccount"=>"Live account",
            "nintendoAccount"=>"Nintendo account",
            "steamAccount"=>"Steam account",
        );
    }




}
