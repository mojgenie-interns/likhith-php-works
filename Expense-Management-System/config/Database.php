<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "expense_manager";

    public function connect()
    {
        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}