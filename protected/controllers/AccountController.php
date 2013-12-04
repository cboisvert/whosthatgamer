<?php

class PublicController extends SuperController
{

    public $layout = "main";
    public function actionInfo(){
        $model = new InfoForm();
        $this->render("info",array("model"=>$model));
    }
}