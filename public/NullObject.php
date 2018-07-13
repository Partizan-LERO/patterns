<?php
namespace App\NullObject;

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

class NullCommand implements CommandInterface
{

    public function execute()
    {
        echo 'Actually, do nothing here! ';
    }

    public function undo()
    {
        echo 'Actually, do nothing here! ';
    }

    public function redo()
    {
        echo 'Actually, do nothing here! ';
    }
}

class Receiver
{
    public function turnOn()
    {
        echo "turnOn! ";
    }

    public function turnOff()
    {
        echo "turnOff! ";
    }
}

class Invoker
{
    private $command;

    public function __construct(CommandInterface $command = null)
    {
        $this->command = $command ?? new NullCommand();
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


    $invoker = new Invoker(new TurnOn($receiver));
    $invoker->run();
    $invoker->undo();
    $invoker->redo();


    $invoker2 = new Invoker(new TurnOff($receiver));
    $invoker2->run();
    $invoker2->undo();
    $invoker2->redo();

    $invoker3 = new Invoker();
    $invoker3->run();
    $invoker3->undo();
    $invoker3->redo();