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
    protected $file = '';

    public function __construct()
    {
        $this->file =__DIR__.'/../uploads/data.yml';

        if (!file_exists($this->file)) {
            throw new \LogicException(sprintf("The file '%s' does not exist", $this->file));
        }
    }

    public function set($key, $value)
    {
        $file_content = Yaml::parseFile($this->file);
        $file_content[$key] = $value;
        file_put_contents($this->file,Yaml::dump(($file_content)));
    }

    public function get($key, $default = null)
    {
        $rez = Yaml::parseFile($this->file);
        if (isset ($rez[$key]))
        return $rez[$key];
        return null;
    }

    public function has($key): bool
    {
        $file_content = Yaml::parseFile($this->file);
        if (isset ($rez[$key]))
            return true;
        return false;
    }

    public function remove($key)
    {
        $file_content = Yaml::parseFile($this->file);
        if (isset ($rez[$key])){
            unset($rez[$key]);
            return true;
        }
        return false;
    }

    public function clear()
    {
        $file_content = Yaml::parseFile($this->file);
        if (isset ($rez[$key])){
            $rez[$key] ='';
            return true;
        }
        return false;
    }

}