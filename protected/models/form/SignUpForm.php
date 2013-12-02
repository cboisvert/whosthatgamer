<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignUpForm extends CFormModel
{
    public $username;
    public $password;
    public $repassword;
    public $email;


    public function rules()
    {
        return array(
            // username and password are required
            array('username, password,repassword,email', 'required'),
        );
    }


}
