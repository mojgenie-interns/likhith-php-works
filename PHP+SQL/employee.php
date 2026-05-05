<?php

require "db.php";

while (true) {
    echo "\n1. Add Employee\n";
    echo "2. View Employees\n";
    echo "3. Search by Department\n";
    echo "4. Update Salary\n";
    echo "5. Delete Employee\n";
    echo "6. Exit\n";

    $choice = readline("Enter choice: ");

    switch ($choice) {

        case 1:
            $name = readline("Enter name: ");
            $dept = readline("Enter department: ");
            $salary = readline("Enter salary: ");

            $sql = "INSERT INTO employees (name, department, salary) 
                    VALUES ('$name', '$dept', '$salary')";

            mysqli_query($conn, $sql);
            echo "Employee added\n";
            break;

        case 2:
            $result = mysqli_query($conn, "SELECT * FROM employees");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "{$row['id']} | {$row['name']} | {$row['department']} | {$row['salary']}\n";
            }
            break;

        case 3:
            $dept = readline("Enter department: ");

            $sql = "SELECT * FROM employees WHERE department='$dept'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "{$row['id']} | {$row['name']} | {$row['salary']}\n";
            }
            break;

        case 4:
            $id = readline("Enter employee ID: ");
            $salary = readline("Enter new salary: ");

            $sql = "UPDATE employees SET salary='$salary' WHERE id=$id";
            mysqli_query($conn, $sql);

            echo "Salary updated\n";
            break;

        case 5:
            $id = readline("Enter employee ID: ");

            $sql = "DELETE FROM employees WHERE id=$id";
            mysqli_query($conn, $sql);

            echo "Employee deleted\n";
            break;

        case 6:
            exit("Exiting...\n");

        default:
            echo "Invalid choice\n";
    }
}