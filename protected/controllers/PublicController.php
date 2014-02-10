<?php

class PublicController extends SuperController
{
    public $layout = "home";
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $model = new LoginForm();
        $signUpModel = new SignUpForm();
		$this->render('index',array("model"=>$model,"signUp"=>$signUpModel));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
        Utils::echoDollar("WHHHATTT");
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionSignup(){
        $model = new SignUpForm();
        if(isset($_POST["SignUpForm"])){
            $model->setAttributes($_POST["SignUpForm"]);
            if($model->validate() && $model->save()){
                $this->render("success");
            }
            else{
                $this->render("index",array("signUp"=>$model));
            }
        }
        else{
            $model = new LoginForm();
            $signUpModel = new SignUpForm();
            $this->layout = "home";
            $this->render('success',array("model"=>$model,"signUp"=>$signUpModel));
        }

    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                $user = Yii::app()->user->getAccount();
                Utils::echoDollar($user);
                if($user->status == Account::STATUS_INFO)
                    $this->redirect("/account/info");
                else if($user->status == Account::STATUS_ACTIVE)
                	$this->redirect("/dashboard");
                else
                	throw new CHttpException(1,"Not able to log in");
            }
            else
                throw new CHttpException(1,"Not able to log in");
		}

		$signUpModel = new SignUpForm();
		$this->render('index',array('model'=>$model,"signUp"=>$signUpModel));
	}

    public function actionConfirm($id){
        $criteria = new EMongoCriteria();
        $criteria->id = (int)$id;
        $account = Account::model()->find($criteria);

        if($account){
            $account->status = Account::STATUS_INFO;
            if($account->save())
                $this->render("confirm");
            else
                throw new CHttpException(1,"Your account couldn't be save. We're sorry.");
        }
        else
            throw new CHttpException(1,"This account doesn't exist.");
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}