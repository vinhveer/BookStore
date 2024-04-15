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
            <li class="active"><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
        <div class="container-fluid mt-2 mb-5">
        <h3 class="text-center mb-4">Cài đặt thông báo hệ thống</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Thiết lập thông báo</h6>
                        <p class="card-text">Thiết lập cách hệ thống thông báo với người dùng.</p>
                        <form>
                            <div class="mb-3">
                                <label for="notificationMethod" class="form-label">Phương thức thông báo</label>
                                <select class="form-select" id="notificationMethod">
                                    <option selected>Chọn phương thức...</option>
                                    <option>Email</option>
                                    <option>Tin nhắn SMS</option>
                                    <option>Thông báo trực tiếp trên ứng dụng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                    <label for="notificationType" class="form-label">Loại thông báo</label>
                                    <select class="form-select" id="notificationType">
                                        <option selected disabled>Chọn loại thông báo</option>
                                        <option value="1">Thông báo quan trọng</option>
                                        <option value="2">Thông báo thường</option>
                                        <option value="3">Thông báo khẩn cấp</option>
                                    </select>
                                </div>
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="sendToAll">
                                    <label class="form-check-label" for="sendToAll">Gửi thông báo cho tất cả người dùng</label>
                                </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-cog me-1"></i>Lưu thiết lập</button>
                        </form>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Gửi thông báo</h6>
                            <p class="card-text">Gửi thông báo mới đến người dùng.</p>
                            <div class="col-md-6">
                                <form>
                                    <div class="mb-3">
                                        <label for="notificationTitle" class="form-label">Tiêu đề thông báo</label>
                                        <input type="text" class="form-control" id="notificationTitle" placeholder="Nhập tiêu đề">
                                    </div>
                                    <div class="mb-3">
                                        <label for="notificationContent" class="form-label">Nội dung thông báo</label>
                                        <textarea class="form-control" id="notificationContent" rows="3"
                                            placeholder="Nhập nội dung"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-envelope me-1"></i>Gửi thông báo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Thông báo mới nhất</h6>
                            <p class="card-text">Xem danh sách các thông báo mới nhất từ hệ thống.</p>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 1</h5>
                                        <small>3 ngày trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 1.</p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 2</h5>
                                        <small>5 ngày trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 2.</p>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 3</h5>
                                        <small>1 tuần trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 3.</p>
                                </a>
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
