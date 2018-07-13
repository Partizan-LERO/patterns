<?php
interface DiscountInterface
{
    public function getDiscount();
}

class FivePercentDiscount implements DiscountInterface
{
    //TODO::implement discount methods
    public function getDiscount()
    {
        return 0.05;
    }
}

class TenPercentDiscount implements DiscountInterface
{
    //TODO::implement discount methods
    public function getDiscount()
    {
        return 0.1;
    }
}

class TwentyPercentDiscount implements DiscountInterface
{
    //TODO::implement discount methods
    public function getDiscount()
    {
        return 0.2;
    }
}

interface ProductInterface
{
    public function getName();
    public function getCost();
}

class Product implements ProductInterface
{
    private $cost;
    private $name;

    public function __construct(string $name, int $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getName() :string
    {
        return $this->name;
    }

    public function setCost(int $cost)
    {
        $this->cost = $cost;
    }

    public function getCost() :int
    {
        return $this->cost;
    }
}

class Calculator
{
    protected $products = [];
    protected $discounts = [];
    private $sum = 0;

    public function addProduct(ProductInterface $product)
    {
        $this->products[] = $product;
        $this->sum += $product->getCost();
    }

    public function addDiscount(DiscountInterface $discount)
    {
        $this->discounts = $discount;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function AbDiscount()
    {
        $a = [];
        $b = [];

        foreach ($this->products as $key => $product) {
            if ($product->getName() == 'A') {
                $a[] = $product;
            }

            if ($product->getName() == 'B') {
                $b[] = $product;
            }
        }

        echo count($a);
        echo count($b);
    }

    public function getTotalSum() :int
    {
        return $this->sum;
    }
}

$a = new Product('A', 100);
$b = new Product('B', 200);
$c = new Product('C', 300);
$d = new Product('D', 400);
$e = new Product('E', 500);
$f = new Product('F', 600);
$g = new Product('G', 700);
$h = new Product('H', 800);
$i = new Product('I', 900);
$j = new Product('J', 1000);
$k = new Product('K', 1100);
$l = new Product('L', 1200);
$m = new Product('M', 1300);


$calculator = new Calculator();

$calculator->addProduct($a);
$calculator->addProduct($b);
$calculator->addProduct($b);
$calculator->addProduct($b);


$calculator->addDiscount(new FivePercentDiscount());
$calculator->addDiscount(new TenPercentDiscount());
$calculator->addDiscount(new TwentyPercentDiscount());

$calculator->AbDiscount();
echo $calculator->getTotalSum();
