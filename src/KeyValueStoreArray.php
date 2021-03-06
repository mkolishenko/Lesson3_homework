<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 03.12.18
 * Time: 12:33
 */

final class KeyValueStoreArray implements KeyValueStoreInterface
{
    /**
     * @var array data for saving
     */
    protected $vArray =[];

    public function __construct()
    {
        $this->vArray = [(1) => 'Test item'];
    }

    /**
     * Set value identified by key
     *
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key,$value)
    {
        $this->vArray[$key] = $value;
    }

    /**
     * Get value identified by Key
     *
     * @param string $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        if (isset($this->vArray[$key])) {
            return $this->vArray[$key];
        }
        return null;
    }

    /**
     * Check for exists value identified by key
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        if (isset($this->vArray[$key])) {
            return true;
        }
        return false;
    }

    /**
     * Removes value identified by key
     *
     * @param string $key
     */
    public function remove(string $key)
    {
        if (isset($this->vArray[$key])) {
            unset($this->vArray[$key]);
        }
    }

    /**
     * Erase array of data
     */
    public function clear()
    {
        $this->vArray = [];
    }
}
