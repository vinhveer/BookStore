<?php
include_once '../import/connect.php';
$sql = "SELECT
            e.employee_id,
            CONCAT(u.last_name, ' ', u.first_name) AS Employee_Name,
            es.salary_base * sc.salary_coefficient_value AS Salary
        FROM
            employees e
        INNER JOIN
            users u ON e.user_id = u.user_id
        INNER JOIN
            employee_salary es ON e.employee_id = es.employee_id
        INNER JOIN
            salary_coefficient sc ON es.salary_coefficient_id = sc.salary_coefficient_id";
$result = sqlsrv_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Amazon Warehouse</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name">Manager</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="employee.html"><i class='bx bxs-dashboard'></i>Employees</a></li>
            <li><a href="attendance.html"><i class='bx bx-store-alt'></i>Attendance</a></li>
            <li><a href="orders.html"><i class='bx bx-analyse'></i>Orders</a></li>
            <li><a href="salary.html"><i class='bx bx-message-square-dots'></i>Salary</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
            </a>
        </nav>
        <main>
            <div class="header">
                <div class="left">
                    <h1>Employee</h1>
                    <ul class="breadcrumb">
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>
            <div class="employee">
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while ($row = sqlsrv_fetch_array($result)) {?>
                        <tr>
                        <tr>
                            <td>NV<?php echo $row['employee_id']; ?></td>
                            <td><?php echo $row['Employee_Name']; ?></td>
                            <td><?php echo $row['Salary']; ?></td>
                            <td>
                                <button class="edit">Edit</button>
                                <button class="delete">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
