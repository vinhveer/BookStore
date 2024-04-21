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
            <div class="logo-name"><span>A</span>Warehouse</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="orders.php"><i class='bx bx-store-alt'></i>Orders</a></li>
            <li><a href="user.php"><i class='bx bx-group'></i>User</a></li>
            <li><a href="salary.php"><i class='bx bx-coin-stack'></i>Salary</a></li>
            <li><a href="revenue.php"><i class='bx bxs-bar-chart-alt-2'></i>Revenue</a></li>
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
                    <input type="search" name="search" placeholder="Search ID...">
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
                        <li><a href="#">Amazon</a></li>
                        /
                        <li><a href="#" class="active">Orders</a></li>
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
                        <i class='bx bx-x-circle'></i>
                        <h3>Not accepted</h3>
                        <form action="">
                            <input type="search" name="search" placeholder="Search ID...">
                            <button type="submit" name="submit"><i class='bx bx-search'></i></button>
                        </form>
                        <div class="dropdown">
                            <button class="dropbtn">Not accepted</button>
                            <div class="dropdown-content">
                                <a href="orders_next.php">Have accepted</a>
                            </div>
                        </div> 
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // Kết nối CSDL
                            $serverName = "TN";
                            $connectionInfo = array("Database"=>"BookStore");
                            $conn = sqlsrv_connect($serverName, $connectionInfo);

                            // Kiểm tra kết nối
                            if ($conn) {
                                // Xử lý tìm kiếm
                                if (isset($_GET['search']) && !empty($_GET['search'])) {
                                    $search_id = $_GET['search'];
                                    // Gọi hàm FindOrderO và thực hiện truy vấn
                                    $sql = "SELECT * FROM FindOrderO(?)";
                                    $params = array($search_id);
                                    
                                } else {
                                    // Mặc định hiển thị tất cả đơn hàng chưa được chấp nhận
                                    $sql = "SELECT * FROM FindOrderO(NULL)";
                                    $params = array();
                                }

                                // Thực hiện câu truy vấn
                                $stmt = sqlsrv_query($conn, $sql, $params);

                                // Kiểm tra và hiển thị kết quả
                                if ($stmt !== false) {
                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['order_id'] . "</td>";
                                        echo "<td>" . $row['customer_name'] . "</td>";
                                        echo "<td><a href='orders_detail.php?id=" . $row['order_id'] . "'>Click to see</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "Lỗi truy vấn: " . sqlsrv_errors();
                                }

                                // Đóng kết nối
                                sqlsrv_close($conn);
                            } else {
                                echo "Kết nối đến CSDL thất bại";
                            }
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
