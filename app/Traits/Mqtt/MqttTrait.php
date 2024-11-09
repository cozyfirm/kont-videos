<?php

namespace App\Traits\Mqtt;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpMqtt\Client\Facades\MQTT;

trait MqttTrait{

    /**
     * @return void
     * Get an IP ADDR from HTTP Request
     * Logs data on exception thrown
     */
    public function publishMessage($topic, $code, $data, $uri = null): void{
        try{
            $message = [
                'code' => $code,
                'data' => $data,
                'uri' => $uri
            ];

            MQTT::publish($topic, json_encode($message, JSON_UNESCAPED_UNICODE ));
        }catch (\Exception $e){
            Log::channel('mqtt')->info($e->getMessage());
        }
    }

    /**
     * @param $topic - APi token of user
     * @param User|Auth $sender - User that sends notification
     * @param $code
     * @param $message
     * @return void
     *
     * Codes of messages:
     *
     *  1. 2010: New message from user
     */
    public function pushNotification($topic, User | Auth $sender, $code, $message): void{
        try{
            /* Remove api_token */
            $sender->api_token = time();

            $message = [
                'code' => $code,
                'data' => [
                    'sender' => $sender,
                    'message' => $message
                ]
            ];

            MQTT::publish($topic, json_encode($message, JSON_UNESCAPED_UNICODE ));
        }catch (\Exception $e){
            Log::channel('mqtt')->info($e->getMessage());
        }
    }
}
