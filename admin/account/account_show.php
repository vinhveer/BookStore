<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3>User Information</h3>
                <!-- User information table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>029723622525</td>
                            <td>compaynha@gmail.cpm</td>
                            <td>Status</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#thongtin">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#phanquyen">Phân quyền</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#thoigian">Thời gian</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <!-- Thông tin tab -->
                    <div class="tab-pane fade show active" id="thongtin">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                            <img src="../../assets/images/course1.jpg" alt="Profile Image" class="img-fluid rounded-circle mb-3"
                                                style="width: 200px; height: 200px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Thông tin cá nhân</h4>
                                            <hr class="info-divider">
                                            <p><b>Tên Đăng Nhập: </b> User1</p>
                                            <p><b>Họ và Tên: </b> Nguyễn Văn A</p>
                                            <p><b>Password: </b> dododododo</p>
                                            <p><b>Giới tính: </b> Nam</p>
                                            <p><b>Địa chỉ: </b>Đường 18 Nguyễn Đình Chiểu, Vĩnh Phước, Nha Trang, Khánh Hòa,</p>
                                            <p><b>Số điện thoại: </b> 098262222</p>
                                            <p><b>Email: </b> nguyena@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Phân quyền tab -->
                    <div class="tab-pane fade" id="phanquyen">
                        <div class="row">
                            <!-- Bảng chi nhánh -->
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Chi nhánh</h3>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên chi nhánh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Chi nhánh A</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Chi nhánh B</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Bảng phân quyền -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Phân quyền</h3>
                                        <!-- Chọn vai trò cho tài khoản -->
                                        <div class="mb-3">
                                            <label for="selectRole" class="form-label">Chọn vai trò:</label>
                                            <div class="col-sm-4">
                                                <select class="form-select" id="selectRole">
                                                    <option selected>Chọn vai trò...</option>
                                                    <option value="1">Vai trò 1</option>
                                                    <option value="2">Vai trò 2</option>
                                                    <!-- Thêm các option khác cho các vai trò -->
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Các quyền được tích chọn -->
                                        <div class = "row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-check-label">Chọn quyền:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission1">
                                                        <label class="form-check-label" for="permission1">Quyền 1</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission2">
                                                        <label class="form-check-label" for="permission2">Quyền 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-check-label">Chọn quyền:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission1">
                                                        <label class="form-check-label" for="permission1">Quyền 1</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission2">
                                                        <label class="form-check-label" for="permission2">Quyền 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-check-label">Chọn quyền:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission1">
                                                        <label class="form-check-label" for="permission1">Quyền 1</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="permission2">
                                                        <label class="form-check-label" for="permission2">Quyền 2</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Thêm các quyền khác -->
                                        </div>
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thời gian tab -->
                    <div class="tab-pane fade" id="thoigian">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Lịch sử hoạt động</h4>
                                        <!-- Add activity history table -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Trạng thái</h4>
                                        <!-- Add status table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
