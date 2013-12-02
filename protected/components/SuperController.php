<?php

/**
 * abstract base controller. All controllers should inherit from this one
 */

abstract class SuperController extends CController {
    public $layout = "main";
    public $assetsUrl;
    public $user;
    /*public function beforeAction($action) {
     parent:: beforeAction($action);
     $this->pageTitle = "";
     $this->user = Yii::app()->user;

     if($this->user->isGuest){
     $this->layout = "guest";
     }

     if(
     !$this->user->isGuest &&
     "settings" != Yii::app()->controller->action->id &&
     "auth" != Yii::app()->controller->id &&
     "public" != Yii::app()->controller->id
     ){
     if(!Yii::app()->user->registrationDone()){
     Yii::app()->user->setFlash('settings-error', "Before accessing Wine-Book, please fill all the fields and chose a password.");
     $this->redirect('/page/settings');
     }
     }
     return true;
     }
     */
    public function init() {
        //on va switcher a cloudflare
        //$check= new MaliciousBotsChecker();
        $assetsPath = Yii::getPathOfAlias('application.assets');
        $assetsUrl = Yii::app() -> assetManager -> publish($assetsPath, false, -1, true);
        $this -> assetsUrl = $assetsUrl;
        parent::init();
    }

    protected function getDefaultModel() {
        throw new CHttpException(404);
    }

    protected function renderJson($data) {
        header('Content-type: application/json');
        echo CJSON::encode($data);
        Yii::app() -> end();
    }

    protected function requiredParameters($parametersNames) {
        $parameters = array();
        foreach ($parametersNames as $parameterName) {
            if (isset($_POST[$parameterName])) {
                $parameters[$parameterName] = $_POST[$parameterName];
            } else {
                throw new CException("Parameter '$parameterName' missing.");
            }
        }
        return $parameters;
    }

    protected function requiredParameter($parameterName) {
        $params = $this -> requiredParameters(array($parameterName));
        return $params[$parameterName];
    }
}
