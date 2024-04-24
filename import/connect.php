<?php
$servername = " VinhVeer\VINHVEER";
$database = "BookStore";
// $uid = "sa";
// $pass = "@Cancot123";

// // Use when connect with SQL Server Authentication method
// $connection = [
//     "Database" => $database,
//     "Uid" => $uid,
//     "PWD" => $pass,
//     "CharacterSet" => "UTF-8",
// ];


// Use when connect with Windows Authentication method
$connection = [
    "Database" => $database,
    "CharacterSet" => "UTF-8",
];

$conn = sqlsrv_connect($servername, $connection);
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "";
}

session_start();
