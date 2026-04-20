<?php
abstract class FoodItem
{
    public $name;
    public $price;
    public function __construct($name,$price)
    {
    $this->name=$name;
    $this->price=$price;
    }
    abstract public function showDetails();
    public function prepare()
    {
        echo $this->name." is being prepared \n";
    }
}
interface Discountable
{
    public function applyDiscount($percent);
}
interface Deliverable
{
    public function Deliver();
}
class Pizza extends FoodItem implements Discountable,Deliverable
{
    public function showDetails()
    {
        echo "Pizza ".$this->name. "| Price: ". $this->price ."\n";
    }
    public function applyDiscount($percent)
    {
        $discount=($this->price*$percent)/100;
        $newPrice=$this->price-$discount;
        echo "Discounted Price: ".$newPrice."\n";
    }
    public function Deliver()
    {
        echo $this->name." is out for delivery";
    }
}
class Burger extends FoodItem
{
    public function showDetails()
    {
        echo "Burger: ".$this->name ."|Price: ".$this ->price."\n";
    }
}
    function printFood(FoodItem $item)
    {
        $item->showDetails();
    }
$pizza=new Pizza("Cheese Burst",250);
$burger=new Burger("Chicken Burger",150);
printFood($pizza);
$pizza->prepare();
$pizza->applyDiscount(10);
$pizza->Deliver();
echo "\n";
printFood($burger);
$burger->prepare();
?>
