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
        img {
            max-width: 50%;
            width: 250px;
            height: 100px;
            display: block;
            margin: 0 auto;
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
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Chats</a></li>
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
    <form action="process.php" class="form-group" method="post">
        <div class="container mt-4">
            <h3 class="text-center mb-5">Chọn vai trò người dùng</h3>
        </div>
        <div class="container mb-4">
            <div class="row mt-4">
                <div class="col-md-4 d-flex justify-content-center align-content-center">
                    <button type="submit" class="card mb-3" name="sbm" value="1">
                        <img src="..\..\assets\images\avatar\cus.png" alt="Khách hàng">
                        <div class="container mt-4 mb-4">
                            <h5 class="text-center">Khách hàng</h5>
                        </div>
                    </button>
                </div>

                <div class="col-md-4 d-flex justify-content-center align-content-center">
                    <button type="submit" class="card mb-3" name="sbm" value="2">
                        <img src="..\..\assets\images\avatar\admin1.png" alt="Quản trị viên">
                        <div class="container mt-4 mb-4">
                            <h5 class="text-center">Quản trị viên</h5>
                        </div>
                    </button>
                </div>

                <div class="col-md-4 d-flex justify-content-center align-content-center">
                    <button type="submit" class="card mb-3" name="sbm" value="5">
                        <img src="..\..\assets\images\avatar\manager.jpg" alt="Quản lý nhân viên">
                        <div class="container mt-4 mb-4">
                            <h5 class="text-center">Quản lý nhân viên</h5>
                        </div>
                    </button>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6 d-flex justify-content-center align-content-center">
                    <button type="submit" class="card mb-3" name="sbm" value="3">
                        <img src="..\..\assets\images\avatar\nhanvien1.png" alt="Nhân viên">
                        <div class="container mt-4 mb-4">
                            <h5 class="text-center">Nhân viên</h5>
                        </div>
                    </button>
                </div>

                <div class="col-md-6 d-flex justify-content-center align-content-center">
                    <button type="submit" class="card mb-3" name="sbm" value="4">
                        <img src="..\..\assets\images\avatar\ware.png" alt="Quản lý kho">
                        <div class="container mt-4 mb-4">
                            <h5 class="text-center">Quản lý kho</h5>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </form>
    </main>
    </div>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rqI2waM7CtpVHmUnY9NXfQTKc3N8RBLtbl6TbY3b3NC6HjbF2wF81v11z5KnMK17" crossorigin="anonymous"></script>
    <script>
        // Enable Bootstrap form validation
        (function() {
            'use strict';

            var form = document.getElementById('accountForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>
</html>
