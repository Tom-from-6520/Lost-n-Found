<?php
session_start();
$_SESSION['uid'] = null;
header('Location: ./landing.php');
?>