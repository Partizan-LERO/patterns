<?php

class CarFactory
{
    public static function build($type = '') {
             
        if ($type == '') {
            throw new Exception('Invalid Car Type.');
        } else {
            $className = ucfirst($type);
 
            if(class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('Car type not found.');
            }
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


$ferrari = (new CarFactory)->build('ferrari');
$bmw =  (new CarFactory)->build('bmw');

echo $ferrari->model;
echo "<br>";
echo $bmw->model;
