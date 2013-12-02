<?php

class Account extends EMongoDocument
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DELETED = 'deleted';
    const STATUS_INACTIVE = 'inactive';
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $id_image;
    public $city;
    public $country;
    public $status=self::STATUS_ACTIVE;
    public $creation_time;
    public $update_time;
    //Password
    public $hash_password;
    public $salt_password;
    private $_password;

    //forgot password
    public $timeToLive;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getCollectionName()
    {
        return 'accounts';
    }

    public function validatePassword($password)
    {
        return $this->hash_password === $this->hashPassword($password);
    }

    protected function hashPassword($password)
    {
        return sha1($this->salt_password.$password);
    }

    public function setPassword($password)
    {
        $this->_password=$password;
        $this->hash_password = $this->hashPassword($password);
    }
    public function getPassword()
    {
        return $this->_password;
    }
    protected function beforeSave()
    {
        if($this->isNewRecord){
            $this->id=EDMSSequence::nextVal('accountId');
        }
        return parent::beforeSave();
    }

    public function primaryKey()
    {
        return 'id';
    }
    public function getFullname()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function afterConstruct()
    {
        parent::afterConstruct();
        $this->salt_password = md5(rand(10000,99999));
    }

    public function createHash(){
        $hash = md5(rand(238, 9283492));
        $this->hash_password = $hash;
    }

    public function setTimeToLive()
    {
        $this->timeToLive = time() + 600;
    }

    public function getHash(){
        $this->createHash();
        $this->setTimeToLive();
        $this->save();
        return $this->hash_password;
    }

    public function isValid($email, $hash){
        $valid = $this->findByAttributes(array(
            'email' => $email,
            'hash' => $hash
        ));

        if($valid){
            if($valid->timeToLive > time()){
                return true;
            }
        }
        return false;
    }

    public function listProfile(){
        $criteria = new EMongoCriteria();
        $criteria->id_account = $this->id;
        $access = Access::model()->findAll($criteria);
        $access_final = array();
        foreach($access as $profile){
            $criteria = new EMongoCriteria();
            $criteria->id = $profile->id_profile;
            $person = Profile::model()->find($criteria);
            $access_final[] = $person;
        }
        $criteria = new EMongoCriteria();
        $criteria->creation_user = Yii::app()->user->getModel()->id;
        $access_final[] = Profile::model()->find($criteria);

        return $access_final;
    }

    public function listPermission(){
        $criteria = new EMongoCriteria();
        $criteria->id_profile = Yii::app()->user->getProfile()->id;
        $access = Access::model()->findAll($criteria);
        $access_final = array();
        foreach($access as $profile){
            $criteria = new EMongoCriteria();
            $criteria->id = $profile->id_account;
            $person = Account::model()->find($criteria);
            $access_final[] = array("id"=>$profile->id,"email"=>$person->email,"name"=>$person->firstname.' '.$person->lastname,"role"=>$profile->role,"active"=>$profile->active);
        }
        return $access_final;
    }

    public static function setStatus($desired_status){
        $criteria = new EMongoCriteria();
        $criteria->id = Yii::app()->user->getModel()->id;
        $account = Account::model()->find($criteria);
        $account->status = $desired_status;
        $account->save();
    }

    public static function getFullNameById($id){
        $criteria = new EMongoCriteria();
        $criteria->id = (int)$id;
        $account = Account::model()->find($criteria);
        $fullname = $account->firstname . " " . $account->lastname;

        return $fullname;
    }

    public function updateSettings($form){
        $this->firstname = $form->firstname;
        $this->lastname = $form->lastname;
        $this->email = $form->email;
        $this->paypal_email = $form->paypal_email;
        $this->save();
    }
}