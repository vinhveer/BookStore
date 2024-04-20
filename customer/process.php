<?php
include '../import/connect.php';
include '../import/libary.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $sql = "INSERT INTO carts (user_id, product_id, quantity, created_at, status)
            VALUES (?, ?, 1, CURRENT_TIMESTAMP, 1)";
    
    $stmt = sqlsrv_prepare($conn, $sql, array($user_id, $product_id));
    
    if (sqlsrv_execute($stmt)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors();
    }
}


if (isset($_POST["buy_now"]))
{
    $arrays = $_POST['books'];
    
    foreach ($arrays as $product_id) {
        echo $product_id;
    }
}
