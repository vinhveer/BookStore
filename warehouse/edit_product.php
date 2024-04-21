<?php
include '../import/connect.php';

// Kiểm tra xem có product_id được đặt trong URL không
if(isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];

    // Truy vấn để lấy chi tiết sản phẩm dựa trên product_id
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $params = array($product_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Lấy thông tin chi tiết của sản phẩm
    $product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    // Hiển thị biểu mẫu để chỉnh sửa thông tin sản phẩm
    echo "<h2>Edit Product</h2>";
    echo "<form action='update_product.php' method='post'>";
    echo "<input type='hidden' name='product_id' value='" . $product_id . "'>";
    // echo "Product Name: <input type='text' name='product_name' value='" . $product["product_name"] . "'><br>";
    echo "Product Price: <input type='text' name='product_price' value='" . $product["product_price"] . "'><br>";
    echo "Product Quantity: <input type='text' name='product_quantity' value='" . $product["product_quantity"] . "'><br>";
    echo "<input type='submit' value='Update Product'>";
    echo "</form>";
}
?>
