<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Advanced Todo App</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="container">
<div class="card p-4 shadow-sm bg-white">


<h2> Advanced PHP To-Do App</h2>

<form class="row g-3" action="add.php" method="POST">
  <input type="text" class="form-control col-auto" name="title" placeholder="Task Title" required>
  <input type="date" class="form-control col-auto" name="due_date" required>
  <select class="form-select col-auto" name="priority">
    <option value="Low">Low</option>
    <option value="Medium" selected>Medium</option>
    <option value="High">High</option>
  </select>
  <button type="submit" class="btn btn-primary col-auto">Add Task</button>
</form>

<?php
$filter = $_GET['filter'] ?? 'all';

$sql = "SELECT * FROM tasks";
if ($filter == "completed") $sql .= " WHERE is_completed = 1";
elseif ($filter == "pending") $sql .= " WHERE is_completed = 0";
$sql .= " ORDER BY due_date ASC";

$result = $conn->query($sql);
?>

<div>
  <a href="?filter=all">All</a> |
  <a href="?filter=completed">Completed</a> |
  <a href="?filter=pending">Pending</a>
</div>

<table>
  <tr>
    <th>#</th>
    <th>Task</th>
    <th>Due</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>

  <?php while($row = $result->fetch_assoc()): ?>
    <tr class="<?= $row['is_completed'] ? 'completed' : '' ?>">
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['title']) ?></td>
      <td><?= $row['due_date'] ?></td>
      <td><?= $row['priority'] ?></td>
      <td><?= $row['is_completed'] ? ' Done' : ' Pending' ?></td>
      <td>
        <?php if (!$row['is_completed']): ?>
          <a href="complete.php?id=<?= $row['id'] ?>"><span class="btn btn-success btn-sm">Complete</span></a>
        <?php endif; ?>
        <a href="edit.php?id=<?= $row['id'] ?>"> <span class="btn btn-warning btn-sm">Edit</span></a>
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')"><span class="btn btn-danger btn-sm">Delete</span></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>


</div>
</body>

</html>