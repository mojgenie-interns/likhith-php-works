<?php
class Employee
{
    public $name;
    public $salary;
    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }
    public function showDetails()
    {
        echo $this->name ." earns ".$this->salary;
    }
}
$e=new employee("Likhith",50000);
$e->showDetails();
?>