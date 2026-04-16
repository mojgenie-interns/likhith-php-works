<?php
class Product
{
    public $name;
    public $price;
    public function __construct($name, $price)
    {
        $this->name=$name;
        $this->price=$price;
    }
}
class Cart
{
    public $products=[];
    public function addProduct($product)
    {
        $this->products[]=$product;
        echo $product->name. " Added to the cart \n";
    }
    public function getTotalPrice()
    {
        $total=0;
        foreach ($this->products as $product)
            {
                $total+=$product->price;
            }
            return $total;
    }
}
$p1=new Product("Laptop", 50000);
$p2=new Product("Mouse", 1000);
$p3=new Product("Keyboard", 2000);
$cart=new Cart();
$cart->addProduct($p1);
$cart->addProduct($p2);
$cart->addProduct($p3);
echo "Total Price: ".$cart->getTotalPrice()."\n";
?>