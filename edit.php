<?php
include 'db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM tasks WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Edit Task</title></head>
<body>
<h2>Edit Task</h2>
<form action="update.php" method="POST">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">
  <input type="text" name="title" value="<?= $data['title'] ?>" required>
  <input type="date" name="due_date" value="<?= $data['due_date'] ?>" required>
  <select name="priority">
    <option value="Low" <?= $data['priority']=='Low'?'selected':'' ?>>Low</option>
    <option value="Medium" <?= $data['priority']=='Medium'?'selected':'' ?>>Medium</option>
    <option value="High" <?= $data['priority']=='High'?'selected':'' ?>>High</option>
  </select>
  <button type="submit">Update</button>
</form>
</body>
</html>