<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <h3>Danh sách đơn hàng</h3>
            </div>
            <div class="col-md-5">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" name="tukhoa" value="">
                    <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                </form>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn-primary float-end">Xuất Excel</button>
            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bảng liệt kê đơn hàng</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng A</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng A</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH001</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng E</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH002</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng B</td> <!-- Tên khách hàng -->
                                    <td>Đã thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH003</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng C</td> <!-- Tên khách hàng -->
                                    <td>Chưa thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>DH006</td> <!-- Mã đơn hàng -->
                                    <td>2024-03-31</td> <!-- Ngày đặt -->
                                    <td>Khách hàng D</td> <!-- Tên khách hàng -->
                                    <td>Đang thanh toán</td> <!-- Trạng thái -->
                                    <td>
                                        <button class="btn btn-sm btn-info">Xem</button>
                                        <button class="btn btn-sm btn-danger">Hủy</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
