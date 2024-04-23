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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Amazon Warehouse</title>
    <style>
        .action-buttons .btn.btn-info,.btn.btn-primary{
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }
    </style>
</head>

<body data-bs-theme="light">
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

    <div class="content">
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
            <a href="../dashboard/new.php" class="notif">
                <i class='bx bx-bell'></i>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="container fluid">
        <div class="row mb-3">
            <div class="col-md-6">
                <h3><a href="index.php"><i class="bi bi-arrow-left-circle me-3"></i></a>Nhóm Tài khoản</h3>
            </div>
        </div>
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

            <div class="tab-content mt-3">

                <div class="tab-pane fade show active" id="khachhang">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <form class="d-flex" action="account_group.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                            name="tukhoa" value="">
                        <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                        </form>
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem'])) { ?>
                        <div class="row mt-3">
                            <div class="col">
                                <?php
                                $tukhoa = $_POST['tukhoa'];
                                echo "<p>&nbspTìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a  href ="account_group_add.php?role_id=1" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Thêm tài khoản mới</a>
                    </div>
                    </div>
                        <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem'])) {
                            $tukhoa = $_POST['tukhoa'];
                            $sql_account_customer  ="SearchAccount_customer N'$tukhoa'";
                            $result_account_customer = sqlsrv_query($connect, $sql_account_customer );
                            } else {
                                $recordsPerPage = 5;
                                $sql_count = "SELECT COUNT(*) AS total_records FROM users u
                                INNER JOIN user_roles ur ON u.user_id = ur.user_id
                                INNER JOIN roles r ON ur.role_id = r.role_id
                                WHERE r.role_id=1";
                                $result_count = sqlsrv_query($connect, $sql_count);
                                $row_count = sqlsrv_fetch_array($result_count);
                                $totalRecords = $row_count['total_records'];
                                $totalPages = ceil($totalRecords / $recordsPerPage);
                            if (!isset($_GET['page'])) {
                                $currentPage = 1;
                            } else {
                                $currentPage = $_GET['page'];
                            }
                            $sql_account_customer = "GetUserInformation_customer $currentPage";
                            $result_account_customer = sqlsrv_query($connect, $sql_account_customer);
                        }?>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên người dùng</th>
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
                                            <td><?php echo $row_account_customer['username'] ?></td>
                                            <td><?php echo $row_account_customer['email'] ?></td>
                                            <td><?php echo $row_account_customer['password'] ?></td>
                                            <td>
                                            <div class="d-flex">
                                                <a href="account_user_edit.php?user_id=<?php echo $row_account_customer['user_id'];?>&edit=1" class="btn btn-sm btn-warning me-2"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                                <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_customer['user_id']; ?>&delete=1" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                                    <a href ="show.php?user_id=<?php echo $row_account_customer['user_id']; ?>&role_id=1&show=1" class="btn btn-sm btn-info"><i class='bx bxs-show bx-sm' ></i>Show</a>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <div class="pagination">
                                                <?php
                                                if ($totalPages > 1) {
                                                    echo '<a href="account_group.php?page=1">1</a>';
                                                    if ($currentPage > 3) {
                                                        echo '<span>...</span>';
                                                    }
                                                    for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                                        echo "<a href='account_group.php?page=$i'>$i</a>";
                                                    }
                                                    if ($currentPage < $totalPages - 2) {
                                                        echo '<span>...</span>';
                                                    }
                                                    echo "<a href='account_group.php?page=$totalPages'>$totalPages</a>";
                                                }
                                                ?>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Quản trị hệ thống -->
                <div class="tab-pane fade" id="qtrihethong">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <form class="d-flex" action="account_group.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                            name="tukhoa" value="">
                        <button class="btn btn-outline-primary" type="submit" name="timkiem1" value="find">Tìm</button>
                        </form>
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem1'])) { ?>
                        <div class="row mt-3">
                            <div class="col">
                                <?php
                                $tukhoa = $_POST['tukhoa'];
                                echo "<p>&nbspTìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a  href ="account_group_add.php?role_id=2" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Thêm tài khoản mới</a>
                    </div>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem1'])) {
                    $tukhoa = $_POST['tukhoa'];
                    $sql_account_admin  ="SearchAccount_admin N'$tukhoa'";
                    $result_account_admin = sqlsrv_query($connect, $sql_account_admin );
                } else {
                    $recordsPerPage = 5;
                    $sql_count = "SELECT COUNT(*) AS total_records FROM users u
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id
                    INNER JOIN roles r ON ur.role_id = r.role_id
                    WHERE r.role_id=2";
                    $result_count = sqlsrv_query($connect, $sql_count);
                    $row_count = sqlsrv_fetch_array($result_count);
                    $totalRecords = $row_count['total_records'];
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                if (!isset($_GET['page'])) {
                    $currentPage = 1;
                } else {
                    $currentPage = $_GET['page'];
                }
                $sql_account_admin = "GetUserInformation_admin $currentPage";
                $result_account_admin = sqlsrv_query($connect, $sql_account_admin);
                }?>
                   <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên người dùng</th>
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
                                        <td><?php echo $row_account_admin['username'] ?></td>
                                        <td><?php echo $row_account_admin['email'] ?></td>
                                        <td><?php echo $row_account_admin['password'] ?></td>
                                        <td>
                                        <div class="d-flex">
                                            <a href="account_user_edit.php?user_id=<?php echo $row_account_admin['user_id']; ?>&edit=1" class="btn btn-sm btn-warning me-2"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_admin['user_id']; ?>&delete=1" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                            <a href ="show.php?user_id=<?php echo $row_account_admin['user_id']; ?>&role_id=2&show=1" class="btn btn-sm btn-info"><i class='bx bxs-show bx-sm' ></i>Show</a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <div class="pagination">
                                                <?php
                                                if ($totalPages > 1) {
                                                    echo '<a href="account_group.php?page=1">1</a>';
                                                    if ($currentPage > 3) {
                                                        echo '<span>...</span>';
                                                    }
                                                    for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                                        echo "<a href='account_group.php?page=$i'>$i</a>";
                                                    }
                                                    if ($currentPage < $totalPages - 2) {
                                                        echo '<span>...</span>';
                                                    }
                                                    echo "<a href='account_group.php?page=$totalPages'>$totalPages</a>";
                                                }
                                                ?>
                                        </div>
                                    </ul>
                                </div>
                        </div>
                   </div>
                </div>

                <!-- Nhân viên quản lí -->
                <div class="tab-pane fade" id="nhanvienquanli">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <form class="d-flex" action="account_group.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                            name="tukhoa" value="">
                        <button class="btn btn-outline-primary" type="submit" name="timkiem2" value="find">Tìm</button>
                        </form>
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem2'])) { ?>
                        <div class="row mt-3">
                            <div class="col">
                                <?php
                                $tukhoa = $_POST['tukhoa'];
                                echo "<p>&nbspTìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a  href ="account_group_add.php?role_id=5" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Thêm tài khoản mới</a>
                    </div>
                </div>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem2'])) {
                    $tukhoa = $_POST['tukhoa'];
                    $sql_account_manager  ="SearchAccount_manager N'$tukhoa'";
                    $result_account_manager = sqlsrv_query($connect, $sql_account_manager );
                } else {
                    $recordsPerPage = 5;
                    $sql_count = "SELECT COUNT(*) AS total_records FROM users u
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id
                    INNER JOIN roles r ON ur.role_id = r.role_id
                    WHERE r.role_id=5";
                    $result_count = sqlsrv_query($connect, $sql_count);
                    $row_count = sqlsrv_fetch_array($result_count);
                    $totalRecords = $row_count['total_records'];
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                if (!isset($_GET['page'])) {
                    $currentPage = 1;
                } else {
                    $currentPage = $_GET['page'];
                }
                $sql_account_manager = "GetUserInformation_manager $currentPage";
                $result_account_manager = sqlsrv_query($connect, $sql_account_manager);
                }?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên người dùng</th>
                                        <th scope="col">Tên tài khoản</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
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
                                        <td><?php echo $row_account_manager['username'] ?></td>
                                        <td><?php echo $row_account_manager['email'] ?></td>
                                        <td><?php echo $row_account_manager['password'] ?></td>
                                        <td>
                                        <div class="d-flex">
                                            <a href="account_user_edit.php?user_id=<?php echo $row_account_manager['user_id']; ?>&edit=1" class="btn btn-sm btn-warning me-2"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_manager['user_id']; ?>&delete=1" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                                <a href ="show.php?user_id=<?php echo $row_account_manager['user_id']; ?>&role_id=5&show=1" class="btn btn-sm btn-info"><i class='bx bxs-show bx-sm' ></i>Show</a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <div class="pagination">
                                                <?php
                                                if ($totalPages > 1) {
                                                    echo '<a href="account_group.php?page=1">1</a>';
                                                    if ($currentPage > 3) {
                                                        echo '<span>...</span>';
                                                    }
                                                    for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                                        echo "<a href='account_group.php?page=$i'>$i</a>";
                                                    }
                                                    if ($currentPage < $totalPages - 2) {
                                                        echo '<span>...</span>';
                                                    }
                                                    echo "<a href='account_group.php?page=$totalPages'>$totalPages</a>";
                                                }
                                                ?>
                                        </div>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Nhân viên tiếp tân -->
                <div class="tab-pane fade" id="nhanvientieptan">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <form class="d-flex" action="account_group.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                            name="tukhoa" value="">
                        <button class="btn btn-outline-primary" type="submit" name="timkiem3" value="find">Tìm</button>
                        </form>
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem3'])) { ?>
                        <div class="row mt-3">
                            <div class="col">
                                <?php
                                $tukhoa = $_POST['tukhoa'];
                                echo "<p>&nbspTìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a  href ="account_group_add.php?role_id=3" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Thêm tài khoản mới</a>
                    </div>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem3'])) {
                    $tukhoa = $_POST['tukhoa'];
                    $sql_account_employee  ="SearchAccount_employee N'$tukhoa'";
                    $result_account_employee = sqlsrv_query($connect, $sql_account_employee );
                } else {
                    $recordsPerPage = 5;
                    $sql_count = "SELECT COUNT(*) AS total_records FROM users u
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id
                    INNER JOIN roles r ON ur.role_id = r.role_id
                    WHERE r.role_id=3";
                    $result_count = sqlsrv_query($connect, $sql_count);
                    $row_count = sqlsrv_fetch_array($result_count);
                    $totalRecords = $row_count['total_records'];
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                if (!isset($_GET['page'])) {
                    $currentPage = 1;
                } else {
                    $currentPage = $_GET['page'];
                }
                $sql_account_employee = "GetUserInformation_employee $currentPage";
                $result_account_employee = sqlsrv_query($connect, $sql_account_employee);
                }
                ?>
                   <div class ="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên người dùng</th>
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
                                        <td><?php echo $row_account_employee['username'] ?></td>
                                        <td><?php echo $row_account_employee['email'] ?></td>
                                        <td><?php echo $row_account_employee['password'] ?></td>
                                        <td>
                                        <div class="d-flex">
                                            <a href="account_user_edit.php?user_id=<?php echo $row_account_employee['user_id']; ?>&edit=1" class="btn btn-sm btn-warning me-2"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_employee['user_id']; ?>&delete=1" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                                <a href ="show.php?user_id=<?php echo $row_account_employee['user_id']; ?>&role_id=4&show=1" class="btn btn-sm btn-info"><i class='bx bxs-show bx-sm' ></i>Show</a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <div class="pagination">
                                                <?php
                                                if ($totalPages > 1) {
                                                    echo '<a href="account_group.php?page=1">1</a>';
                                                    if ($currentPage > 3) {
                                                        echo '<span>...</span>';
                                                    }
                                                    for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                                        echo "<a href='account_group.php?page=$i'>$i</a>";
                                                    }
                                                    if ($currentPage < $totalPages - 2) {
                                                        echo '<span>...</span>';
                                                    }
                                                    echo "<a href='account_group.php?page=$totalPages'>$totalPages</a>";
                                                }
                                                ?>
                                        </div>
                                    </ul>
                                </div>
                        </div>
                   </div>
                </div>

                <!-- Quản lí kho -->
                <div class="tab-pane fade" id="quanlikho">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <form class="d-flex" action="account_group.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                            name="tukhoa" value="">
                        <button class="btn btn-outline-primary" type="submit" name="timkiem4" value="find">Tìm</button>
                        </form>
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem4'])) { ?>
                        <div class="row mt-3">
                            <div class="col">
                                <?php
                                $tukhoa = $_POST['tukhoa'];
                                echo "<p>&nbspTìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                                ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <a  href ="account_group_add.php?role_id=4" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Thêm tài khoản mới</a>
                    </div>
                </div>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem4'])) {
                    $tukhoa = $_POST['tukhoa'];
                    $sql_account_warehouse  ="SearchAccount_warehouse N'$tukhoa'";
                    $result_account_warehouse = sqlsrv_query($connect, $sql_account_warehouse );
                } else {
                    $recordsPerPage = 5;
                    $sql_count = "SELECT COUNT(*) AS total_records FROM users u
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id
                    INNER JOIN roles r ON ur.role_id = r.role_id
                    WHERE r.role_id=4";
                    $result_count = sqlsrv_query($connect, $sql_count);
                    $row_count = sqlsrv_fetch_array($result_count);
                    $totalRecords = $row_count['total_records'];
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                    if (!isset($_GET['page'])) {
                        $currentPage = 1;
                    } else {
                        $currentPage = $_GET['page'];
                    }
                $sql_account_warehouse = "GetUserInformation_warehouse $currentPage";
                $result_account_warehouse = sqlsrv_query($connect, $sql_account_warehouse);
                }?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên người dùng</th>
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
                                        <td><?php echo $row_account_warehouse['username'] ?></td>
                                        <td><?php echo $row_account_warehouse['email'] ?></td>
                                        <td><?php echo $row_account_warehouse['password'] ?></td>
                                        <td>
                                        <div class="d-flex">
                                            <a href="account_user_edit.php?user_id=<?php echo $row_account_warehouse['user_id']; ?>&edit=1" class="btn btn-sm btn-warning me-2"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_warehouse['user_id']; ?>&delete=1" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                                <a href ="show.php?user_id=<?php echo $row_account_warehouse['user_id']; ?>&role_id=4&show=1" class="btn btn-sm btn-info"><i class='bx bxs-show bx-sm' ></i>Show</a>
                                        </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <div class="pagination">
                                                <?php
                                                if ($totalPages > 1) {
                                                    echo '<a href="account_group.php?page=1">1</a>';
                                                    if ($currentPage > 3) {
                                                        echo '<span>...</span>';
                                                    }
                                                    for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                                        echo "<a href='account_group.php?page=$i'>$i</a>";
                                                    }
                                                    if ($currentPage < $totalPages - 2) {
                                                        echo '<span>...</span>';
                                                    }
                                                    echo "<a href='account_group.php?page=$totalPages'>$totalPages</a>";
                                                }
                                                ?>
                                        </div>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Xác nhận xóa tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa tài khoản này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form id="deletePostForm" action="" method="post">
                        <button type="submit" class="btn btn-danger" name="delete_user">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        // Lưu tab-pane hiện tại khi click vào tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href"); // Lấy id của tab-pane
            localStorage.setItem('activeTab', target); // Lưu id của tab-pane vào localStorage
        });

        // Load lại trang và đặt tab-pane là active dựa trên localStorage
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
        }

        // Xử lý sự kiện khi submit form tìm kiếm
        $('form').on('submit', function(){
            var tabId = $('.nav-tabs .active').attr("href"); // Lấy id của tab-pane hiện tại
            localStorage.setItem('activeTab', tabId); // Lưu id của tab-pane vào localStorage
        });
    });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn.btn-sm.btn-danger.me-2');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-postid');
                    const form = document.querySelector('#deletePostForm');
                    form.action = `process.php?user_id=${userId}`;
                });
            });
        });
    </script>
</body>
</html>
