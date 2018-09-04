<?php

namespace Devtoolboxuk\antiflood\Storage;


class SessionStorage implements StorageInterface
{
    /**
     * The namespace used to store values in the session.
     */
    const SESSION_NAMESPACE = 'antiflood';
    const SESSION_DELAY = 60;

    private $session;
    private $namespace;

    public function storeNameSpace($namespace)
    {

        $this->namespace = self::SESSION_NAMESPACE .".". $namespace;
        $this->session = $_SESSION[$this->namespace] = [];
    }

    public function getNameSpace()
    {
        return $this->namespace;
    }

    public function storeTime()
    {
        $this->session['time'] = time();
    }

    public function getTime()
    {
        return isset($this->session['time']) ? $this->session['time'] : 0;
    }

    public function hasTime()
    {
        return isset($this->session['time']) ? true : false;
    }

    public function storeDelay($delay)
    {
        $this->session['delay'] = (int)$delay;
    }

    public function getDelay()
    {
        return isset($this->session['delay']) ? $this->session['delay'] : self::SESSION_DELAY;

    }

    public function clear()
    {
        unset($this->session);
    }
}
