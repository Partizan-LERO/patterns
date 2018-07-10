<?php

class CarFactory
{
    public function make($name)
    {
        return new Ferrari($name);
    }
}


abstract class Car
{
    public $model;

    public function __construct($model)
    {
        return $this->model = $model;
    }
}


class Ferrari extends Car
{
    public $model;

    public function __construct($model)
    {
        parent::__construct($model);
    }
}

class Vaz extends Car
{
    public $model;

    public function __construct($model)
    {
        parent::__construct($model);
    }
}


$ferrari = (new CarFactory)->make('Ferrari');
$bmw =  (new CarFactory)->make('BMW');

echo $ferrari->model;
echo "<br>";
echo $bmw->model;