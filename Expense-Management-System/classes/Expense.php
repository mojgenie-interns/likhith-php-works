<?php

class Expense
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM expenses ORDER BY id DESC";

        $result = $this->conn->query($sql);

        $expenses = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $expenses[] = $row;
            }
        }

        return $expenses;
    }

    public function add($title, $category, $description, $amount, $expense_date)
    {
        $sql = "INSERT INTO expenses
                (title, category, description, amount, expense_date)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sssds",
            $title,
            $category,
            $description,
            $amount,
            $expense_date
        );

        return $stmt->execute();
    }
}