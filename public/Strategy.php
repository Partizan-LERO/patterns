<?php

class Navigator
{
    public $strategy;

    public function __construct(RouteStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function buildRoute($from, $to)
    {
        return $this->strategy->buildRoute($from, $to);
    }
}

interface RouteStrategyInterface
{
    public function buildRoute($from, $to);
}

class AutoStrategy implements RouteStrategyInterface
{
    public function buildRoute($from, $to)
    {
        echo 'Building auto route from ' . $from . ' to ' . $to . "\n";
    }
}

class WalkingStrategy implements RouteStrategyInterface
{
    public function buildRoute($from, $to)
    {
        echo 'Building walking route from ' . $from . ' to ' . $to . "\n";
    }
}

class PublicTransportStrategy implements RouteStrategyInterface
{
    public function buildRoute($from, $to)
    {
        echo 'Building route from ' . $from . ' to ' . $to . "\n";
    }
}


$route = (new Navigator(new AutoStrategy()))->buildRoute('Kazan', 'Amsterdam');
echo "<br>\n";
$route = (new Navigator(new PublicTransportStrategy()))->buildRoute('Amsterdam Airport Schiphol', 'Amsterdam Science Park railway station');
echo "<br>\n";
$route = (new Navigator(new WalkingStrategy()))->buildRoute('Amsterdam Science Park railway station', 'Universiteit van Amsterdam');