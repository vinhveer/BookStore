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
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-6">
                <h3>Cài đặt hệ thống</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fas fa-list me-2"></i>Tính năng</h4>
                        <hr class="info-divider">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <a href="setting_confi.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-cogs me-1"></i>Cấu hình chung </h5>
                                            <p>Xem và chỉnh sửa thông tin website cửa hàng của bạn</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="setting_info.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-info-circle me-1"></i>Thông tin và Liên hệ</h5>
                                            <p>Quản lý thông tin hệ thống phần mềm, chi tiết liên hệ</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <a href="setting_file.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-folder-open me-1"></i>Quản lý file </h5>
                                            <p>Upload và quản lí file dữ liệu. Xem sửa xóa khi cần thiết</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="setting_notification.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-bell me-1"></i>Thông báo</h5>
                                            <p>Quản lý thông báo hệ thống và khách hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <a href="setting_support.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-tools me-1"> </i>Hỗ trợ kĩ thuật</h5>
                                            <p>Hỗ trợ trao đổi thông tin khách hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="setting_address.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-map-marker-alt me-1"></i>Địa chỉ cửa hàng</h5>
                                            <p>Quản lý thông tin địa chỉ cửa hàng</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
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
