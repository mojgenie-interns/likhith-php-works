<?php

require_once __DIR__ . "/config/Database.php";
require_once __DIR__ . "/classes/Expense.php";

$database = new Database();
$db = $database->connect();

$expense = new Expense($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $amount = $_POST["amount"];
    $expense_date = $_POST["expense_date"];

    $expense->add(
        $title,
        $category,
        $description,
        $amount,
        $expense_date
    );

    header("Location: index.php");
    exit;
}

$expenses = $expense->getAll();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Expense Management System</title>

    <style>

        body {
            font-family: Arial;
            margin: 40px;
        }

        input {
            padding: 8px;
            margin: 5px;
        }

        button {
            padding: 8px 15px;
            cursor: pointer;
        }

        table {
            margin-top: 30px;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

    </style>

</head>

<body>

<h1>Expense Management System</h1>

<h2>Add Expense</h2>

<form method="POST">

    <input
        type="text"
        name="title"
        placeholder="Title"
        required
    >

    <input
        type="text"
        name="category"
        placeholder="Category"
        required
    >

    <input
        type="text"
        name="description"
        placeholder="Description"
        required
    >

    <input
        type="number"
        name="amount"
        placeholder="Amount"
        step="0.01"
        required
    >

    <input
        type="date"
        name="expense_date"
        required
    >

    <button type="submit">
        Add Expense
    </button>

</form>

<h2>Expenses</h2>

<?php if (empty($expenses)): ?>

    <p>No expenses found.</p>

<?php else: ?>

<table>

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>

    <?php foreach ($expenses as $item): ?>

    <tr>

        <td><?php echo $item["id"]; ?></td>

        <td><?php echo $item["title"]; ?></td>

        <td><?php echo $item["category"]; ?></td>

        <td><?php echo $item["description"]; ?></td>

        <td>₹<?php echo $item["amount"]; ?></td>

        <td><?php echo $item["expense_date"]; ?></td>

    </tr>

    <?php endforeach; ?>

</table>

<?php endif; ?>

</body>

</html>