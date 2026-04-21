<?php
class Product
{
    public $name;
    public $price;
    public static $count=0;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
        self::$count++;
    }
    public function getFinalPrice()
    {
        return $this->price*0.9;
    }
}
$p1 = new Product("Shampoo",500);
$p2 = new Product("Facewash",250);
$p1->getFinalPrice();
$p2->getFinalPrice();
echo "Final Price of product 1:". $p1->getFinalPrice() ."\n";
echo "Final price of product 2:". $p2->getFinalPrice() ."\n";
?>