<?php
session_start();

if(!isset($_SESSION['adminSession']))
{
 header("Location: admin.php");
}
else if(isset($_SESSION['adminSession'])!="")
{
 header("Location: ../index.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['adminSession']);
 header("Location: ../index.php");
}
?>