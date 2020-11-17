<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function send()
    {
        define('API_ACCESS_KEY','AAAA9g3hmXo:APA91bHIRa6ZBf1HKU8KTsQ1UDjWWNq-OwsCKD9L1apL1yxohBsu_x5LLzgi7lPss-CbCD1lnaKOCIxO6pzzvgcpxmYKOfCZnSSwWcrQoW7_mbUBGjZ1iBCPyySUnZLkcinAYI557cvS');
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        $notification = [
            'title' =>'O-BAZAAR ORDER',
            'body' => 'O-BAZAAR ORDER',
            'sound' => 1,
            "sound" => "default",
            "click_action"=> "Open_URI"
        ];

       $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

       $token = "f6aeUXFWSNS_J-WIIR4hus:APA91bGDWPcAVOsMVhSSUtyxb9CDwJBBVbqv5ok8wmz06U-2a7kTpqyZkBiby4fbP7JnUcTbJM9diJ4ie1oJFiK2UirBmCNyYE1twUjt769z339EMfpdTNgt9uDKVLGKBmy9l3X2xRBR";

        $fcmNotification = [
            'to' => 'dCUTpyBFSn2rSJigtR1E7W:APA91bECE0kF8IEeUvqx6BPbCfZ3yhowcFCg0lEkVX7_IfcwH9z1gPiSLeT_Y7SdWFjojKvXl1NNpVqa1Jc4ujUzcO7-zBw0-FmcHmOamFF8VgDtHW1N9tXk0yc2Q4LG2cmF0JLPmmHE',
            'notification' => $notification,
            'data' => [
                 "uri" =>  "https://o-bazaar.com/merchant/orders/edit/4",
                  "msg_type" =>"Hello ",
                  "request_id" =>7,
                  "image_url" => 'https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png',
                  "user_name" => "abdulwahab",
                  "msg" => "msg"
            ]
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);
    }
}
