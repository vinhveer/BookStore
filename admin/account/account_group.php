<?php
    include_once '../../import/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Amazon Warehouse</title>
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
            <div class="logo-name"><span>Admin </span></div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li class="active"><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
            <li><a href="index.php"><i class='bx bx-group'></i>Users</a></li>
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
    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col-md-3">
                <h3>Nhóm Tài khoản</h3>
            </div>
            <div class="col-md-5">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="tukhoa" value="">
                    <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <a  href ="account_add.php" class="btn btn-primary float-end">Thêm tài khoản mới</a>
            </div>
        </div>
        <!-- <div class="card"> -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#khachhang" data-toggle="tab">Khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#qtrihethong" data-toggle="tab">Quản trị hệ thống</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nhanvienquanli" data-toggle="tab">Nhân viên quản lí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nhanvientieptan" data-toggle="tab">Nhân viên cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quanlikho" data-toggle="tab">Quản lí kho</a>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="khachhang">
                    <?php $sql_account_customer = "EXEC GetUserInformation_customer";
                        $result_account_customer = sqlsrv_query($connect, $sql_account_customer);?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        while ($row_account_customer = sqlsrv_fetch_array($result_account_customer)) {?>
                            <tr>
                                <td scope="row"><?php $i++; echo $i ?></td>
                                <td><?php echo $row_account_customer['full_name'] ?></td>
                                <td><?php echo $row_account_customer['email'] ?></td>
                                <td><?php echo $row_account_customer['password'] ?></td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="show.php" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Quản trị hệ thống -->
                <div class="tab-pane fade" id="qtrihethong">
                <?php $sql_account_admin = "EXEC GetUserInformation_admin";
                        $result_account_admin = sqlsrv_query($connect, $sql_account_admin);?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        while ($row_account_admin = sqlsrv_fetch_array($result_account_admin)) {?>
                            <tr>
                                <td scope="row"><?php $i++; echo $i ?></td>
                                <td><?php echo $row_account_admin['full_name'] ?></td>
                                <td><?php echo $row_account_admin['email'] ?></td>
                                <td><?php echo $row_account_admin['password'] ?></td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="show.php" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Nhân viên quản lí -->
                <div class="tab-pane fade" id="nhanvienquanli">
                <?php $sql_account_manager = "EXEC GetUserInformation_manager";
                        $result_account_manager = sqlsrv_query($connect, $sql_account_manager);?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        while ($row_account_manager = sqlsrv_fetch_array($result_account_manager)) {?>
                            <tr>
                                <td scope="row"><?php $i++; echo $i ?></td>
                                <td><?php echo $row_account_manager['full_name'] ?></td>
                                <td><?php echo $row_account_manager['email'] ?></td>
                                <td><?php echo $row_account_manager['password'] ?></td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="show.php" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Nhân viên tiếp tân -->
                <div class="tab-pane fade" id="nhanvientieptan">
                <?php $sql_account_employee = "EXEC GetUserInformation_employee";
                        $result_account_employee = sqlsrv_query($connect, $sql_account_employee);?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        while ($row_account_employee = sqlsrv_fetch_array($result_account_employee)) {?>
                            <tr>
                                <td scope="row"><?php $i++; echo $i ?></td>
                                <td><?php echo $row_account_employee['full_name'] ?></td>
                                <td><?php echo $row_account_employee['email'] ?></td>
                                <td><?php echo $row_account_employee['password'] ?></td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="show.php" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Quản lí kho -->
                <div class="tab-pane fade" id="quanlikho">
                <?php $sql_account_warehouse = "EXEC GetUserInformation_warehouse";
                        $result_account_warehouse = sqlsrv_query($connect, $sql_account_warehouse);?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        while ($row_account_warehouse = sqlsrv_fetch_array($result_account_warehouse)) {?>
                            <tr>
                                <td scope="row"><?php $i++; echo $i ?></td>
                                <td><?php echo $row_account_warehouse['full_name'] ?></td>
                                <td><?php echo $row_account_warehouse['email'] ?></td>
                                <td><?php echo $row_account_warehouse['password'] ?></td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="show.php" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- </div> -->
    </div>
    </main>
    </div>
    <script src="index.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
