<?php
    include_once '../../import/connect.php';
    $sql_order = "SELECT oo.order_id, oo.order_date_on, CONCAT(u.first_name, ' ', u.last_name) AS full_name, oo.status_on
    FROM orders_online AS oo
    JOIN customers AS c ON oo.customer_id = c.customer_id
    JOIN users AS u ON c.user_id = u.user_id;
    ";
    $result_order = sqlsrv_query($connect, $sql_order);
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
            <li><a href="index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Chats</a></li>
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <h3>Danh sách đơn hàng</h3>
            </div>
            <div class="col-md-5">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="tukhoa" value="">
                    <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn-primary float-end">Xuất Excel</button>
            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bảng liệt kê đơn hàng</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php  $i = 0;
                                while ($row_order = sqlsrv_fetch_array($result_order)) {?>
                                <tr>
                                    <th scope="row"><?php $i++; echo $i ?></th>
                                    <td>DH00<?php echo $row_order['order_id']; ?></td> <!-- Mã đơn hàng -->
                                    <?php $order_date = $row_order['order_date_on'];
                                    $formatted_date = $order_date->format('Y-m-d');?>
                                    <td><?php echo  $formatted_date; ?></td> <!-- Ngày đặt -->
                                    <td><?php echo $row_order['full_name']; ?></td> <!-- Tên khách hàng -->
                                    <td><?php echo $row_order['status_on']; ?></td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
