<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user.css">
    <title>Amazon Bookstore</title>
    <style>
        /* Your CSS styles here */
    </style>
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
            <li><a href="revenue.php"><i class='bx bxs-bar-chart-alt-2'></i></i>Revenue</a></li>
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

    <!-- Content -->
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
                        /
                        <li><a href="#" class="active">Order details</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Order details -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-edit' ></i>
                        <h3>Order details</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Unit price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP query to retrieve order details -->
                            <?php
                                // Kết nối CSDL
                                include_once '../import/connect.php';

                                // Lấy id từ URL
                                if(isset($_GET['id'])) {
                                    $order_id = $_GET['id'];

                                    // Thực hiện truy vấn SQL với id này
                                    $sql = "SELECT * FROM GetOrderDetails(?)";
                                    $params = array($order_id);
                                    $stmt = sqlsrv_query($conn, $sql, $params);

                                    // Hiển thị dữ liệu tương ứng
                                    if ($stmt !== false) {
                                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['product_price'] . "</td>";
                                            echo "<td>" . $row['quantity'] * $row['product_price'] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "Error querying database: " . sqlsrv_errors();
                                    }

                                    // Lấy giảm giá
                                    $sql_discount = "SELECT * FROM GetDiscount(?)";
                                    $params_discount = array($order_id);
                                    $stmt_discount = sqlsrv_query($conn, $sql_discount, $params_discount);
                                    if ($stmt_discount !== false) {
                                        $row_discount = sqlsrv_fetch_array($stmt_discount, SQLSRV_FETCH_ASSOC);
                                        $discount = $row_discount['discount'];
                                    } else {
                                        $discount = "Error querying discount: " . sqlsrv_errors();
                                    }

                                    // Lấy tổng số tiền
                                    $sql_total = "SELECT * FROM GetTotal(?)";
                                    $params_total = array($order_id);
                                    $stmt_total = sqlsrv_query($conn, $sql_total, $params_total);
                                    if ($stmt_total !== false) {
                                        $row_total = sqlsrv_fetch_array($stmt_total, SQLSRV_FETCH_ASSOC);
                                        $total_amount_on = $row_total['total_amount_on'];
                                    } else {
                                        $total_amount_on = "Error querying total amount: " . sqlsrv_errors();
                                    }

                                    sqlsrv_close($conn);
                                } else {
                                    echo "Invalid order ID";
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- Total Sales -->
                    <div class="total-sale">
                        <h4>Discount: <?php echo $discount; ?></h4>
                        <h2>Total Sales: <?php echo $total_amount_on; ?></h2>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="user.js"></script>
</body>

</html>
