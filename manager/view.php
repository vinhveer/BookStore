<?php
include '../import/connect.php';

// Kiểm tra xem user_id đã được truyền qua GET hay không
if (isset($_GET['user_id'])) {
    // Lấy user_id từ tham số GET
    $user_id = $_GET['user_id'];

    // Truy vấn để lấy thông tin của người dùng dựa trên user_id
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $params = array($user_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Kiểm tra xem truy vấn có thành công hay không
    if ($stmt !== false) {
        // Kiểm tra xem có hàng dữ liệu trả về không
        if (sqlsrv_has_rows($stmt)) {
            // Lấy thông tin của người dùng từ kết quả truy vấn
            $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            // Hiển thị thông tin chi tiết của người dùng
            echo "<h2>User Details</h2>";
            echo "<ul>";
            echo "<li>User ID: " . $user['user_id'] . "</li>";
            echo "<li>First Name: " . $user['first_name'] . "</li>";
            echo "<li>Last Name: " . $user['last_name'] . "</li>";
            echo "<li>Date of Birth: " . $user['date_of_birth']->format('Y-m-d') . "</li>";
            echo "<li>Gender: " . ($user['gender'] == 1 ? "Male" : "Female") . "</li>";
            echo "<li>Address: " . $user['address'] . "</li>";
            echo "<li>Phone: " . $user['phone'] . "</li>";
            echo "<li>Email: " . $user['email'] . "</li>";
            echo "<li>Image: <img src='../" . $user['image_user'] . "' alt='User Image' style='width: 100px; height: auto;'></li>";
            echo "</ul>";

            // Button để chuyển sang trang edit.php với user_id tương ứng
            echo "<a href='edit.php?user_id=" . $user_id . "' class='btn btn-primary'>Edit</a>";

            // Button để quay lại trang list.php
            echo "<a href='list.php' class='btn btn-secondary'>Back</a>";
        } else {
            // Thông báo nếu không có dữ liệu phù hợp với user_id
            echo "No user found with the specified ID.";
        }

        // Giải phóng tài nguyên kết quả
        sqlsrv_free_stmt($stmt);
    } else {
        // Xử lý lỗi nếu truy vấn không thành công
        echo "Error executing query: " . print_r(sqlsrv_errors(), true);
    }
} else {
    // Thông báo nếu không có user_id được truyền vào
    echo "No user ID provided.";
}
?>
