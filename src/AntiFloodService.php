<?php

namespace devtoolboxuk\antiflood;

class AntiFloodService
{
    protected $antiFlood = false;
    protected $delay = 60;

    public function setAntiFloodDelay($delay)
    {
        $this->delay = $delay;
    }

    public function detectAntiFlood()
    {

        if (!empty($_SESSION['dtb.antiFlood'])) {
            $time = time() - $_SESSION['dtb.antiFlood'];
            if ($time < $this->getAntiFloodDelay()) {
                $this->setAntiFlood();
            } else {
                if ($time >= $this->getAntiFloodDelay()) {
                    $this->removeAntiFlood();
                }
            }
        }

        return $this->getAntiFlood();
    }

    public function getAntiFloodDelay()
    {
        return $this->delay;
    }

    public function removeAntiFlood()
    {
        unset($_SESSION['dtb.antiFlood']);
        $this->antiFlood = false;
    }

    public function getAntiFlood()
    {
        return $this->antiFlood;
    }

    public function setAntiFlood()
    {
        if (empty($_SESSION['dtb.antiFlood'])) {
            $_SESSION['dtb.antiFlood'] = time();
        }
        $this->antiFlood = true;
        return;
    }
}