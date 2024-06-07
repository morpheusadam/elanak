<?php

namespace Morpheusadam\Elanak\Tests;

use PHPUnit\Framework\TestCase;
use Morpheusadam\Elanak\sms;

class SMSTest extends TestCase
{
    private $sms;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sms = new sms();
    }

    public function testSendSMS()
    {
        // TODO: Add your mock objects and assertions here
        $this->assertNotNull($this->sms->sendSMS('Test message'));
    }

    public function testSendSMSPattern()
    {
        // TODO: Add your mock objects and assertions here
        $this->assertNotNull($this->sms->sendSMSPattern('Test message', '09185312051', 'TestPattern', 'TestValue'));
    }

    public function testDispatchSMS()
    {
        // TODO: Add your mock objects and assertions here
        $this->assertNotNull($this->sms->dispatchSMS('Test message', '09185312051', 'TestProvider', 'TestSender', 'TestAPI', 'TestPatternCode', 'TestValue'));
    }
}
