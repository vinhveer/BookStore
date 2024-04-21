<?php
include '../import/connect.php';

// Kiểm tra xem có ID sản phẩm được truyền qua URL không
if(isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Truy vấn để lấy thông tin chi tiết của sản phẩm
    $sql = "SELECT 
                p.product_id,
                CASE
                    WHEN b.book_name IS NOT NULL THEN b.book_name
                    WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                    ELSE 'Unknown'
                END AS product_name,
                p.product_price,
                p.product_quantity
            FROM 
                products p
            LEFT JOIN 
                books b ON p.product_id = b.product_id
            LEFT JOIN 
                others_products op ON p.product_id = op.product_id
            JOIN 
                product_categories pc ON p.category_id = pc.category_id
            WHERE 
                p.product_id = ?";
    
    $params = array($product_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Hiển thị thông tin chi tiết của sản phẩm
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<h2>Product Details</h2>";
        echo "<p><strong>Product ID:</strong> " . $row['product_id'] . "</p>";
        echo "<p><strong>Product Name:</strong> " . $row['product_name'] . "</p>";
        echo "<p><strong>Product Price:</strong> $" . $row['product_price'] . "</p>";
        echo "<p><strong>Product Quantity:</strong> " . $row['product_quantity'] . "</p>";
        // Thêm các trường khác nếu cần thiết
    }
} else {
    echo "Invalid product ID.";
}
?>
