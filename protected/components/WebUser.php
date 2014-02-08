<?php

class WebUser extends CWebUser {


	public function getId() {
		return (int)parent::getId();
		//just to make sure it return an integer
	}

	private $_model;

	public function getAccount() {
		if ($this -> _model === null)
			$this -> _model = Account::model() -> findByPk($this -> getId());
		return $this -> _model;
	}

	public function registrationDone() {
		$model = $this -> getAccount();
		if ($model) {
			$data = $model -> getAttributes();
			// Check Data validation
			if ($data['firstname'] == "" || $data['lastname'] == "" || $data['country'] == null || $data['country'] == "" || $data['email'] == "" || $data['yearOfBirth'] == "0" || $data['monthOfBirth'] == "0" || $data['dayOfBirth'] == "0" || $data['gender'] == "" || !$model -> hasPassword()) {
				return false;
			} else {
				return true;
			}
		}
		return false;
	}

	private $_avatar;
	public function getAvatar($size="original") {
		if ($this -> _avatar === null) {
			$idAvatar = $this -> getState('_id_avatar');
			if ($idAvatar === null) {
				$model = $this -> getAccount();
				if ($model === null)
					return null;
				$idAvatar = $model -> id_avatar;
				if ($idAvatar === null)
					return Yii::app()->controller->assetsUrl."/images/defaultprofile.jpg";
				$this -> setState('_id_avatar', $idAvatar);
			}
			$this -> _avatar = Images::model() -> findByPk((int)$idAvatar);
		}
		return $this -> _avatar->url($size);
	}

	public function reloadAvatar() {
		$this -> _model = null;
		$this -> _avatar = null;
		$this -> setState('_id_avatar', null);
	}

	public function getIsAdmin() {
		return $this -> getState('_isAdmin', false);
	}

	public function guestFilter() {
		if ($this -> getIsGuest())
			$this -> loginRequired();
	}


	public function adminFilter() {
		$this -> guestFilter();
		if (!$this -> getIsAdmin())
			throw new CHttpException(403, "Access denied");
	}

    public function isAdmin(){
        $role = Access::getRole();
            
        if($role == "Creator" || $role == "Admin")
            return true;
        else{
            Yii::app()->controller->redirect('/dashboard/index');
        }
            

    }
}
