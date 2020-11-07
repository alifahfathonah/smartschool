<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pushnotification
{

    public $CI;
    public $API_ACCESS_KEY = "AAAA4LAalFc:APA91bF0tZhZMC2HcSSjg6pE8DCmpxwPI2u6sTRAHWYVHx8dIl9xgUkdkSDHsT13hrSWw0HXqUSlgPLVASWAed3OtrRFdknNQcS0OR0WyzByrnRZ5GTC8V7VoZGq1M_ZF61es_gS7gJN";
    public $fcmUrl = "https://fcm.googleapis.com/fcm/send";

    public function __construct()
    {
       $this->CI = &get_instance();

    }

    public function send($tokens,$msg)
    {

        

        if(!empty($tokens)){

        $message="Test Notification";
        $notificationData = ["message" => $msg];

        $fcmNotification = [
            'registration_ids' => $tokens, //multple token array
            // 'to'   => $token, //single token
            'data' => $notificationData,
        ];

        $headers = [
            'Authorization: key=' . $this->API_ACCESS_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result;
    }
 }

}
