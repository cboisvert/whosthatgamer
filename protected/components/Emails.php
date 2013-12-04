<?php

class Emails
{

    public static function sendRegisterEmail($email,$id){
        $url = Yii::app()->createAbsoluteUrl('public/confirm').'/'.$id;
        utils::echoDollar($url);
        $message = new YiiMailMessage();
        $message->view = "default"; // view obligatoire
        $message->setBody(array("message"=>"<h3>Hey you,</h3><p>So you can access you account and begin making memory, play with a lot of people and maybe even learn an other language so you can play with people from accross the world, you need to confirm your email: <a href=$url>Confirm me right now</a></p>"),"text/html");
        $message->addTo($email);
        $message->subject = "Email confirmation";
        $message->from = "carl.boisvert@hotmail.com"; //must be a valid email address

        Yii::app()->mail->send($message);

    }
}