<?php
class BankAccount
{
    public $name;
    public $balance;  
    public function Deposit($money)
    {
         $this->balance+=$money;
    }
    public function Withdraw($money)
    {
         $this->balance-=$money;
    }
    public function showBalance()
    {
        echo "The available balance is: " . $this->balance . "\n";
    }
}
$u=new BankAccount();
$u->name=readline("Enter the name: ");
$u->balance=readline("Enter the initial balance: ");
while (true) 
    {
        echo ("\n1.DEPOSIT\n 2.WITHDRAW\n 3.VIEW BALANCE\n 4.EXIT\n");
        $choice=readline("Enter your choice: ");
        if ($choice== "1")
            {
                $money=readline("Enter the money to be deposited: ");
                $u->Deposit($money);
            }
            else if ($choice== "2")
                {
                    $money=readline("Enter the money to be withdrawn");
                    $u->Withdraw($money);
                }
                else if ($choice== "3")
                    {
                        $u->showBalance();
                    }
                    else if ($choice== "4")
                        {
                            echo("Exiting the program\n");
                            break;
                        }
                        else 
                            {
                                echo ("Invalid choice..try again!!");
                            }

    }
    ?>
