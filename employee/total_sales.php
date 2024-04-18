<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Amazon Employee</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>Employee</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="index.php"><i class='bx bx-store-alt' ></i>Home</a></li>
            <li><a href="#"><i class='bx bx-group'></i>User</a></li>
            <li><a href="#"><i class='bx bx-message-dots' ></i></i>Chat</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
            <li><a href="#"><i class='bx bx-headphone' ></i>Support</a></li>
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
                    <h1>Bookstore</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Home
                            </a></li>
                        /
                        <li><a href="#" class="active">Total Sales</a></li>
                    </ul>
                </div>
                
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->
            <ul class="insights">
            <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            <?php
                                // Kết nối CSDL
                                $serverName = "TN"; // Tên máy chủ CSDL
                                $connectionInfo = array("Database"=>"BookStore");
                                $conn = sqlsrv_connect($serverName, $connectionInfo);

                                // Kiểm tra kết nối
                                if (!$conn) {
                                    die("Kết nối đến CSDL thất bại: " . sqlsrv_errors());
                                }

                                // Câu truy vấn SQL
                                $sqlPaidOrders = "SELECT COUNT(*) AS PaidOrders FROM orders_online WHERE status_on = 'Complete';";
                                // Thực thi câu truy vấn
                                $resultPaidOrders = sqlsrv_query($conn, $sqlPaidOrders);
                                // Kiểm tra và hiển thị kết quả
                                if ($resultPaidOrders === false) {
                                    die( print_r( sqlsrv_errors(), true));
                                }
                                // Lấy số lượng đơn hàng đã thanh toán
                                if ($rowPaidOrders = sqlsrv_fetch_array($resultPaidOrders, SQLSRV_FETCH_ASSOC)) {
                                    echo $rowPaidOrders['PaidOrders'];
                                } else {
                                    echo "0"; // Nếu không có đơn hàng nào đã thanh toán
                                }

                                // Đóng kết nối và giải phóng tài nguyên
                                sqlsrv_free_stmt($resultPaidOrders);
                                sqlsrv_close($conn);
                            ?>
                        </h3>
                        <p><a href="index2.php">Paid Order</a></p>
                    </span>
                </li>
                <li>
                    <i class='bx bx-book-content'></i>
                    <span class="info">
                        <h3>
                            <?php
                                // Kết nối CSDL
                                $serverName = "TN"; // Tên máy chủ CSDL
                                $connectionInfo = array("Database"=>"BookStore");
                                $conn = sqlsrv_connect($serverName, $connectionInfo);

                                // Kiểm tra kết nối
                                if (!$conn) {
                                    die("Kết nối đến CSDL thất bại: " . sqlsrv_errors());
                                }

                                // Câu truy vấn SQL
                                $sqlTotalOrders = "SELECT COUNT(*) AS TotalOrders FROM orders_online;";
                                // Thực thi câu truy vấn
                                $resultTotalOrders = sqlsrv_query($conn, $sqlTotalOrders);
                                // Kiểm tra và hiển thị kết quả
                                if ($resultTotalOrders === false) {
                                    die( print_r( sqlsrv_errors(), true));
                                }
                                // Lấy số lượng đơn hàng
                                if ($rowTotalOrders = sqlsrv_fetch_array($resultTotalOrders, SQLSRV_FETCH_ASSOC)) {
                                    echo $rowTotalOrders['TotalOrders'];
                                } else {
                                    echo "0"; // Nếu không có đơn hàng nào
                                }

                                // Đóng kết nối và giải phóng tài nguyên
                                sqlsrv_free_stmt($resultTotalOrders);
                                sqlsrv_close($conn);
                            ?>
                        </h3>
                        <p><a href="index1.php">Orders</a></p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-truck' ></i>
                    <span class="info">
                        <h3>
                            <?php
                                // Kết nối CSDL
                                $serverName = "TN"; // Tên máy chủ CSDL
                                $connectionInfo = array("Database"=>"BookStore");
                                $conn = sqlsrv_connect($serverName, $connectionInfo);

                                // Kiểm tra kết nối
                                if (!$conn) {
                                    die("Kết nối đến CSDL thất bại: " . sqlsrv_errors());
                                }

                                // Câu truy vấn SQL
                                $sqlPendingOrders = "SELECT COUNT(*) AS PendingOrders FROM orders_online WHERE status_on = 'Pending';";
                                // Thực thi câu truy vấn
                                $resultPendingOrders = sqlsrv_query($conn, $sqlPendingOrders);
                                // Kiểm tra và hiển thị kết quả
                                if ($resultPendingOrders === false) {
                                    die( print_r( sqlsrv_errors(), true));
                                }
                                // Lấy số lượng đơn hàng đang chờ xử lý
                                if ($rowPendingOrders = sqlsrv_fetch_array($resultPendingOrders, SQLSRV_FETCH_ASSOC)) {
                                    echo $rowPendingOrders['PendingOrders'];
                                } else {
                                    echo "0"; // Nếu không có đơn hàng nào đang chờ xử lý
                                }

                                // Đóng kết nối và giải phóng tài nguyên
                                sqlsrv_free_stmt($resultPendingOrders);
                                sqlsrv_close($conn);
                            ?>
                        </h3>
                        <p><a href="index3.php">Transport</a></p>
                    </span>
                </li>
                <li>
                    <i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            <?php
                                // Kết nối CSDL
                                $serverName = "TN"; // Tên máy chủ CSDL
                                $connectionInfo = array("Database"=>"BookStore");
                                $conn = sqlsrv_connect($serverName, $connectionInfo);

                                // Kiểm tra kết nối
                                if (!$conn) {
                                    die("Kết nối đến CSDL thất bại: " . sqlsrv_errors());
                                }

                                // Câu truy vấn SQL
                                $sqlTotalSales = "SELECT SUM(total_amount_on) AS TotalSales FROM orders_online WHERE status_on = 'Complete';";
                                // Thực thi câu truy vấn
                                $resultTotalSales = sqlsrv_query($conn, $sqlTotalSales);
                                // Kiểm tra và hiển thị kết quả
                                if ($resultTotalSales === false) {
                                    die( print_r( sqlsrv_errors(), true));
                                }
                                // Lấy tổng số tiền của các đơn hàng đã thanh toán
                                if ($rowTotalSales = sqlsrv_fetch_array($resultTotalSales, SQLSRV_FETCH_ASSOC)) {
                                    echo "$" . $rowTotalSales['TotalSales'];
                                } else {
                                    echo "$0"; // Nếu không có đơn hàng nào đã thanh toán
                                }

                                // Đóng kết nối và giải phóng tài nguyên
                                sqlsrv_free_stmt($resultTotalSales);
                                sqlsrv_close($conn);
                            ?>
                        </h3>
                        <p><a href="index4.php">Total Sales</a></p>
                    </span>
                </li>
            </ul>
            <div class="table-content">
                <h2>Orders</h2>
                <?php
                    // Kết nối CSDL
                    $serverName = "TN"; // Tên máy chủ CSDL
                    $connectionInfo = array("Database"=>"BookStore");
                    $conn = sqlsrv_connect($serverName, $connectionInfo);
                    // Kiểm tra kết nối
                    if (!$conn) {
                        die("Kết nối đến CSDL thất bại: " . sqlsrv_errors());
                    }
                    $sql = "SELECT * FROM GetDetailDay('2024-04-15');";
                    $result = sqlsrv_query($conn, $sql);
                    if ($result === false) {
                        die( print_r( sqlsrv_errors(), true));
                    }
                    echo "<table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Total payout</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>";
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>$" . number_format($row['total_amount_on'], 2) . "</td>";
                        echo "<td><a href='paid_order.php?order_id=" . $row['order_id'] . "'>Click to see</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                    // Giải phóng tài nguyên kết nối và kết quả
                    sqlsrv_free_stmt($result);
                    sqlsrv_close($conn);
                ?>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
