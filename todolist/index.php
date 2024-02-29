<?php
// Insert a task if the submit button is clicked
if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $errors = "You must fill in the task";
    } else {
        $task = $_POST['task'];
        $sql = "INSERT INTO todoitems (Title, Description) VALUES ('$task', '')";
        mysqli_query($db, $sql);
        header('location: index.php'); // Redirect back to index.php
    }
}

$query = "SELECT * FROM todoitems";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td class='task'>" . $row['Title'] . "</td>";
    echo "<td class='delete'><a href='remove_task.php?id=" . $row['ItemNum'] . "'>X</a></td>";
    echo "</tr>";
}
if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
    $delete = $_POST['deleteItem']
    $sql = "DELETE FROM `todolist` where `id` = '$delete'"; 
}
echo '<td><button type="submit" name="deleteItem" value="'.$row['id'].'">Delete</button></td>"';
?>

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <div class="heading">
            <h2>To Do List</h2>
        </div>
        <form method="post" action="index.php" class="input_form">
            <input type="text" name="task" class="task_input" placeholder="Enter a task...">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
            <form action="" method="post">
        </form>
        <table>
        <tr>
            <th>Task</th>
            <th>Remove</th>
        </tr>
        </table>
    </body>
</html>