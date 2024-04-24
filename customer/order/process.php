<?php
session_start();

if (isset($_POST['delete_product'])) {
    if (isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];

        if (isset($_SESSION["product_ids"])) {

            $key = array_search($product_id, $_SESSION["product_ids"]);

            if ($key !== false) {
                unset($_SESSION["books"][$key]);
            }
        }

        header("Location: order.php");
        exit();
    } else {
        header("Location: order.php");
        exit();
    }
}

if (isset($_POST['card_pay']))
{
    $product_id = $_POST[''];
    $user_id = $_SESSION['user_id'];
    $total = $_POST['total'];
    $quantity = $_POST['quantity'];
    
    header("Location: successfully.php");
    exit();
}

if (isset($_POST['qr_pay']))
{
    header("Location: successfully.php");
    exit();
}

