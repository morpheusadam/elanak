<?php

namespace Morpheusadam\Elanak;

use Morpheusadam\Elanak\Getways\Ippanel;
use Morpheusadam\Elanak\Getways\Kavenegar;
use Morpheusadam\Elanak\Getways\Melipayamak;

/**
 * Class Elanak
 *
 * This class is responsible for sending SMS messages using different providers.
 *
 * @package Morpheusadam\Elanak
 */
class Elanak
{
    private $to;
    private $text;
    private $provider;
    private $patternCode;
    private $patternValues;
    private $sender;
    private $api;

    /**
     * Set the text of the SMS message.
     *
     * @param string $text
     * @return $this
     */
    public function send($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Set the recipient(s) of the SMS message.
     *
     * @param mixed $numbers
     * @return $this
     */
    public function to($numbers)
    {
        $this->to = $numbers;
        return $this;
    }

    /**
     * Set the provider to be used for sending the SMS message.
     *
     * @param string $provider
     * @return $this
     */
    public function via($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * Set the sender of the SMS message.
     *
     * @param string $sender
     * @return $this
     */
    public function from($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Set the API key to be used for the provider.
     *
     * @param string $api
     * @return $this
     */
    public function api($api)
    {
        $this->api = $api;
        return $this;
    }

    /**
     * Set the pattern code and values for the SMS message.
     *
     * @param string $patternCode
     * @param array $patternValues
     * @return $this
     */
    public function pattern($patternCode, $patternValues)
    {
        $this->patternCode = $patternCode;
        $this->patternValues = $patternValues;
        return $this;
    }

    /**
     * Dispatch the SMS message.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dispatch()
    {
        $providerInstance = $this->getProviderInstance($this->provider);
        return $this->sendMessageWithProvider($providerInstance);
    }

    /**
     * Get the provider instance based on the provider name.
     *
     * @param string $provider
     * @return Melipayamak|Ippanel|Kavenegar|null
     */
    private function getProviderInstance($provider)
    {
        switch ($provider) {
            case 'melipayamak':
                return new Melipayamak($this->api, $this->sender);
            case 'ippanel':
                return new Ippanel($this->api, $this->sender);
            case 'kavenegar':
                return new Kavenegar($this->api, $this->sender);
        }
    }

    /**
     * Send the SMS message using the provider instance.
     *
     * @param $provider
     * @return \Illuminate\Http\JsonResponse
     */
    private function sendMessageWithProvider($provider)
    {
        try {
            if ($this->patternCode) {
                $response = $provider->sendPattern($this->patternCode, $this->patternValues, $this->to);
            } else {
                $response = $provider->send($this->text, $this->to);
            }
            return $response ;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
