<?php
include '../import/connect.php';

// Kiểm tra xem có dữ liệu form được gửi đi hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $user_id = $_POST["user_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Cập nhật thông tin người dùng trong cơ sở dữ liệu
    $sql_update = "UPDATE users SET first_name=?, last_name=?, date_of_birth=?, gender=?, address=?, phone=?, email=? WHERE user_id=?";
    $params = array($first_name, $last_name, $date_of_birth, $gender, $address, $phone, $email, $user_id);
    $stmt = sqlsrv_query($conn, $sql_update, $params);

    if ($stmt !== false) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information: " . print_r(sqlsrv_errors(), true);
    }
}

// Kiểm tra nếu có tham số user_id trên URL
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];

    // Truy vấn để lấy thông tin người dùng từ user_id
    $sql_select = "SELECT * FROM users WHERE user_id=?";
    $params = array($user_id);
    $stmt = sqlsrv_query($conn, $sql_select, $params);

    if ($stmt !== false) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        // Hiển thị form chỉnh sửa thông tin người dùng
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>Edit User</h2>
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row["first_name"]; ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row["last_name"]; ?>">
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $row["date_of_birth"]->format('Y-m-d'); ?>">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="1" <?php echo ($row["gender"] == 1) ? "selected" : ""; ?>>Male</option>
                    <option value="0" <?php echo ($row["gender"] == 0) ? "selected" : ""; ?>>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row["address"]; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row["phone"]; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "Error fetching user information: " . print_r(sqlsrv_errors(), true);
    }
} else {
    echo "No user ID provided.";
}
?>
