<?php
trait Discount
{
    public function applyDicount($price)
    {
        $price = $this->price*(10/100);
        return $price;
    }
}
class Product
{
    use Discount;
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
        self::$count++;
    }
    public function showPrice()
    {
        $final=$this->applyDicount($price);
        echo $this->name . " final price: " . $final . "\n";
    }
}
$p1 = new Product("Phone");
$p2 = new Product("Laptop");
$p1->showPrice(1000);
$p2->showPrice(2000);
echo "Total products: " . Product::$count;

?>
