<?php
session_start();
$_SESSION['uid'] = $_POST['tfName'];
$_SESSION['pass'] = $_POST['pass'];

header('Location: ./landing.php');
?>
