<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

$uid = $_SESSION['user_id'];

if (isset($_POST['add_task'])) {
    $task = $_POST['task'];
    $date = $_POST['date'];
    mysqli_query($conn, "INSERT INTO tasks (user_id, task, task_date, status)
                         VALUES ('$uid','$task','$date','Pending')");
}

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id='$uid'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Study Planner</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>📚 Daily Study Planner</h2>

    <form method="POST">
        Task: <input type="text" name="task" required>
        Date: <input type="date" name="date" required>
        <button type="submit" name="add_task">Add Task</button>
    </form>

    <table>
        <tr>
            <th>Task</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['task']}</td>
                    <td>{$row['task_date']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
