<?php

class DashboardController extends SuperController
{

    public $layout = "main";

    public function actionIndex(){
		// Vars
		$gamertag = 'DenisGrenier';

		/* 
			Would be better to use cURL, but for briefness of code, using file_get_contents
		*/

		// Get profile information
		//$profile = json_decode(file_get_contents('http://www.xboxleaders.com/api/profile.json?gamertag='.$gamertag));
		//Utils::echoDollar($profile);
	  	//$profile = $profile->data;
		// Get game information
		/*$games = json_decode(file_get_contents('http://www.xboxleaders.com/api/games.json?gamertag='.$gamertag));
		Utils::echoDollar($game,true);
		$games = $games->data;*/

        //new Api();

        $profile = Yii::app()->api->xbox()->getProfile($gamertag);
        Utils::echoDollar($profile);
        $games = Yii::app()->api->xbox()->getGames($gamertag)->games;


        $this->render("index",array("profile"=>$profile,"games"=>$games));
    }
}