<?php
session_start();
//apagando senha de entrada
unset($_SESSION['id']);
header("location: index.php");

?>
