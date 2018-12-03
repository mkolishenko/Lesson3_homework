<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 03.12.18
 * Time: 11:42
 */

final class KeyValueStore_Json implements KeyValueStoreInterface
{
    protected $file = '';

    public function __construct()
    {
        $this->file =__DIR__.'/../uploads/data.json';

        if (!file_exists($this->file)) {
            throw new \LogicException(sprintf("The file '%s' does not exist", $this->file));
        }
    }

    public function set($key, $value)
    {
        $rez = json_decode(file_get_contents($this->file), true);
        $rez [$key] = $value;
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
        // TODO: Implement set() method.
    }

    public function get($key, $default = null)
    {
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset ($rez[$key]))
            return $rez[$key];
        return null;
    }

    public function has($key): bool
    {
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset ($rez[$key]))
            return true;
        return false;
    }

    public function remove($key)
    {
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset ($rez[$key])){
            unset($rez[$key]);
        }
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
    }

    public function clear()
    {
        $rez = [];
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
    }

}