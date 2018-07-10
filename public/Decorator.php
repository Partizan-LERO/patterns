<?php
interface Car
{
    public function getCost();
    public function getEquipment();
}

class BasicEquipmentCar implements Car
{
    public function getCost()
    {
       return 17000;
    }

    public function getEquipment()
    {
        return 'Basic equipment';
    }
}


abstract class EquipmentCarDecorator implements Car
{
    public $car;

    public function __construct(Car $car)
    {
        return $this->car = $car;
    }
}

class DeluxeEquipmentCar extends EquipmentCarDecorator
{
    public function getCost()
    {
        $cost = $this->car->getCost() + 10000;
        return $cost;
    }

    public function getEquipment()
    {
        return 'Deluxe equipment';
    }
}

class AdditionalEquipmentCar extends EquipmentCarDecorator
{
    public function getCost()
    {
        return $cost = $this->car->getCost() + 5000;
    }

    public function getEquipment()
    {
        return 'Additional equipment';
    }
}


$car = new BasicEquipmentCar();
echo $car->getCost() . ' ';
echo $car->getEquipment() . ' ';

echo "<br>";

$deluxeCar = new DeluxeEquipmentCar($car);
echo $deluxeCar->getCost() . ' ';
echo $deluxeCar->getEquipment() . ' ';

echo "<br>";

$additionalCar = new AdditionalEquipmentCar($car);
echo $additionalCar->getCost() . ' ';
echo $additionalCar->getEquipment() . ' ';