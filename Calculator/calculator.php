<?php
function add($num1,$num2)
{
    return $num1+$num2;
}
function subtract($num1,$num2)
{
    return $num1-$num2;
}
function multi($num1,$num2) 
{
    return $num1*$num2;
}
function divide($num1,$num2)
{
    if($num2==0)
        {
            return "Error: Division by Zero";
        }
        return $num1/$num2;
}
function modulus($num1,$num2)
{
    if($num2==0)
        {
            return "Error: Modulus by Zero";
        }
        return $num1%$num2;
}
function power($num1,$num2)
{
    return pow($num1,$num2);
}
while(true)
    {
        echo "Simple Calculator\n";
        $num1=(float)readline("Enter num 1: ");
        $num2=(float)readline("Enter num 2: ");
        $oper=readline("Enter the operator-----  + , - , * , / , % , ^  -----  ");
        if(!is_numeric($num1)||!is_numeric($num2))
            {
                echo "Invalid input!!Please enter numbers only";
                continue;
            }
    switch($oper)
    {
        case '+':
            $result=add($num1,$num2);
            echo "Sum of the numbers: ".$result."\n";
            echo"\n";
            break;
        case '-':
            $result=subtract($num1,$num2);
            echo "Difference of the numbers: ".$result."\n";
            break;
        case '*':
            $result=multi($num1,$num2);
            echo "Product of the numbers: ".$result."\n";
            break;
        case '/':
            $result=divide($num1,$num2);
            echo "Quotient: ".$result."\n";
            break;
        case '%':
            $result=modulus($num1,$num2);
            echo "Remainder: ".$result."\n";
            break;
        case '^':
            $result=power($num1,$num2);
            echo $num1. " power ".$num2.": ".$result."\n";
            break;
        default:
            echo "Invalid operator.\n";
            continue 2;
            break;
    }
    $choice=readline("DO YOU WANT TO CONTINUE? (y/n)  ");
    if (strtolower($choice) != 'y')
        {
            echo "Calculator exited";
            break;
        }
    }
?>


