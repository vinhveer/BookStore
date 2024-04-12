<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>Quản lí tài khoản người dùng</title>
</head>

<body>
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
                <a  href ="setup_role.php" class="btn btn-primary float-end me-2">Cài đặt vai trò </a>
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
                    <a class="nav-link" href="#nhanvientieptan" data-toggle="tab">Nhân viên tiếp tân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quanlikho" data-toggle="tab">Quản lí kho</a>
                </li>
            </ul>

            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="khachhang">
                    <table class="table">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>khachhang1</td>
                                <td>khachhang1@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>khachhang2</td>
                                <td>khachhang2@example.com</td>
                                <td>dododododo</td>
                                <td>
                                    <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Quản trị hệ thống -->
                <div class="tab-pane fade" id="qtrihethong">
                    <!-- Add your table for system administrators here -->
                    <table class="table">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>khachhang1</td>
                                <td>khachhang1@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>khachhang2</td>
                                <td>khachhang2@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Nhân viên quản lí -->
                <div class="tab-pane fade" id="nhanvienquanli">
                    <!-- Add your table for managers here -->
                    <table class="table">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>khachhang1</td>
                                <td>khachhang1@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>khachhang2</td>
                                <td>khachhang2@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Nhân viên tiếp tân -->
                <div class="tab-pane fade" id="nhanvientieptan">
                    <!-- Add your table for receptionists here -->
                    <table class="table">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>nhanvien1</td>
                                <td>khachhang1@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>nhanvien2</td>
                                <td>khachhang2@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Quản lí kho -->
                <div class="tab-pane fade" id="quanlikho">
                    <!-- Add your table for warehouse managers here -->
                    <table class="table">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>khachhang1</td>
                                <td>khachhang1@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>khachhang2</td>
                                <td>khachhang2@example.com</td>
                                <td>dododododo</td>
                                <td>
                                <a href="account_edit.php" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <a href ="account_show.php" class="btn btn-sm btn-info"><i class='bx bx-show-alt'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- </div> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
