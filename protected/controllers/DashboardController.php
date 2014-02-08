<?php

class DashboardController extends SuperController
{

    public $layout = "main";

    public function actionIndex(){
        $this->render("index");
    }
}