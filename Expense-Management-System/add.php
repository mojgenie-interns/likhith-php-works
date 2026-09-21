<?php

require_once "config/Database.php";
require_once "classes/Expense.php";

$database = new Database();
$conn = $database->connect();
$expense = new Expense($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];
    $amount = (float) $_POST["amount"];
    $category = $_POST["category"];
    $date = $_POST["expense_date"];
    $description = $_POST["description"];

    if ($expense->add($title, $amount, $category, $date, $description)) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Add New Expense</h1>

    <form method="POST">

        <label>Title</label>
        <input type="text" name="title" required>

        <label>Amount</label>
        <input type="number" name="amount" step="0.01" required>

        <label>Category</label>
        <input type="text" name="category" required>

        <label>Date</label>
        <input type="date" name="expense_date" required>

        <label>Description</label>
        <textarea name="description"></textarea>

        <button type="submit">Add Expense</button>

    </form>

    <a href="index.php">← Back to Dashboard</a>

</div>

</body>
</html>