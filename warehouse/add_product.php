<?php
// Kết nối đến cơ sở dữ liệu
include '../import/connect.php';

// Biến lưu trữ thông báo
$message = '';

// Kiểm tra xem người dùng đã gửi biểu mẫu chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $product_price = $_POST["product_price"];
    $product_quantity = $_POST["product_quantity"];
    $category_id = $_POST["category_id"];

    // Chuẩn bị câu truy vấn SQL để thêm sản phẩm
    $sql = "INSERT INTO products (product_price, product_quantity, category_id) 
            VALUES (?, ?, ?)";
    
    // Chuẩn bị và thực thi câu truy vấn
    $params = array($product_price, $product_quantity, $category_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Kiểm tra kết quả thực thi câu truy vấn
    if ($stmt === false) {
        // Nếu có lỗi, in ra thông báo lỗi
        $message = "Error: " . print_r(sqlsrv_errors(), true);
    } else {
        // Nếu thành công, hiển thị thông báo thành công và chuyển hướng người dùng về trang inventory.php
        $message = "Product added successfully.";
        header("Location: inventory.php");
        exit(); // Đảm bảo không có mã HTML nào được xuất ra sau khi chuyển hướng
    }
}

// Đóng kết nối
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <!-- Hiển thị thông báo -->
    <?php if (!empty($message)) : ?>
    <p><?php echo $message; ?></p>
    <?php endif; ?>
    
    <!-- Biểu mẫu thêm sản phẩm -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <label for="product_price">Product Price:</label>
        <input type="number" name="product_price" id="product_price" min="0" step="0.01" required><br><br>
        
        <label for="product_quantity">Product Quantity:</label>
        <input type="number" name="product_quantity" id="product_quantity" min="0" required><br><br>
        
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            <!-- Lặp qua danh sách các danh mục và tạo các tùy chọn cho dropdown -->
            <?php
            include '../import/connect.php';
            $sql_categories = "SELECT category_id, category_name FROM product_categories";
            $stmt_categories = sqlsrv_query($conn, $sql_categories);

            if ($stmt_categories === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($row = sqlsrv_fetch_array($stmt_categories, SQLSRV_FETCH_ASSOC)) {
                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
            }

            sqlsrv_close($conn);
            ?>
        </select><br><br>
        
        <!-- Nút thêm sản phẩm -->
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
