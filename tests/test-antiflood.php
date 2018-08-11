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
        $this->assertEquals('60',$this->antiFloodService->getAntiFloodDelay());

    }

}
