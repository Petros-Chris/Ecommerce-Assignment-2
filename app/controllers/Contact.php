<?php
namespace app\controllers;

require('../models/Message.php');

use app\models\Message;

class Contact {

   public function passAlong(){
        $message = new Message();

        $info = $this->info(); 
        $message->write($info);

        header('Location: /Contact/read');
        exit; 

    }

    function info(){
        $email = $_POST["email"];
        $message = $_POST['message'];
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $formdata = [
           'email' => $email,
           'message' => $message,
           'ip' => $ip,
           ];

        return $formdata;
    }
}

$con = new Contact();
$con->passAlong();

        






