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
        <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="m-lg-2">Quản lý File</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-success float-end">Thêm file</button>
                <button class="btn btn-secondary float-end me-2">Khôi phục</button>
            </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table">
                        <h5>Tất cả file</h5><hr>
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-start">
                                <div class="col-sm-2">
                                    <select class="form-select ">
                                        <option selected>Lọc file</option>
                                        <option value="1">.pdf</option>
                                        <option value="2">.dox</option>
                                        <option value="3">.png</option>
                                        <option value="4">.jpg</option>
                                        <option value="5">.mp3</option>
                                        <option value="6">.txt</option>
                                    </select>
                                </div>
                                <div class="col-sm-7">
                                    <form class="d-flex me-2" action="" method="POST">
                                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id="searchInput" value="">
                                        <button class="btn btn-outline-primary" type="button" id="searchBtn">Tìm</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên file</th>
                                            <th scope="col">Đường dẫn</th>
                                            <th scope="col">Dung lượng</th>
                                            <th scope="col">Loại file</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr>
                                                <td>g1.jpg</td>
                                                <td>https://bizweb.dktcdn.net/100/000/147/files/g1.jpg?v=152</td>
                                                <td>56.30 KB</td>
                                                <td>jpg</td>
                                                <td>
                                                    <button class="btn btn-danger">Xóa</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>26972788-1640703742714383-f22b6558bf0c.jpg</td>
                                                <td>https://bizweb.dktcdn.net/100/000/147/files/26972788-164</td>
                                                <td>99.09 KB</td>
                                                <td>jpg</td>
                                                <td>
                                                    <button class="btn btn-danger">Xóa</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
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
