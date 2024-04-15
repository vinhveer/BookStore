<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>View Account</title>
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
            <div class="logo-name"><span>Admin</span></div>
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
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-6">
                    <h3>Thông tin khách hàng</h3>

                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary" href="index.php">Thoát</a>
                        </div>
                    </div>
                </div>
                <!-- User information table -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Passwword</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>029723622525</td>
                            <td>compaynha@gmail.cpm</td>
                            <td>dododododo</td>
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
                                            <p><b>Họ và Tên: </b> Nguyễn Văn A</p>
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
                    <div class="tab-pane fade" id="phanquyen">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class ="card-body">
                                        <h4>Quyền hiện tại:</h4>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Quyền</th>
                                                        <th>Hoạt động</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="boxx">
                                                    <!-- Dữ liệu về quyền và hoạt động sẽ được hiển thị ở đây -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <div class="card">
                                    <form >
                                        <div class="card-body">
                                            <h3 class="card-title">Phân quyền</h3>
                                            <div class="mb-3">
                                                <div class="col-sm-4">
                                                    <select class="form-select" id="selectRole">
                                                        <option selected>Chọn vai trò</option>
                                                        <option value="1">Quản trị viên</option>
                                                        <option value="2">Khách hàng</option>
                                                        <option value="2">Nhân viên</option>
                                                        <option value="2">Quản lý nhân viên</option>
                                                        <option value="2">Quản lý kho</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Cửa hàng của bạn:</b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission1">
                                                            <label class="form-check-label" for="permission1">Trang chủ</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Sản phẩm, danh mục</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Kho hàng</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Đơn hàng</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Đơn nhập hàng, xuất hàng</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Khách hàng</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Khuyến mãi</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Báo cáo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Nội dung:</b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission1">
                                                            <label class="form-check-label" for="permission1">Blog và trang nội dung</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Menu</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Giao diện</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Thông báo</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Cấu hình: </b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission1">
                                                            <label class="form-check-label" for="permission1">Thiết lập tài khoản</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2">
                                                            <label class="form-check-label" for="permission2">Cấu hình hệ thống</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       $(document).ready(function(){
    $('input[type="checkbox"].form-check-input').change(function(){ // chỉ lấy các checkbox có class "form-check-input"
        var checkedPermissions = $('input[type="checkbox"].form-check-input:checked').map(function(){ // chỉ lấy các checkbox được chọn có class "form-check-input"
            return $(this).siblings('label').text();
        }).get();

        var permissionList = '';
        $.each(checkedPermissions, function(index, value){
            permissionList += '<tr><td>' + value + '</td><td>Some activity</td></tr>'; // Thay Some activity bằng hoạt động thực tế
        });

        $('.boxx').html(permissionList);
    });
});

    </script>
</body>
</html>
