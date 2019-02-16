<?php

abstract class AbstractMessenger
{
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public final function post($message)
    {
        if ($this->login($this->username, $this->password)) {
            $result = $this->sendMessage($message);
            $this->logout();
        }

        return $result;
    }

    public abstract function login(string $username, string $password);
    public abstract function logout();
    public abstract function sendMessage($message);
}

class Facebook extends AbstractMessenger
{
    public function login(string $userName, string $password)
    {
        echo 'FB login with name: ' . $userName . ' and password: ' . $password . "<br>\n";
       return $this->checkPermissions();
    }

    public function checkPermissions()
    {
        echo "Check permissions" . "<br>\n";
        return true;
    }

    public function logout()
    {
        echo 'FB logout' . "<br>\n";
    }

    public function sendMessage($message)
    {
        echo 'Sent a message: ' . $message . "<br>\n";
    }
}


class Vk extends AbstractMessenger
{
    public function login(string $userName, string $password)
    {
        echo 'Vk login with name: ' . $userName . ' and password: ' . $password . "<br>\n";
        $this->getToken();
        return true;
    }

    public function getToken()
    {
        echo "Get VK token" . "<br>\n";
    }

    public function logout()
    {
        echo 'Vk logout' . "<br>\n";
    }

    public function sendMessage($message)
    {
        echo 'Sent a message: ' . $message . "<br>\n";
    }
}

$vkmessenger = new Vk('sergey', '123456');
$vkmessenger->post('Test post');
echo "<br>\n";
$fbmessenger = new Facebook('sergey', '123456');
$fbmessenger->post('Fb test message');