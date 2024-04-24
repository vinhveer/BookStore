<?php
include '../import/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Employee</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="list.php" class="sidebar-link">
                        <i class="lni lni-list"></i>
                        <span>List</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="timekeeping.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Timekeeping</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="salary.php" class="sidebar-link">
                        <i class="lni lni-coin"></i>
                        <span>Salary</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="setting.php" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <h2>Select a Role</h2>
                <form action="" method="get">
                    <label for="role">Select Role:</label>
                    <select name="role" id="role">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                        <option value="employee">Employee</option>
                        <option value="warehouse">Warehouse</option>
                        <option value="manager">Manager</option>
                    </select>
                    <input type="submit" value="Submit">
                </form>

                <?php
                $selected_role = "";
                // Kiểm tra có dữ liệu form được gửi đi hay không
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    // Lấy giá trị role được chọn
                    if (isset($_GET["role"])) {
                        $selected_role = $_GET["role"];
                        // Tiếp tục xử lý...
                    } else {
                        echo "No role selected."; // Thông báo nếu không có vai trò được chọn
                    }

                    // Truy vấn để lấy thông tin của người dùng có vai trò được chọn
                    $sql_users = "SELECT u.*, CONCAT(u.first_name, ' ', u.last_name) AS full_name FROM users u
    INNER JOIN user_roles ur ON u.user_id = ur.user_id
    INNER JOIN roles r ON ur.role_id = r.role_id
    WHERE r.role_name = ?";
                    $params = array($selected_role);
                    $stmt = sqlsrv_query($conn, $sql_users, $params);

                    // Hiển thị bảng thông tin người dùng
                    if ($stmt !== false) {
                        // Kiểm tra số lượng hàng trả về
                        if (sqlsrv_has_rows($stmt)) {
                            echo "<h2 class='mt-3'>User Information</h2>";
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-bordered'>";
                            echo "<tr><th>User ID</th><th>Full Name</th><th>Gender</th><th>Image</th><th>Action</th><th>Delete</th></tr>";
                            // Loop qua từng hàng dữ liệu
                            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row["user_id"] . "</td>";
                                echo "<td>" . $row["full_name"] . "</td>";
                                echo "<td>" . ($row["gender"] == 1 ? "Male" : "Female") . "</td>";
                                echo "<td><img src='../" . $row["image_user"] . "' alt='User Image' style='width: 100px; height: auto;'></td>";
                                echo "<td><a href='view.php?user_id=" . $row["user_id"] . "'>View</a></td>";
                                echo "<td><a href='delete.php?user_id=" . $row["user_id"] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                        } else {
                            // Thông báo nếu không có người dùng nào được tìm thấy
                            echo "No users found with the selected role.";
                        }
                        // Giải phóng tài nguyên kết quả
                        sqlsrv_free_stmt($stmt);
                    } else {
                        // Xử lý lỗi nếu truy vấn không thành công
                        echo "Error executing query: " . print_r(sqlsrv_errors(), true);
                    }
                }
                ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script src="script.js"></script>
</body>

</html>