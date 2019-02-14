<?php

class CarFactory
{

    /**
     * @param $type
     * @param $model
     * @return mixed
     * @throws Exception
     */
    public static function build($type, $model) {
        $className = ucfirst($type);

        if(class_exists($className)) {
            return new $className($model);
        } else {
            throw new Exception('Car type not found.');
        }
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


$ferrari = CarFactory::build('ferrari', 'model');
$bmw =  CarFactory::build('vaz', 'x6');

echo $ferrari->model . "\n";

echo $bmw->model . "\n";
