<?php
trait Discount
{
    public function applyDiscount($price)
    {
        return $price*0.9;
    }
}
class Product
{
    use Discount;
    public $name;
    public $price;
    public static $count=0;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
        self::$count++;
    }
    public function showFinalPrice()
    {
        return $this->applyDiscount($this->price);
    }
}
$p1= new Product("Shampoo",500);
$p2= new Product("Facewash",250);
$p1->applyDiscount(500);
$p2->applyDiscount(250);
$p1->showFinalPrice();
$p2->showFinalPrice();
echo "Total no of Products:".Product::$count."\n";
echo "Final price of product 1:".$p1->showFinalPrice()."\n";
echo "Final price of product 2:".$p2->showFinalPrice()."\n";
?>