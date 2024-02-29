<?php
$dsn ="mysql:host=localhost; dbname = todolist";
$username 'root';

try{
$db= new PDO($dsn, $username);
}
catch (PDOException){
$error_message = 'Database Error'
$error_message = $e->getMessage();
echo $error_message;
exit();
}
?>