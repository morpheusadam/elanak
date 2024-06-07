<?php

namespace Morpheusadam\Elanak\Getways;

 
class Kavenegar
{
    private $api;

    private $sender;

    public function __construct($api, $sender)
    {
        $this->api = $api;

        $this->sender = $sender;
    }

    public function send($to, $text)
    {
  
        try {
            $api = new \Kavenegar\KavenegarApi($this->api);
            $result =$api->Send( $this->sender,array($to) , $text);
            if ($result) {
                foreach ($result as $r) {
                    echo "messageid = $r->messageid";
                    echo "message = $r->message";
                    echo "status = $r->status";
                    echo "statustext = $r->statustext";
                    echo "sender = $r->sender";
                    echo "receptor = $r->receptor";
                    echo "date = $r->date";
                    echo "cost = $r->cost";
                }
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            return $e->errorMessage();
        
        }
    }


    public function sendPattern($patternCode, $patternValues, $to)

    {
        try {
            $api = new \Kavenegar\KavenegarApi( $this->api );


            $receptor = $to;
            $token =$patternValues;
            $token2 = $patternValues;
            $token3 = $patternValues;
            $template = $patternCode;

            $result = $api->VerifyLookup($receptor, $token, $token2, $token3, $template, $type = null);
            if ($result) {
                foreach ($result as $r) {
                    echo "messageid = $r->messageid";
                    echo "message = $r->message";
                    echo "status = $r->status";
                    echo "statustext = $r->statustext";
                    echo "sender = $r->sender";
                    echo "receptor = $r->receptor";
                    echo "date = $r->date";
                    echo "cost = $r->cost";
                }
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }
}
