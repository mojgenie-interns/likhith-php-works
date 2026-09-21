<?php

require_once "config/Database.php";
require_once "classes/Expense.php";

$database = new Database();
$conn = $database->connect();

$expense = new Expense($conn);

while (true) {

    echo "\n";
    echo "==============================\n";
    echo "   EXPENSE MANAGEMENT SYSTEM\n";
    echo "==============================\n";
    echo "1. Add Expense\n";
    echo "2. View Expenses\n";
    echo "3. Delete Expense\n";
    echo "4. Exit\n";
    echo "==============================\n";

    $choice = readline("Enter your choice: ");

    switch ($choice) {

        case "1":

            $title = readline("Enter title: ");
            $amount = (float) readline("Enter amount: ");
            $category = readline("Enter category: ");
            $date = readline("Enter date (YYYY-MM-DD): ");
            $description = readline("Enter description: ");

            if ($expense->add(
                $title,
                $amount,
                $category,
                $date,
                $description
            )) {
                echo "\nExpense added successfully!\n";
            } else {
                echo "\nFailed to add expense.\n";
            }

            break;

        case "2":

            $result = $expense->getAll();

            echo "\n";
            echo "ID | Title | Amount | Category | Date\n";
            echo "---------------------------------------------\n";

            while ($row = $result->fetch_assoc()) {

                echo $row["id"] . " | ";
                echo $row["title"] . " | ";
                echo $row["amount"] . " | ";
                echo $row["category"] . " | ";
                echo $row["expense_date"] . "\n";
            }

            break;

        case "3":

            $id = (int) readline("Enter expense ID to delete: ");

            if ($expense->delete($id)) {
                echo "\nExpense deleted successfully!\n";
            } else {
                echo "\nFailed to delete expense.\n";
            }

            break;

        case "4":

            echo "\nGoodbye!\n";
            exit;

        default:

            echo "\nInvalid choice. Try again.\n";
    }
}