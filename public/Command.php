<?php
interface CommandInterface
{
    public function execute();
    public function undo();
    public function redo();
}

class TurnOn implements CommandInterface
{
    protected $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->turnOn();
    }

    public function undo()
    {
        $this->receiver->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}

class TurnOff implements CommandInterface
{
    protected $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->turnOff();
    }

    public function undo()
    {
        $this->receiver->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}

class Receiver
{
    public function turnOn()
    {
        echo "turnOn!";
    }

    public function turnOff()
    {
        echo "turnOff!";
    }
}

class Invoker
{
    private $command;

    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    public function run()
    {
        $this->command->execute();
    }

    public function undo()
    {
        $this->command->undo();
    }

    public function redo()
    {
        $this->command->redo();
    }
}

$receiver = new Receiver();

$turnOn = new TurnOn($receiver);
$turnOff = new TurnOff($receiver);

$invoker = new Invoker($turnOn);

$invoker->run();
$invoker->undo();
$invoker->redo();
