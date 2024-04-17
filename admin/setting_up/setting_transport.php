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
        h3,h4,.pit,hr{
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
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>
        <main>
        <div class="container-fluid mt-3 mb-5">
        <h3>Quản lý vận chuyển</h3><hr>
        </div>
        <div class="container-fluid mt-3 mb-5">
          <div class="row">
            <div class="col-md-5">
              <h4>Phí vận chuyển</h4>
              <p class="pit">Thêm phí vận chuyển mới cho các khu vực vận chuyển khác nhau.</p>
              <button class="btn btn-primary">Thêm mới khu vực vận chuyển</button>
            </div>
            <div class="col-md-7">
              <h4>Khu vực vận chuyển</h4>
              <ul class="list-group">
                <li class="list-group-item">HÀ NỘI </li>
                <li class="list-group-item">Giao hàng tận nơi</li>
                <li class="list-group-item">0₫ trở lên <span class="float-right">40.000₫</span></li>
                <li class="list-group-item">
                  <button class="btn btn-danger float-left">Xóa khu vực</button>
                  <button class="btn btn-success float-right">Thêm phí vận chuyển</button>
                </li>
              </ul>
            </div>
          </div>
          <hr>
          <div class="row mt-5">
            <div class="col-md-5">
              <h4>Các dịch vụ vận chuyển</h4>
              <p class="pit">Các dịch vụ vận chuyển giúp bạn chuyển hàng tới khách hàng một cách nhanh chóng, hiệu quả.</p>
              <button class="btn btn-primary">Thêm mới dịch vụ vận chuyển</button>
            </div>
            <div class="col-md-7">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="logo">
                                    <img src="" alt="">
                                </div>
                                <p>Cửa hàng của bạn đang sử dụng dịch vụ vận chuyển DHL.</p>
                                <p>Để tìm hiểu thêm về DHL và các thông tin khác vui lòng <a class="nav-item">xem tại đây</a></p>
                                <hr class="mb-4">
                                <div class ="d-flex justify-content-between">
                                    <p>Đang sử dụng: DHL</p>
                                    <button class="btn btn-primary">Chỉnh sửa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-1">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="logo">
                                    <img src="" alt="">
                                </div>
                                <p>Cửa hàng của bạn đang sử dụng dịch vụ vận chuyển VNPost.</p>
                                <p>Để tìm hiểu thêm về VNPost và các thông tin khác vui lòng <a class="nav-item">xem tại đây</a></p>
                                <hr class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <p>Đang sử dụng: VNPost</p>
                                    <button class="btn btn-primary">Chỉnh sửa</button>
                                </div>
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
