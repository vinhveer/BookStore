<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <style>
        body {
            padding-top: 70px;
            position: relative; /* Add relative positioning */
            overflow-x: hidden; /* Hide horizontal overflow */
        }

        /* Styling for the sidebar */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            z-index: 1000; /* Ensure sidebar appears above other content */
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Push content to the right when sidebar is open */
        .content {
            transition: margin-left 0.5s;
            padding: 16px;
            z-index: 1; /* Ensure content appears below sidebar */
        }

        /* Style for the overlay when sidebar is open */
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999; /* Ensure overlay covers entire screen */
        }

        /* Show overlay when sidebar is open */
        .overlay.active {
            display: block;
        }
    </style>
</head>

<body class="with-navbar">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top nav-underline">
            <div class="container">
                <a class="navbar-brand d-inline-flex align-items-center" href="#" onclick="toggleNav()">
                    <i class="bx bx-layer bx-sm me-1"></i>
                    Admin
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">
                                <i class="bx bx-home-circle me-1 "></i> Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../account/account.php">
                                <i class="bx bx-user-circle me-1 "></i> Tài khoản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../order/order.php">
                                <i class="bx bx-bar-chart-alt me-1 "></i> Thống kê đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <i class="bx bx-cog me-1 "></i> Cài đặt quản trị
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item nav-link ">
                            <img src="../../assets/images/course1.jpg" alt="Avatar" class="rounded-circle" width="30" height="30">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Phạm Hồ Như Thủy
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Trang cá nhân</a></li>
                                <li><a class="dropdown-item" href="../index.php">Trang chủ</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../index.php">Trang chủ</a><hr>
        <a href="../account/account.php">Tài khoản</a><hr>
        <a href="../order/order.php">Đơn hàng</a><hr>
        <a href="settings.php">Cài đặt</a><hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
    let sidebarOpen = false;

    function toggleNav() {
        if (sidebarOpen) {
            closeNav();
        } else {
            openNav();
        }
        sidebarOpen = !sidebarOpen;
    }

    /* Open the sidebar */
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    /* Close/hide the sidebar */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>

</body>

</html>
