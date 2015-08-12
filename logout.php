<?php
include "system/conn.php";
session_start();

$user = $_SESSION['user'];
$sql = "UPDATE users SET online='0' WHERE username = '$user'";
$result = $conn->query($sql);
session_unset(); 
header('Location: index.php');



?>