<?php

namespace Devtoolboxuk\antiflood;

interface AntiFloodInterface
{
    public function detectAntiFlood();

    public function getAntiFloodTime();

    public function getAntiFloodDelay();

    public function getAntiFloodNameSpace();

    public function getStorage();

}