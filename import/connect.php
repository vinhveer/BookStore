<?php
<<<<<<< HEAD

=======
>>>>>>> ngan
$servername = "DESKTOP-ARM6I0A\SQLEXPRESS";
$database = "BookStore";
$uid = "sa";
$pass = "12345";
<<<<<<< HEAD

=======
>>>>>>> ngan

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
<<<<<<< HEAD
=======

session_start();

>>>>>>> ngan
