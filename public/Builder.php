<?php
class Pizza
{
    public $message;

    public function __construct($pizzaBuilder)
    {
        echo $this->message = $pizzaBuilder->pizza;
    }
}

interface PizzaBuilderInterfase
{
    public function addPepperoni();
    public function addCheese();
    public function addDough();
    public function build();
}

class ItalianPizzaBuilder implements PizzaBuilderInterfase
{
    public $pizza;

    public function __construct()
    {
        $this->pizza = 'Pizza ';
        return $this;
    }

    public function addPepperoni()
    {
        $this->pizza .= 'add pepperoni ';
        return $this;
    }

    public function addCheese()
    {
        $this->pizza .= 'add cheese ';
        return $this;
    }

    public function addDough()
    {
        $this->pizza .= 'add italian dough ';
        return $this;
    }

    public function build(): Pizza
    {
        return new Pizza($this);
    }
}


class AmericanPizzaBuilder implements PizzaBuilderInterfase
{
    public $pizza;

    public function __construct()
    {
        $this->pizza = 'Pizza ';
        return $this;
    }

    public function addPepperoni()
    {
        $this->pizza .= 'add sausage ';
        return $this;
    }

    public function addCheese()
    {
        $this->pizza .= 'add cheese ';
        return $this;
    }

    public function addDough()
    {
        $this->pizza .= 'add american dough ';
        return $this;
    }

    public function build(): Pizza
    {
        return new Pizza($this);
    }
}

class PizzaDirector
{
    public function build(PizzaBuilderInterfase $builder)
    {
        $builder->addPepperoni();
        $builder->addCheese();
        $builder->addDough();

        return $builder->build();
    }
}

$italianPizza = (new PizzaDirector())->build(new ItalianPizzaBuilder());
$americanPizza = (new PizzaDirector())->build(new AmericanPizzaBuilder());
