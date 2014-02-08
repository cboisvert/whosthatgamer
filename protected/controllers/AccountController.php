<?php

class AccountController extends SuperController
{

    public $layout = "main";

    public function actionInfo(){
        $model = new InfoForm();
        if(isset($_POST["InfoForm"])){
            $model->attributes = $_POST["InfoForm"];
            if($model->validate() && $model->save()){
                $this->redirect("/dashboard");
            }
        }
        $account = Yii::app()->user->getAccount();
        $model->email = $account->email;
        $this->render("info",array("model"=>$model));
    }
}