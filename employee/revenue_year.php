<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user.css">
    <title>Amazon Bookstore</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span></span>Employee</div>
        </a>
        <ul class="side-menu">
            <li><a href="orders.php"><i class='bx bx-store-alt'></i>Orders</a></li>
            <li><a href="user.php"><i class='bx bx-group'></i>User</a></li>
            <li><a href="salary.php"><i class='bx bx-coin-stack' ></i>Salary</a></li>
            <li class="active"><a href="revenue.php"><i class='bx bxs-bar-chart-alt-2'></i></i>Revenue</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Message</a></li>

            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
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
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Amazon</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Amazon
                            </a></li>
                        /
                        <li><a href="#" class="active">Revenue</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bxs-component'></i>
                        <h3>Revenue</h3>
                        <div class="dropdown">
                            <button class="dropbtn">By Year<i class='bx bx-calendar'></i></button>
                            <div class="dropdown-content">
                                <a href="revenue.php">By Date</a>
                                <a href="revenue_month.php">By Month</a>
                            </div>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Order total</th>
                                <th>Total amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kết nối đến cơ sở dữ liệu
                            include_once '../import/connect.php';

                            // Kiểm tra kết nối
                            if (!$conn) {
                                echo "Kết nối đến CSDL thất bại: " . sqlsrv_errors();
                            } else {
                                // Chuẩn bị câu truy vấn SQL
                                $sql = "SELECT
                                            YEAR(Ngay) AS Year,
                                            SUM(TongSoHoaDon) AS TongSoHoaDon,
                                            SUM(ThuNhap) AS TongThuNhap
                                        FROM (
                                            SELECT
                                                order_date_off AS Ngay,
                                                COUNT(*) AS TongSoHoaDon,
                                                SUM(total_amount_off) AS ThuNhap
                                            FROM
                                                orders_offline
                                            GROUP BY
                                                YEAR(order_date_off), order_date_off

                                            UNION ALL

                                            SELECT
                                                order_date_on AS Ngay,
                                                COUNT(*) AS TongSoHoaDon,
                                                SUM(total_amount_on) AS ThuNhap
                                            FROM
                                                orders_online
                                            WHERE
                                                delivery_status = 'Delivered'
                                            GROUP BY
                                                YEAR(order_date_on), order_date_on
                                        ) AS T
                                        GROUP BY
                                            YEAR(Ngay)";

                                // Thực hiện truy vấn và lặp qua kết quả
                                $result = sqlsrv_query($conn, $sql);
                                if ($result === false) {
                                    echo "Lỗi truy vấn: " . sqlsrv_errors();
                                } else {
                                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["Year"] . "</td>";
                                        echo "<td>" . $row["TongSoHoaDon"] . "</td>";
                                        echo "<td>" . $row["TongThuNhap"] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }

                            // Đóng kết nối
                            sqlsrv_close($conn);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="user.js"></script>
</body>
</html>
