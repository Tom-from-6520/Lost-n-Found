<?php
$host="cray.cc.gettysburg.edu";
$dbase="f21_2";
$user = "doandu01";
$pass = "doandu01";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbase", $user, $pass);
}
catch(PDOException $e) {
    // .  : string concatenation
    // -> : remote access operator
    die("Error connecting to mysql server " . $e->getMessage());
}
?>
