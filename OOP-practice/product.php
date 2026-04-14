<?php
class Product
{
    public $name;
    public $price;
    public $quantity;
    public function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function totalprice()
    {
        $totalprice=$this->price*$this->quantity;
        echo $this->quantity." ". $this->name." costs ".$this->price;
    }
}
$p=new Product("facewash",500,2);
$p->totalprice();
?>