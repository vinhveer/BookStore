<?php
    include_once '../../import/connect.php';
    $sql_order_index = "SELECT
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Pending') AS pending_orders,
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Confirmed') AS confirmed_orders,
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Deleted') AS deleted_orders,
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Unpaid') AS unpaid_orders,
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Shipped') AS shipped_orders,
                (SELECT COUNT(*) FROM orders_online WHERE status_on = 'Completed') AS completed_orders,
                (SELECT COUNT(*) FROM orders_offline) AS offline_orders";
    $result_order_index = sqlsrv_query($connect, $sql_order_index);
    $row = sqlsrv_fetch_array($result_order_index);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Home Admin</title>
    <style>
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>&nbspBookstore</div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="../setting_up/index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
                <div class="left ms-3">
                    <h1>Order</h1>
                </div>
                <div class="d-flex">
                    <a href="order_list.php" class="report">
                    <i class='bx bx-calendar' ></i>
                        <span>Xem chi tiết đơn hàng</span>
                    </a>
                    <a href="#" class="report">
                        <i class='bx bx-cloud-download'></i>
                        <span>Xuất báo cáo</span>
                    </a>
                </div>
            </div>


    <div class="container-fluid mt-4 ">
        <div class="row">
            <div class="card col-md-5 me-1 ms-4">
                <div class="card-body">
                            <h5 class="card-title">Thống kê</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Đã thực hiện <?php echo $row['confirmed_orders']; ?></h5>
                                                        <!-- Thêm icon vào đây -->
                                                        <p class="card-text border"><i class='bx bxs-info-circle'></i></i> Chưa thực hiện: <?php echo $row['pending_orders']; ?></p>
                                                        <p class="card-text border"><i class='bx bxs-check-circle'></i> Đã thực hiện: <?php echo $row['confirmed_orders']; ?></p>
                                                        <p class="card-text border"><i class='bx bxs-x-circle'></i> Đã hủy: <?php echo $row['deleted_orders']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Đã thanh toán: <?php echo $row['completed_orders']; ?></h5>
                                                        <!-- Thêm icon vào đây -->
                                                        <p class="card-text border"><i class='bx bxs-info-circle'></i></i> Chưa thanh toán: <?php echo $row['unpaid_orders']; ?></p>
                                                        <p class="card-text border"><i class='bx bxs-compass' ></i></i> Đang giao hàng: <?php echo $row['shipped_orders']; ?></p>
                                                        <p class="card-text border"><i class='bx bxs-check-circle'></i> Đã thanh toán: <?php echo $row['completed_orders']+$row['offline_orders']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                    </div>
                    <div class="card col-md-6 ms-5">
                            <div class="card-body">
                            <h5 class="card-title">Biểu đồ đơn hàng</h5>
                            <hr>
                                <!-- Nội dung biểu đồ -->
                            <canvas id="orderChart" width="200" height="100"></canvas>
                        </div>
                    </div>
        </div>
        </div>
    </main>
    </div>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Lấy dữ liệu từ PHP và gán vào biến JavaScript
    var completed_orders = <?php echo $row['completed_orders']+$row['offline_orders']; ?>;
    var unpaid_orders = <?php echo $row['unpaid_orders']; ?>;
    var deleted_orders = <?php echo $row['deleted_orders']; ?>;
    var shipped_orders = <?php echo $row['shipped_orders']; ?>;
    var pending_orders = <?php echo $row['pending_orders']; ?>;
    var confirmed_orders = <?php echo $row['confirmed_orders']; ?>;

    // Lấy thẻ canvas
    var ctx = document.getElementById('orderChart').getContext('2d');

    // Dữ liệu từ PHP cho biểu đồ
    var data = {
        labels: ['Đã thanh toán', 'Chưa thanh toán', 'Đã hủy', 'Đang giao hàng','Chưa thực hiện','Đã thực hiện'],
        datasets: [{
            label: 'Thống kê đơn hàng',
            data: [completed_orders, unpaid_orders, deleted_orders, shipped_orders, pending_orders, confirmed_orders],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(13, 131, 51, 0.2)',
                'rgba(131, 13, 98, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(13, 131, 51, 1)',
                'rgba(131, 13, 98, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Tạo biểu đồ
    var orderChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
