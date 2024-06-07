<?php

namespace Morpheusadam\Elanak\Getways;

use Melipayamak\MelipayamakApi;

class Melipayamak
{
    private $api;

    private $sender;

    public function __construct($api, $sender)
    {
        $this->api = $api;

        $this->sender = $sender;
    }

    public function send($text, $to)
    {
        try {
            list($phone, $api) = explode('|', $this->api);


            $to = array($to);
            foreach ($to as $number) {
                $data = array(
                    'username' => "$phone",
                    'password' => "$api",
                    'to' => $number,
                    'from' => "50004001132205",
                    "text" => $text
                );
               
                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST','https://rest.payamak-panel.com/api/SendSMS/SendSMS',[
                    'form_params'=>$data,
                ]);
                return json_decode($response->getBody()->getContents(), true);
            }
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
        list($phone, $api) = explode('|', $this->api);
    
        if (!is_array($patternValues)) {
            return 'Invalid patternValues: must be an associative array';
        }
    
        $patternValues = implode(';', $patternValues);
    
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber', [
                'form_params' => [
                    'username' => $phone,
                    'password' => $api,
                    'text' => $patternValues,
                    'to' => $to,
                    'bodyId' => $patternCode
                ]
            ]);
    
            return response()->json(json_decode($response->getBody()->getContents(), true));
    
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
 