<?php
/**
 * Created by PhpStorm.
 * User: maksym
 * Date: 02.12.18
 * Time: 22:35
 */
require_once __DIR__ . '/KeyValueStoreInterface.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

final class KeyValueStore_Yaml implements KeyValueStoreInterface
{
    /**
     * @var string filepath of data for saving
     */
    protected $file = '';

    public function __construct()
    {
        $this->file =__DIR__.'/../uploads/data.yml';

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
        $file_content = Yaml::parseFile($this->file);
        $file_content[$key] = $value;
        file_put_contents($this->file, Yaml::dump(($file_content)));
    }

    /**
     * Get value identified by key
     *
     * @param string $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        $rez = Yaml::parseFile($this->file);
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
        $rez = Yaml::parseFile($this->file);
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
        $rez = Yaml::parseFile($this->file);
        if (isset($rez[$key])) {
            unset($rez[$key]);
        }
        file_put_contents($this->file, Yaml::dump(($rez)));
    }

    /**
     * Erase array of data
     */
    public function clear()
    {
        $rez = [];
        file_put_contents($this->file, Yaml::dump(($rez)));
    }
}
