<?php

$conn = new mysqli("localhost", "root", "1234567890", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class StudentManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addStudent()
    {
        $roll_no = readline("Enter roll number: ");
        $name = readline("Enter student name: ");
        $subject = readline("Enter subject: ");
        $marks = readline("Enter marks: ");

        $sql = "INSERT INTO students (roll_no, name, subject, marks) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issi", $roll_no, $name, $subject, $marks);

        if ($stmt->execute()) {
            echo "Student added successfully!\n";
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }

    public function viewStudents()
    {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "\n--- Student List ---\n";

            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "\n";
                echo "Roll No: " . $row["roll_no"] . "\n";
                echo "Name: " . $row["name"] . "\n";
                echo "Subject: " . $row["subject"] . "\n";
                echo "Marks: " . $row["marks"] . "\n";
                echo "-------------------\n";
            }
        } else {
            echo "No students found.\n";
        }
    }

    public function searchStudent()
    {
        $roll_no = readline("Enter roll number to search: ");

        $sql = "SELECT * FROM students WHERE roll_no = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $roll_no);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "\nStudent Found:\n";
            echo "ID: " . $row["id"] . "\n";
            echo "Roll No: " . $row["roll_no"] . "\n";
            echo "Name: " . $row["name"] . "\n";
            echo "Subject: " . $row["subject"] . "\n";
            echo "Marks: " . $row["marks"] . "\n";
        } else {
            echo "Student not found.\n";
        }
    }

    public function updateMarks()
    {
        $roll_no = readline("Enter roll number: ");
        $marks = readline("Enter new marks: ");

        $sql = "UPDATE students SET marks = ? WHERE roll_no = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $marks, $roll_no);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Marks updated successfully!\n";
            } else {
                echo "No student found with that roll number.\n";
            }
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }

    public function deleteStudent()
    {
        $roll_no = readline("Enter roll number to delete: ");

        $sql = "DELETE FROM students WHERE roll_no = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $roll_no);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "Student deleted successfully!\n";
            } else {
                echo "No student found with that roll number.\n";
            }
        } else {
            echo "Error: " . $stmt->error . "\n";
        }
    }
}

$manager = new StudentManager($conn);

while (true) {
    echo "\n===== Student Marks Management =====\n";
    echo "1. Add Student\n";
    echo "2. View Students\n";
    echo "3. Search Student\n";
    echo "4. Update Marks\n";
    echo "5. Delete Student\n";
    echo "6. Exit\n";

    $choice = readline("Enter your choice: ");

    switch ($choice) {
        case 1:
            $manager->addStudent();
            break;

        case 2:
            $manager->viewStudents();
            break;

        case 3:
            $manager->searchStudent();
            break;

        case 4:
            $manager->updateMarks();
            break;

        case 5:
            $manager->deleteStudent();
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