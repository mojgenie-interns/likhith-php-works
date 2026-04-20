<?php
abstract class Shape
{
    abstract public function calculateArea(): float;
}
class Circle extends Shape
{
    private $radius;
    public function __construct($radius)
    {
        $this->radius =$radius;
    }
    public function calculateArea(): float
    {
        return pi()*$this->radius*$this->radius;
    }
}
class Rectangle extends Shape
{
    private $length;
    private $breadth;
    public function __construct( float $length,float $breadth)
    {
        $this->length =$length;
        $this->breadth=$breadth;
    } 
    public function calculateArea(): float
    {
        return $this->length*$this->breadth;
    }
}
$circle=new Circle(5);
$rectangle=new Rectangle(6,7);
$circle->calculateArea();
$rectangle->calculateArea();
echo $circle->calculateArea() . PHP_EOL;
echo $rectangle->calculateArea();