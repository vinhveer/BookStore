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
                <h1>Attendance Management</h1>

                <form action="submit_attendance.php" method="post">
                    <label for="role">Select Role:</label>
                    <select name="role" id="role">
                        <option value="1">Manager</option>
                        <option value="2">Salesperson</option>
                        <!-- Add more options for other roles as needed -->
                    </select>
                    <input type="submit" value="Submit">
                </form>

                <?php
                // Include the connection file
                include '../import/connect.php';

                // Check if a role has been selected
                if (isset($_POST['role'])) {
                    $role_id = $_POST['role'];

                    // Query to fetch employees for the selected role
                    $sql = "SELECT users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS employee_name
FROM users
INNER JOIN user_roles ON users.user_id = user_roles.user_id
WHERE user_roles.role_id = $role_id";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output a form for each employee
                        echo "<form action='submit_attendance.php' method='post'>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<label><input type='checkbox' name='attendance[]' value='" . $row['user_id'] . "'>" . $row['employee_name'] . "</label><br>";
                        }
                        echo "<input type='submit' value='Submit Attendance'>";
                        echo "</form>";
                    } else {
                        echo "No employees found for this role.";
                    }
                }
                ?>
            </div>
        </div>


        <div class="container">
           <input type="week" name="" id="">
           <button type="button" class="btn btn-primary">Tìm</button>
            <table class="table">
                <thead>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Điểm danh</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Ngạn</td>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                </tbody>
            </table>

            <button type="submit">Lưu</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script src="script.js"></script>
</body>

</html>