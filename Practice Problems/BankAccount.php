<?php
class BankAccouunt
{
    public $accountHolder;
    public $balance;
    public function __construct($accountHolder,$balance)
    {
    $this->accountHolder = $accountHolder;
    $this->balance = $balance;
    }
    public function deposit($amount)
    {
        if ($amount > 0)
            {
                $this->balance += $amount;
                echo "Deposited $amount \n";
            }
            else
                {
                    echo "Invalid Deposit Amount";
                }
    }
    public function withdraw($amount)
    {
        if ($amount <= 0)
            {
                echo "Invalid Withdraw Amount";
            }
            else
                {
                    $this->balance -= $amount;
                    echo "Withdrawn: $amount \n";
                }
    }
    public function checkBalance()
    {
        echo "Current balance: ".$this->balance."\n";
    }
}
$account=new BankAccouunt("Likhith",20000);
$account->deposit(50000);
$account->withdraw(2000);
$account->checkBalance();
?>    
