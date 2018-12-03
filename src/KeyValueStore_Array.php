<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 03.12.18
 * Time: 12:33
 */

final class KeyValueStore_Array implements KeyValueStoreInterface
{
    protected $vArray =[];

    public function __construct()
    {
        $this->vArray = [(1) => 'Test item'];

    }

    public function set($key, $value)
    {
        $this->vArray[$key] = $value;
    }

    public function get($key, $default = null)
    {
        if (isset ($this->vArray[$key]))
            return $this->vArray[$key];
        return null;
    }

    public function has($key): bool
    {
        if (isset ($this->vArray[$key]))
            return true;
        return false;
    }

    public function remove($key)
    {
        if (isset ($this->vArray[$key]))
            unset($this->vArray[$key]);
    }

    public function clear()
    {
        $this->vArray = [];
    }

}