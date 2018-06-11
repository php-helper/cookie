<?php
/**
 * Created by PhpStorm.
 * User: Oleg G.
 * Date: 10.06.2018
 * Time: 11:47
 */

namespace PhpHelper\Cookie;

class Cookie
{
    public function __construct()
    {
        session_start();
    }

    public function clear(): void
    {
    }

    /**
     * @param string|int $key
     * @param mixed $value
     */
    public function set($key, $value): void
    {
        setcookie($key, $value);
    }

    /**
     * @param string|int $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function get($key, $defaultValue = '')
    {
        if($this->has($key)) {
            return $_COOKIE[$key];
        } else {
            return $defaultValue;
        }
    }

    /**
     * @param string|int $key
     */
    public function delete($key): void
    {
        if ($this->has($key)) {
            unset($_COOKIE[$key]);
            setcookie($key, '', time() - 1);
        }
    }

    /**
     * @param string|int $key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($_COOKIE[$key]);
    }
}