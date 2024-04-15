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
            <li><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li class="active"><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
            <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng A</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng A</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng E</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH002</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng B</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH003</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng C</td> <!-- Tên khách hàng -->
                                    <td>Chưa thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH006</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng D</td> <!-- Tên khách hàng -->
                                    <td>Đang thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
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
