<?php

class PublicController extends SuperController
{
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
        $this->layout = "home";
		$this->render('index',array("model"=>$model,"signUp"=>$signUpModel));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
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
        }
        else{

        }
        $model = new LoginForm();
        $signUpModel = new SignUpForm();
        $this->layout = "home";
        $this->render('index',array("model"=>$model,"signUp"=>$signUpModel));
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;


		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
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