<?php
include 'db.php';

$title = $_POST['title'];
$due_date = $_POST['due_date'];
$priority = $_POST['priority'];

$conn->query("INSERT INTO tasks (title, due_date, priority) VALUES ('$title', '$due_date', '$priority')");
header("Location: index.php");
?>