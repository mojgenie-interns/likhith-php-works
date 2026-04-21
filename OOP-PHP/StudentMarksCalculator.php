<?php
class Student
{
    public $name;
    protected $mark1;
    protected $mark2;
    protected $mark3;
    public function __construct($name, $mark1, $mark2, $mark3)
    {
        $this->name = $name;
        $this->mark1 = $mark1;
        $this->mark2 = $mark2;
        $this->mark3 = $mark3;
    }
    public function getTotal()
    {
        return $this->mark1 + $this->mark2 + $this->mark3;
    }
    public function getAverage()
    {
        return $this->getTotal() / 3;
    }
    public function getResult()
    {
        if ($this->getAverage() >= 40) {
            return "Pass";
        } else {
            return "Fail";
        }
    }
}

$s = new Student("Likhith", 41, 67, 69);
echo "NAME: " . $s->name . "\n";
echo "TOTAL: " . $s->getTotal() . "\n";
echo "AVERAGE: " . $s->getAverage() . "\n";
echo "RESULT:" . $s->getResult() . "\n";
?>