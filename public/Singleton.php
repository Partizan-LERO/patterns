<?php

class Singleton
{
    private static $instance;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            echo "Class has been created\n";
            self::$instance = new self();
        } else {
            echo "Class already exists!\n";
        }

        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }
}

$singleton = Singleton::getInstance();
$singleton2 = Singleton::getInstance();
$singleton3 = Singleton::getInstance();