<?php
include '../import/connect.php';

// Xử lý khi nhân viên đăng ký điểm danh
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem người dùng đã nhập mã nhân viên hay chưa
    if (isset($_POST["employee_id"]) && !empty($_POST["employee_id"])) {
        $employee_id = $_POST["employee_id"];

        // Thực hiện thêm dữ liệu điểm danh vào bảng employee_attendance
        $attendance_date = date("Y-m-d"); // Lấy ngày hiện tại
        $sql_insert_attendance = "INSERT INTO employee_attendance (employee_id, attendance_date) VALUES (?, ?)";
        $params = array($employee_id, $attendance_date);
        $stmt = sqlsrv_query($conn, $sql_insert_attendance, $params);

        if ($stmt === false) {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "Attendance recorded successfully.";
        }
    } else {
        echo "Please enter employee ID.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
</head>
<body>
    <h2>Employee Attendance</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" required>
        <input type="submit" value="Check-in">
    </form>
    <br>
    <h3>Employee List</h3>
    <table border="1">
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php
        // Query để lấy danh sách nhân viên
        $sql_employee_list = "SELECT * FROM employees";
        $stmt_employee_list = sqlsrv_query($conn, $sql_employee_list);

        // Hiển thị danh sách nhân viên
        while ($row_employee = sqlsrv_fetch_array($stmt_employee_list, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row_employee['employee_id'] . "</td>";
            echo "<td>" . $row_employee['full_name'] . "</td>";
            echo "</tr>";
        }

        // Giải phóng tài nguyên statement
        sqlsrv_free_stmt($stmt_employee_list);
        ?>
    </table>
</body>
</html>
