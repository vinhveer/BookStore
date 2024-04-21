
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Amazon Warehouse</title>
    <style>
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3,.form-label{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span></span>&nbspAdmin</div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-group'></i>Users</a></li>
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
    <div class="container">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Tin Tức Hệ Thống</h3>
            </div>
        </div>
    </div>
    <div class="row">
            <!-- Tin tức 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 1</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!-- Tin tức 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 2</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!-- Tin tức 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 3</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
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
