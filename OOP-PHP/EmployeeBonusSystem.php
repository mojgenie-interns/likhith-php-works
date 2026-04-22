<?php
trait CompanyInfo
{
    public function companyName()
    {
        return "Mojgenie IT Solutions";
    }
}
abstract class Employee
{
    use CompanyInfo;
    protected $name;
    protected $salary;
    public static $count=0;
    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
        self::$count++;
    }
    abstract public function calculateBonus();
    public function showDetails()
    {
        echo "Company Name: ".$this->companyName()."\n";
        echo "Employee Name: ".$this->name."\n";
        echo "Salary: ".$this->salary."\n";
    }
    public static function showCount()
    {
        return self::$count;
    }
}
class Manager extends Employee
{
    public function calculateBonus()
    {
        return $this->salary*0.20;
    }
}
class Developer extends Employee
{
    public function calculateBonus()    
    {
        return $this->salary*0.10;
    }
}
$emp1= new Manager("Likhith",100000);
$emp2= new Developer("George",50000);
$emp3= new Developer("Darryl",40000);
$emp1->showDetails();
$emp2->showDetails();
$emp3->showDetails();
echo "Bonus:".$emp1->calculateBonus(). "\n";
echo "Bonus:".$emp2->calculateBonus(). "\n";
echo "Bonus:".$emp3->calculateBonus(). "\n";
echo "Total Employees:".Employee::showCount();