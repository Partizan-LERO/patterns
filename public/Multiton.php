<?php
class Multiton
{
    const INSTANCE_1 = '1';
    const INSTANCE_2 = '2';
    private static $instance;

    protected function __construct()
    {
    }

    public static function getInstance(string $instanceName)
    {
        if(!self::$instance[$instanceName])   {
            self::$instance[$instanceName] = new self();
            echo "Class $instanceName has been created\n";
        } else {
            echo "Class $instanceName already exists\n";
        }
        return self::$instance[$instanceName];
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

$multiton = Multiton::getInstance(Multiton::INSTANCE_1);
$multiton2 = Multiton::getInstance(Multiton::INSTANCE_1);
$multiton3 = Multiton::getInstance(Multiton::INSTANCE_2);
$multiton4 = Multiton::getInstance(Multiton::INSTANCE_2);
$multiton5 = Multiton::getInstance(Multiton::INSTANCE_1);