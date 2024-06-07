<?php

namespace Morpheusadam\Elanak\Getways;

use Melipayamak\MelipayamakApi;

class Ippanel
{
    private $api;

    private $sender;

    private $url = "https://api2.ippanel.com/api/v1/";

    public function __construct($api, $sender)
    {
        $this->api = $api;

        $this->sender = $sender;
    }

    public function send($to, $text)
    {
        $url = 'https://api2.ippanel.com/api/v1/sms/send/webservice/single';
        $apiKey = $this->api;
        $data = array(
            "recipient" => array($to),
            "sender" => $this->sender,
            "message" => $text,
        );
    
        try {
            $client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/json', 'apikey' => $apiKey]]);
            $response = $client->post($url, ['body' => json_encode($data)]);
    
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $reason = $response->getReasonPhrase();
                $body = json_decode($response->getBody()->getContents(), true);
    
                return [
                    'status_code' => $statusCode,
                    'reason' => $reason,
                    'error_message' => $body['error_message'] ?? '',
                ];
            }
    
            return $e->getMessage();
        }
    }
    

    public function sendPattern($patternCode, $patternValues, $to)
    {
        $url = 'https://api2.ippanel.com/api/v1/sms/pattern/normal/send';
        $apiKey = $this->api;
        $data = array(
            "code" =>  $patternCode,
            "sender" => $this->sender,
            "recipient" => $to,
            "variable" =>  $patternValues
        );
    
        try {
            $client = new \GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/json', 'apikey' => $apiKey]]);
            $response = $client->post($url, ['body' => json_encode($data)]);
    
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $reason = $response->getReasonPhrase();
                $body = json_decode($response->getBody()->getContents(), true);
    
                return [
                    'status_code' => $statusCode,
                    'reason' => $reason,
                    'error_message' => $body['error_message'] ?? '',
                ];
            }
    
            return $e->getMessage();
        }
    }
    
}
