<?php

require "db.php";

$name = readline("Enter name: ");
$age = readline("Enter age: ");
$course = readline("Enter course: ");

$sql = "INSERT INTO students (name, age, course) VALUES ('$name', '$age', '$course')";

if (mysqli_query($conn, $sql)) {
    echo "Student added successfully\n";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>