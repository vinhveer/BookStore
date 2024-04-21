<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['delete_product'])) {

    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if (isset($_SESSION['product_ids'])) {
            $index = array_search($product_id, $_SESSION['product_ids']);
            if ($index !== false) {
                unset($_SESSION['product_ids'][$index]);
                $_SESSION['product_ids'] = array_values($_SESSION['product_ids']);
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['delete_product'])) {
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
} else {
    header("Location: order.php");
    exit();
}

