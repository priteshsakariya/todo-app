<?php
include 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$due_date = $_POST['due_date'];
$priority = $_POST['priority'];

$conn->query("UPDATE tasks SET title='$title', due_date='$due_date', priority='$priority' WHERE id=$id");
header("Location: index.php");
?>