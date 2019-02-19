<?php

namespace Devtoolboxuk\antiflood\Storage;


class SessionStorage implements StorageInterface
{
    /**
     * The namespace used to store values in the session.
     */
    const SESSION_NAMESPACE = 'antiflood';
    const SESSION_DELAY = 60;

    private $storage;
    private $namespace;

    public function storeNameSpace($namespace)
    {
        $this->namespace = self::SESSION_NAMESPACE . "_" . $namespace;
        $this->storage = $_SESSION[$this->namespace];
    }

    public function getStorage()
    {
        return $this->storage;
    }

    protected function setStorageItem($key, $value)
    {
        $this->storage[$key] = $value;
        $_SESSION[$this->namespace] = $this->storage;
    }

    protected function getStorageItem($key)
    {
        $this->storage = $_SESSION[$this->namespace];
        if (isset($this->storage[$key])) {
            return $this->storage[$key];
        }
        return null;
    }

    public function getNameSpace()
    {
        return $this->namespace;
    }

    public function storeTime()
    {
        $this->setStorageItem('time',time());
    }

    public function getTime()
    {
        return $this->getStorageItem('time');
    }

    public function storeDelay($delay)
    {
        $this->setStorageItem('delay',(int)$delay);
    }

    public function getDelay()
    {
        if ($this->getStorageItem('delay')) {
            return $this->getStorageItem('delay');
        }
        return self::SESSION_DELAY;
    }

    public function clear()
    {
        unset($_SESSION[$this->namespace]);
    }
}
