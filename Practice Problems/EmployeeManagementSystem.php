<?php
class Employee
{
    protected $name;
    protected $baseSalary;
    public function __construct($name,$baseSalary)
    {
        $this->name=$name;
        $this->baseSalary=$baseSalary;
    }
    public function calculateSalary()
    {
        return $this->baseSalary;
    }
    public function showDetails()
    {
        echo "Name: ".$this->name."\n";
        echo "Final Salary: ".$this->calculateSalary()."\n";
    }
}
class Manager extends Employee
{
    private $bonus;
    public function __construct($name,$baseSalary,$bonus)
    {
        parent::__construct($name,$baseSalary);
        $this->bonus=$bonus;
    }
    public function calculateSalary()
    {
        return $this->baseSalary+$this->bonus;
    }
}
class Developer extends Employee
{
    private $overTimePay;
    public function __construct($name,$baseSalary,$overTimePay)
    {
        parent::__construct($name,$baseSalary);
        $this->overTimePay=$overTimePay;
    }
    public function calculateSalary()
    {
        return $this->baseSalary+$this->overTimePay;
    }
}
class Company
{
    private $employees=[];
    public function addEmployee(Employee $employee)
    {
        $this->employee[]=$employee;
        echo "Employee added successfully \n";
    }
    public function showAllEmployees()
    {
        foreach ($this->employee as $employee)
            {
                echo "---------------\n";
                $employee->showDetails();
            }
    }
}
$company=new Company();
$type=strtolower(readline("Enter the employee type (manager/developer)"."\n"));
$name=readline("Enter the employee name: "."\n");
$baseSalary=(int)readline("Enter the base salary: "."\n");
if($type=="manager")
    {
        $bonus=(int)readline("Enter the bonus: "."\n");
        $employee=new Manager($name,$baseSalary,$bonus);
    }
    elseif($type=="developer")
        {
            $overTimePay=(int)readline("Enter the overtime pay "."\n");
            $employee=new Developer($name,$baseSalary,$overTimePay); 
        }
        else{
            echo "Invalid employee type"."\n";
            exit;
        }
        $company->addEmployee($employee);
        echo "\nEmployee Records:\n";
        $company->showAllEmployees();
?>
