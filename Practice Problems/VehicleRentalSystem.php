<?php
class Vehicle
{
    protected $brand;
    protected $rentPerDay;
    public function __construct($brand, $rentPerDay)
    {
        $this->brand=$brand;
        $this->rentPerDay=$rentPerDay;
    }
    public function rentCalculate($days)
    {
       return $this->rentPerDay * $days;
    }
}
class Car extends Vehicle
{
    private $seats;
    public function __construct($brand,$rentPerDay,$seats)
    {
        parent ::__construct($brand,$rentPerDay);
        $this->seats=$seats;
    }
    public function rentCalculate($days)
    {
        return ($this->rentPerDay * $days)+1000;
    }
}
class Bike extends Vehicle
{
    private $engineCC;
    public function __construct($brand,$rentPerDay,$engineCC)
    {
        parent :: __construct($brand,$rentPerDay);
        $this->engineCC=$engineCC;
    }
    public function rentCalculate($days)
    {
        return $this->rentPerDay * $days;
    }
}
$type=readline("Enter vehicle type(Car/Bike)\n");
$brand=readline("Enter the brand name: \n");
$rentPerDay=readline("Enter rent per day: \n");
$days=readline("Enter the number of days: \n");
if($type=="Car")
    {
        $seats=readline("Enter the number of seats: \n");
        $rent=new Car($brand,(int)$rentPerDay,(int)$seats);
    }
    else
        {
            $engineCC=readline("Enter the engine CC: \n");
            $rent=new Bike($brand,(int)$rentPerDay,(int)$engineCC);
        }
        echo "Total Rent: ".$rent->rentCalculate((int)$days);
        ?>