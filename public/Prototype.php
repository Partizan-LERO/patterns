<?php
class Prototype
{
    public $name;

    public function __construct($name)
    {
        echo "$name has been created\n";
        return $this->name = $name;
    }

    public function getName()
    {
        echo "Clone name is " . $this->name . "\n";
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function __clone()
    {
       echo "It is a clon for $this->name\n";
    }
}

$prototype = new Prototype('Original Object');

for($i = 0; $i < 5; $i++) {
    $proto = clone $prototype;
    $proto->setName($i);
    $proto->getName();
}