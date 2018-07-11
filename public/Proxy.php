<?php
interface DoorInterface
{
    public function open();
    public function close();
}

class Door implements DoorInterface
{
    public function open()
    {
        echo 'Opening';
    }

    public function close()
    {
        echo 'Closing';
    }
}

class DoorProxy
{
    public $door;

    public function __construct(DoorInterface $door)
    {
        $this->door = $door;
    }

    public function open($code)
    {
        if ($this->secure() == $code) {
            return $this->door->open();
        } else {
            echo "Esto es impossible";
        }

        return false;
    }

    public function secure()
    {
        return "123456";
    }

    public function close()
    {
        return $this->door->close();
    }
}

$door = new DoorProxy(new Door());

$door->open('1231313');
echo "<br>";
$door->close();
echo "<br>";
$door->open('123456');
echo "<br>";
$door->close();