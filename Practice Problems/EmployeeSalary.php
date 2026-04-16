<?php
class Employee
{
    protected $name;
    protected $salary;
    public function __construct($name,$salary)
    {
        $this->name=$name;
        $this->salary=$salary;
    }
    public function calculateSalary()
    {
        return $this->salary;
    }
}
class FullTimeEmployee extends Employee
{
    public function calculateSalary()
    {
       return $this->salary+5000;
    }
}
class PartTimeEmployee extends Employee
{
    public function calculateSalary()
    {
        return $this->salary;
    }
}
echo "Enter Employee type: (Full/Part)\n";
$type=readline();
$name=readline("Enter the name: \n");
$salary=readline("Enter base salary: \n");
if($type=="Full")
    {
        $emp=new FullTimeEmployee($name,(int)$salary);
    }
    else
        {
            $emp=new PartTimeEmployee($name,(int)$salary);
        }
        echo "Final Salary: ".$emp->calculateSalary();
?>
