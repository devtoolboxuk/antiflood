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

        if (!empty($_SESSION['antiFlood'])) {
            $time = time() - $_SESSION['antiFlood'];
            if ($time < $this->getAntiFloodDelay()) {
                $this->setAntiFlood();
            } else {
                if ($time >= $this->getAntiFloodDelay()) {
                    $this->setAntiFlood();
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
        unset($_SESSION['antiFlood']);
    }

    public function getAntiFlood()
    {
        return $this->antiFlood;
    }

    public function setAntiFlood()
    {
        if (empty($_SESSION['antiFlood'])) {
            $_SESSION['antiFlood'] = time();
        }
        $this->antiFlood = true;
        return;
    }
}