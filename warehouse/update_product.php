<?php
include '../import/connect.php';

// Xử lý khi người dùng gửi biểu mẫu cập nhật thông tin sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $product_price = $_POST["product_price"];
    $product_quantity = $_POST["product_quantity"];

    // Truy vấn để cập nhật thông tin sản phẩm
    $sql = "UPDATE products SET product_price = ?, product_quantity = ? WHERE product_id = ?";
    $params = array($product_price, $product_quantity, $product_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Chuyển hướng người dùng sau khi cập nhật thành công
    header("Location: category.php");
}
?>
