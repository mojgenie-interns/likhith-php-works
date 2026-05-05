<?php

$conn = mysqli_connect("127.0.0.1", "root", "1234567890", "php_practice", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully\n";

?>