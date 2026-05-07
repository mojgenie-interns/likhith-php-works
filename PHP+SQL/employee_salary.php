<?php

$host = "localhost";
$user = "root";
$password = "1234567890";
$database = "company_db";

$conn = new mysqli($host, $user,'1234567890', $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to database successfully!\n";

class EmployeeSystem
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addEmployee()
    {
        $name = readline("Enter employee name: ");
        $department = readline("Enter department: ");
        $salary = readline("Enter salary: ");

        $stmt = $this->conn->prepare("INSERT INTO employees (name, department, salary) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $department, $salary);

        if ($stmt->execute()) {
            echo "Employee added successfully!\n";
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }

    public function viewEmployees()
    {
        $result = $this->conn->query("SELECT * FROM employees");

        if ($result->num_rows == 0) {
            echo "No employees found.\n";
            return;
        }

        echo "\n--- Employee List ---\n";

        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . "\n";
            echo "Name: " . $row['name'] . "\n";
            echo "Department: " . $row['department'] . "\n";
            echo "Salary: " . $row['salary'] . "\n";
            echo "----------------------\n";
        }
    }

    public function updateSalary()
    {
        $id = readline("Enter employee ID: ");
        $salary = readline("Enter new salary: ");

        $stmt = $this->conn->prepare("UPDATE employees SET salary = ? WHERE id = ?");
        $stmt->bind_param("di", $salary, $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Salary updated successfully!\n";
            } else {
                echo "Employee not found or salary unchanged.\n";
            }
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }

    public function deleteEmployee()
    {
        $id = readline("Enter employee ID to delete: ");

        $stmt = $this->conn->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Employee deleted successfully!\n";
            } else {
                echo "Employee not found.\n";
            }
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }

    public function searchByDepartment()
    {
        $department = readline("Enter department: ");

        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE department = ?");
        $stmt->bind_param("s", $department);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "No employees found in this department.\n";
            return;
        }

        echo "\n--- Employees in $department ---\n";

        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . "\n";
            echo "Name: " . $row['name'] . "\n";
            echo "Salary: " . $row['salary'] . "\n";
            echo "----------------------\n";
        }
    }
}

$system = new EmployeeSystem($conn);

while (true) {
    echo "\n===== Employee Salary Management System =====\n";
    echo "1. Add Employee\n";
    echo "2. View Employees\n";
    echo "3. Update Salary\n";
    echo "4. Delete Employee\n";
    echo "5. Search by Department\n";
    echo "6. Exit\n";

    $choice = readline("Enter your choice: ");

    switch ($choice) {
        case 1:
            $system->addEmployee();
            break;

        case 2:
            $system->viewEmployees();
            break;

        case 3:
            $system->updateSalary();
            break;

        case 4:
            $system->deleteEmployee();
            break;

        case 5:
            $system->searchByDepartment();
            break;

        case 6:
            echo "Exiting program...\n";
            exit;

        default:
            echo "Invalid choice. Try again.\n";
    }
}

$conn->close();

?>