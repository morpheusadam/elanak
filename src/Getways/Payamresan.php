<?php

namespace Morpheusadam\Elanak\Getways;

use App\Http\Controllers\System\SettingsController;
use App\Models\SMS;

class Payamresan
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
   
    }

    public function sendPattern($patternCode, $patternValues, $to)
    {
        return;
    }
}
