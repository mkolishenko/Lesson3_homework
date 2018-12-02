<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 02.12.18
 * Time: 22:35
 */
require_once __DIR__ . '/KeyValueStoreInterface.php';

class KeyValueStore_Yaml implements KeyValueStoreInterface
{
    public function set($key, $value)
    {
        // TODO: Implement set() method.
    }

    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    public function has($key): bool
    {
        // TODO: Implement has() method.
    }

    public function remove($key)
    {
        // TODO: Implement remove() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

}