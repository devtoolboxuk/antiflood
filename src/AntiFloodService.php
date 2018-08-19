<?php

namespace devtoolboxuk\antiflood;

use devtoolboxuk\antiflood\Storage\SessionStorage;

class AntiFloodService implements AntiFloodInterface
{
    const ANTIFLOOD_NAMESPACE = '_default';
    const ANTIFLOOD_DELAY = 60;

    protected $storage;
    protected $delay;
    protected $namespace;

    public function __construct($namespace = self::ANTIFLOOD_NAMESPACE, $delay = self::ANTIFLOOD_DELAY, StorageInterface $storage = null)
    {
        $this->storage = $storage ? '' : new SessionStorage();
        $this->init($namespace, $delay);

    }

    public function setAntiFloodNameSpace($namespace)
    {
        $this->storage->storeNameSpace($namespace);
    }

    public function getAntiFloodNameSpace() {
        return $this->storage->getNameSpace();
    }

    private function init($namespace, $delay)
    {
        $this->storage->storeNameSpace($namespace);
        $this->setAntiFloodDelay($delay);
    }

    public function setAntiFloodDelay($delay)
    {
        $this->storage->storeDelay($delay);
    }

    public function detectAntiFlood()
    {

        if (!$this->hasAntiFloodTime()) {
            $this->setAntiFloodTime();
        } else {
            if ($this->antiFloodInOperation()) {
                $this->setAntiFloodTime();
                return true;
            } else {
                $this->removeAntiFlood();
            }
        }
        return false;
    }

    private function hasAntiFloodTime()
    {
        return $this->storage->hasTime();
    }

    private function setAntiFloodTime()
    {
        $this->storage->storeTime();
    }

    private function antiFloodInOperation()
    {
        return $this->timeDifference() < $this->getAntiFloodDelay();
    }

    private function timeDifference()
    {
        return time() - $this->getAntiFloodTime();
    }

    public function getAntiFloodTime()
    {
        return $this->storage->getTime();
    }

    public function getAntiFloodDelay()
    {

        return $this->storage->getDelay();

    }

    private function removeAntiFlood()
    {
        $this->storage->clear();
    }


}