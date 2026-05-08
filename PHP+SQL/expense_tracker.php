<?php

class ExpenseTracker
{
    public $conn;

    public function connectDatabase()
    {
        $host = "localhost";
        $user = "root";
        $password = "1234567890";
        $database = "expense_tracker_db";

        $this->conn = mysqli_connect($host, $user, $password, $database);

        if (!$this->conn)
        {
            die("Database Connection Failed\n");
        }

        echo "Database Connected Successfully!\n";
    }

    public function addIncome()
    {
        $source = readline("Enter income source: ");
        $amount = readline("Enter income amount: ");
        $date = readline("Enter income date YYYY-MM-DD: ");

        $sql = "INSERT INTO income(source, amount, income_date)
                VALUES('$source', '$amount', '$date')";

        if (mysqli_query($this->conn, $sql))
        {
            echo "Income Added Successfully!\n";
        }
        else
        {
            echo "Error Adding Income\n";
        }
    }

    public function viewIncome()
    {
        $sql = "SELECT * FROM income";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            echo "\n===== INCOME LIST =====\n";

            while ($row = mysqli_fetch_assoc($result))
            {
                echo "ID: " . $row['id'] . "\n";
                echo "Source: " . $row['source'] . "\n";
                echo "Amount: " . $row['amount'] . "\n";
                echo "Date: " . $row['income_date'] . "\n";
                echo "-----------------------\n";
            }
        }
        else
        {
            echo "No Income Found\n";
        }
    }

    public function addExpense()
    {
        $title = readline("Enter expense title: ");
        $category = readline("Enter category: ");
        $amount = readline("Enter expense amount: ");
        $date = readline("Enter expense date YYYY-MM-DD: ");

        $sql = "INSERT INTO expenses(title, category, amount, expense_date)
                VALUES('$title', '$category', '$amount', '$date')";

        if (mysqli_query($this->conn, $sql))
        {
            echo "Expense Added Successfully!\n";
        }
        else
        {
            echo "Error Adding Expense\n";
        }
    }

    public function viewExpenses()
    {
        $sql = "SELECT * FROM expenses";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            echo "\n===== EXPENSE LIST =====\n";

            while ($row = mysqli_fetch_assoc($result))
            {
                echo "ID: " . $row['id'] . "\n";
                echo "Title: " . $row['title'] . "\n";
                echo "Category: " . $row['category'] . "\n";
                echo "Amount: " . $row['amount'] . "\n";
                echo "Date: " . $row['expense_date'] . "\n";
                echo "------------------------\n";
            }
        }
        else
        {
            echo "No Expenses Found\n";
        }
    }

    public function viewTotalExpense()
    {
        $sql = "SELECT SUM(amount) AS total_expense FROM expenses";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row['total_expense'] == NULL)
        {
            echo "Total Expense: 0\n";
        }
        else
        {
            echo "Total Expense: " . $row['total_expense'] . "\n";
        }
    }

    public function deleteExpense()
    {
        $id = readline("Enter Expense ID to Delete: ");

        $sql = "DELETE FROM expenses WHERE id = '$id'";

        if (mysqli_query($this->conn, $sql))
        {
            echo "Expense Deleted Successfully!\n";
        }
        else
        {
            echo "Error Deleting Expense\n";
        }
    }

    public function viewBalance()
    {
        $incomeSql = "SELECT SUM(amount) AS total_income FROM income";
        $expenseSql = "SELECT SUM(amount) AS total_expense FROM expenses";

        $incomeResult = mysqli_query($this->conn, $incomeSql);
        $expenseResult = mysqli_query($this->conn, $expenseSql);

        $incomeRow = mysqli_fetch_assoc($incomeResult);
        $expenseRow = mysqli_fetch_assoc($expenseResult);

        $totalIncome = $incomeRow['total_income'];
        $totalExpense = $expenseRow['total_expense'];

        if ($totalIncome == NULL)
        {
            $totalIncome = 0;
        }

        if ($totalExpense == NULL)
        {
            $totalExpense = 0;
        }

        $balance = $totalIncome - $totalExpense;

        echo "\n===== BALANCE DETAILS =====\n";
        echo "Total Income: " . $totalIncome . "\n";
        echo "Total Expense: " . $totalExpense . "\n";
        echo "Balance: " . $balance . "\n";
    }

    public function viewSummary()
    {
        $incomeSql = "SELECT SUM(amount) AS total_income FROM income";
        $expenseSql = "SELECT SUM(amount) AS total_expense FROM expenses";
        $countSql = "SELECT COUNT(*) AS expense_count FROM expenses";

        $incomeResult = mysqli_query($this->conn, $incomeSql);
        $expenseResult = mysqli_query($this->conn, $expenseSql);
        $countResult = mysqli_query($this->conn, $countSql);

        $incomeRow = mysqli_fetch_assoc($incomeResult);
        $expenseRow = mysqli_fetch_assoc($expenseResult);
        $countRow = mysqli_fetch_assoc($countResult);

        $totalIncome = $incomeRow['total_income'];
        $totalExpense = $expenseRow['total_expense'];

        if ($totalIncome == NULL)
        {
            $totalIncome = 0;
        }

        if ($totalExpense == NULL)
        {
            $totalExpense = 0;
        }

        $balance = $totalIncome - $totalExpense;

        echo "\n===== EXPENSE TRACKER SUMMARY =====\n";
        echo "Total Income: " . $totalIncome . "\n";
        echo "Total Expense: " . $totalExpense . "\n";
        echo "Number of Expenses: " . $countRow['expense_count'] . "\n";
        echo "Current Balance: " . $balance . "\n";
    }
}

$tracker = new ExpenseTracker();
$tracker->connectDatabase();

while (true)
{
    echo "\n===== EXPENSE TRACKER MENU =====\n";
    echo "1. Add Income\n";
    echo "2. View Income\n";
    echo "3. Add Expense\n";
    echo "4. View Expenses\n";
    echo "5. View Total Expense\n";
    echo "6. Delete Expense\n";
    echo "7. View Balance\n";
    echo "8. View Summary\n";
    echo "9. Exit\n";

    $choice = readline("Enter your choice: ");

    if ($choice == 1)
    {
        $tracker->addIncome();
    }
    else if ($choice == 2)
    {
        $tracker->viewIncome();
    }
    else if ($choice == 3)
    {
        $tracker->addExpense();
    }
    else if ($choice == 4)
    {
        $tracker->viewExpenses();
    }
    else if ($choice == 5)
    {
        $tracker->viewTotalExpense();
    }
    else if ($choice == 6)
    {
        $tracker->deleteExpense();
    }
    else if ($choice == 7)
    {
        $tracker->viewBalance();
    }
    else if ($choice == 8)
    {
        $tracker->viewSummary();
    }
    else if ($choice == 9)
    {
        echo "Exiting Expense Tracker...\n";
        break;
    }
    else
    {
        echo "Invalid Choice\n";
    }
}

?>