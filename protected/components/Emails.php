<?php

class Emails
{
    public static function sendRegisterEmail($email,$id){
        $message = new YiiMailMessage();
        $message->setBody(array("message"=>"test"),"text/html");
        $message->addTo($email);
        $message->subject = "Please confirm your email";
        $message->from = Yii::app()->params['postmaster'];

        Yii::app()->mail->send($message);
    }
}