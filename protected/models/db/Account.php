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
}