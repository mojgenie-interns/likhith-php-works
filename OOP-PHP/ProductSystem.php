<?php

trait Discount {
    public function applyDiscount($price) {
        return $price * 0.9;
    }
}

class Product {
    use Discount;

    public static $count = 0;
    protected $name;

    public function __construct($name) {
        $this->name = $name;
        self::$count++;
    }

    public function showPrice($price) {
        $final = $this->applyDiscount($price);
        echo $this->name . " final price: " . $final . "\n";
    }
}

$p1 = new Product("Phone");
$p2 = new Product("Laptop");

$p1->showPrice(1000);
$p2->showPrice(2000);

echo "Total products: " . Product::$count;

?>