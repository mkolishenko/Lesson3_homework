<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 03.12.18
 * Time: 11:42
 */

final class KeyValueStoreJson implements KeyValueStoreInterface
{

    /**
     * @var string filepath of data for saving
     */
    protected $file = '';

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/data.json';

        if (!file_exists($this->file)) {
            throw new \LogicException(sprintf("The file '%s' does not exist", $this->file));
        }
    }

    /**
     * Set value identified by key
     *
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value)
    {
        $rez = json_decode(file_get_contents($this->file), true);
        $rez [$key] = $value;
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
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
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset($rez[$key])) {
            return $rez[$key];
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
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset($rez[$key])) {
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
        $rez = json_decode(file_get_contents($this->file), true);
        if (isset($rez[$key])) {
            unset($rez[$key]);
        }
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
    }

    /**
     * Erase array of data
     */
    public function clear()
    {
        $rez = [];
        $json_data = json_encode($rez);
        file_put_contents($this->file, $json_data);
    }
}
