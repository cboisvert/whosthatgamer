<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate(){
        $user = $this->getUser();
		if(!isset($user->email))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
		else{
            $this->errorCode=self::ERROR_NONE;
            Yii::app()->user->setState("id",$user->id);
        }

		return $this->errorCode;
	}

    private function getUser(){
        $criteria = new EMongoCriteria();
        $criteria->email = $this->username;
        return Account::model()->find($criteria);
    }
}