<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("location:index.php");
    exit;

}

?>

<h1>OPAAAAAAAAAA DEU CERTO
SEJA BEM VINDO</h1>
<a href ="Sair.php">SAIR </a>
