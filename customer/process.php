<?php
include '../import/connect.php';
include '../import/libary.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT * FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = sqlsrv_query($conn, $sql, array($user_id, $product_id));
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($row) {
        $quantity = $row['quantity'] + 1;
        $sql = "UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = sqlsrv_prepare($conn, $sql, array($quantity, $user_id, $product_id));

        if (sqlsrv_execute($stmt)) {
            header('Location: index.php');
            exit();
        } else {
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
                    echo "Code: " . $error['code'] . "<br />";
                    echo "Message: " . $error['message'] . "<br />";
                }
            }
        }
    } else {
        $sql = "INSERT INTO carts (user_id, product_id, quantity, created_at, status)
            VALUES (?, ?, 1, CURRENT_TIMESTAMP, 1)";

        $stmt = sqlsrv_prepare($conn, $sql, array($user_id, $product_id));

        if (sqlsrv_execute($stmt)) {
            header('Location: index.php');
            exit();
        } else {
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
                    echo "Code: " . $error['code'] . "<br />";
                    echo "Message: " . $error['message'] . "<br />";
                }
            }
        }
    }
}