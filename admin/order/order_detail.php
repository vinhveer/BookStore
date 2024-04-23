
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
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
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
    <div class="container-fluid mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h3><a href=""><i class="bi bi-arrow-left-circle me-3"></i></a> Thông tin hóa đơn</h3>
            </div>
                <div class="col-md-6 text-right">
                    <a href="" class="btn btn-success float-end"><i class='bx bx-sm bx-edit-alt me-1'></i>Sửa đổi thông tin</a>
                </div>
        </div>

                    <div class="tab-pane fade show active" id="thongtin">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                            <img src="" alt="Profile Image" class="img-fluid rounded-circle mb-3"
                                                style="width: 200px; height: 200px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Chi tiết hóa đơn</h4>
                                            <hr class="info-divider">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 75px">Full name:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 95px">Gender:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 50px">Date Of Birth:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 85px">Address:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 98px">Phone:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 105px">Email:</strong>
                                                        <p style="margin-bottom: 0px"></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Ngày mua hàng</th>
                            <th scope="col">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script src="index.js"></script>

</body>
</html>
