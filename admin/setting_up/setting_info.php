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
        h3,hr{
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
        <h3 class="text-center">Thông tin hệ thống</h3>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin hệ thống
                    </div>
                    <div class="card-body">
                        <p class="d-flex justify-content-between">Version: 1.0.0<a href="">Xem chi tiết</a></p>
                        <p>Developed by: Your Company Name</p>
                        <p>Email: info@company.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin phiên bản
                    </div>
                    <div class="card-body">
                        <p>Phiên bản mới nhất: 1.1.0</p>
                        <p>Ngày cập nhật: 01/01/2024</p>
                        <p><a href="#">Xem chi tiết cập nhật</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Bản quyền
                    </div>
                    <div class="card-body">
                        <p>Bản quyền © 2024. Bảo lưu mọi quyền.</p>
                        <p>Được phát triển bởi Your Company Name.</p>
                        <p>Mã: IVAGSSSSF</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Liên hệ
                    </div>
                    <div class="card-body">
                        <p class="d-flex justify-content-between">Thông tin liên hệ<a href="">Xem chi tiết</a></p>
                        <p>Điện thoại: 0123 456 789</p>
                        <p>Email: contact@company.com</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container mt-4 mb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Thông tin bảo hành
                        </div>
                        <div class="card-body">
                            <p><strong>Mã hợp đồng:</strong> HD123456</p>
                            <p><strong>Ngày ký:</strong> 01/04/2024</p>
                            <p><strong>Ngày hết hạn:</strong> 01/04/2025</p>
                            <p><strong>Trạng thái:</strong> Đã kích hoạt</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Thông tin khách hàng
                        </div>
                        <div class="card-body">
                            <p><strong>Tên khách hàng:</strong> Nguyễn Văn A</p>
                            <p><strong>Email:</strong> example@example.com</p>
                            <p><strong>Số điện thoại:</strong> 0123 456 789</p>
                            <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận XYZ, TP. HCM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        </div>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>
