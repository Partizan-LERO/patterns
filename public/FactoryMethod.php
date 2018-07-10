<?php
interface SocialNetwork
{
    public function login();
    public function sendRequest($message);
    public function logout();
}

class Facebook implements SocialNetwork
{
    public function login()
    {
        echo "Login Facebook API\n";
    }

    public function sendRequest($message)
    {
        echo "Send message : $message via Facebook API\n";
    }

    public function logout()
    {
        echo "Logout Facebook API\n";
    }
}

class Vk implements SocialNetwork
{
    public function login()
    {
        echo "Login vk API\n";
    }

    public function sendRequest($message)
    {
        echo "Send message : $message via vk API\n";
    }

    public function logout()
    {
        echo "Logout vk API\n";
    }
}



abstract class FactoryMethod
{
    abstract public function create();

    public function post($message)
    {
        $network = $this->create();
        $network->login();
        $network->sendRequest($message);
        $network->logout();
    }
}

class VkFactory extends FactoryMethod
{
    public function create()
    {
        return new Vk();
    }
}

class FacebookFactory extends FactoryMethod
{
    public function create()
    {
        return new Facebook();
    }
}

$message = (new FacebookFactory())->post('Hello!');
echo "\n";
$message = (new VkFactory())->post('Bye!');