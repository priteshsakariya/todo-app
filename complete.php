<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("UPDATE tasks SET is_completed = 1 WHERE id = $id");
header("Location: index.php");
?>