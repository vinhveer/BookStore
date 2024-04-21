<?php

$servername = "DESKTOP-ARM6I0A\SQLEXPRESS";
$database = "BookStore";
$uid = "sa";
$pass = "12345";


$connection = [
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass,
    "CharacterSet" => "UTF-8",
];

$connect = sqlsrv_connect($servername, $connection);
if (!$connect) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "";
}
?>
