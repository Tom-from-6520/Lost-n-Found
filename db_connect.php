<?php
$host="cray.cc.gettysburg.edu";
$dbase="f21_2";
$user = "doandu01";
$pass = "someWrongPassword";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
}
catch(PDOException $e) {
    die("Error connecting to mysql server " . $e->getMessage());
}
?>
