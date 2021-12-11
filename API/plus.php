<?php
// коментарии 
session_start();

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;
//$user = ???
//$user = $_POST['user']; 
//$user = file_get_contents("C:\xampp\htdocs\OP\check_login.php");

include(getenv('MYAPP_CONFIG'));
//include('C:\xampp\htdocs\OP\check_login.php');
$user = $_SESSION["user"];
//$user = $_GET['user']; 

$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
//$sql = "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,'anonim')";
$sql = "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,$user)";
mysqli_query($conn,$sql);
// Проверка на ошибки:
//echo(mysqli_error($conn));
mysqli_close($conn);
echo($z);
//echo($user);