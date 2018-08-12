<?php

namespace devtoolboxuk\antiflood;

use PHPUnit\Framework\TestCase;

class AntiFlood extends TestCase
{

    protected $antiFloodService;

    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->antiFloodService = new AntiFloodService();
    }

    public function testAntiFloodDelay()
    {
        //Get AntiFloodDelay
        $this->assertEquals('60', $this->antiFloodService->getAntiFloodDelay());

        //Set AntiFlood Delay
        $this->antiFloodService->setAntiFloodDelay('300');
        $this->assertEquals('300', $this->antiFloodService->getAntiFloodDelay());
        $this->assertNotEquals('60', $this->antiFloodService->getAntiFloodDelay());

    }

    public function testAntiFlood()
    {
        $this->antiFloodService->setAntiFloodDelay('1');
        $this->antiFloodService->setAntiFlood();

        $this->assertSame(true, $this->antiFloodService->detectAntiFlood());
        sleep(3);
        $this->assertSame(false, $this->antiFloodService->detectAntiFlood());


        $this->antiFloodService->setAntiFloodDelay('2');
        $this->antiFloodService->setAntiFlood();

        $this->assertSame(true, $this->antiFloodService->detectAntiFlood());
        sleep(1);
        $this->assertNotSame(false, $this->antiFloodService->detectAntiFlood());

    }

}
