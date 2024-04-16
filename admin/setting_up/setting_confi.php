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
        h3,h5,.pet,hr{
            color: var(--dark);
        }
        .form-group {
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .hidden {
            display: none;
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
            <li class="active"><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
        <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Cấu hình chung</h3>
            </div>
        </div>
            <hr>
        </div>
        <form class="mb-4">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Thông tin website</h5>
                        <p class="pet">Thông tin được sử dụng để Bizweb và khách hàng liên hệ đến bạn.</p>
                    </div>
                    <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="websiteName">Tên website</label>
                                        <input type="text" class="form-control" id="websiteName" value="Coffee Cake">
                                    </div>
                                    <div class="form-group">
                                        <label for="homeTitle">Tiêu đề trang chủ</label>
                                        <input type="text" class="form-control" id="homeTitle" value="Coffee Cake">
                                    </div>
                                    <div class="form-group">
                                        <label for="homeDescription">Mô tả trang chủ</label>
                                        <textarea class="form-control" id="homeDescription" rows="3">Coffee Cake là địa điểm yêu thích của các bạn trẻ hiện đại với bánh ngọt và cafe ngon trứ danh.</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="adminEmail">Email quản trị</label>
                                            <input type="email" class="form-control" id="adminEmail" value="cskh@dkt.com.vn">
                                            <p><em>Email được sử dụng cho Bizweb liên lạc với bạn.</em></p>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="notificationEmail">Email gửi thông báo</label>
                                            <input type="email" class="form-control" id="notificationEmail" value="cskh@dkt.com.vn">
                                            <p><em>Email sử dụng để gửi thông báo và nhận liên hệ từ các khách hàng của bạn.</em></p>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Thông tin liên hệ</h5>
                        <p class="pet">Thông tin được sử dụng trong thông báo về đơn hàng và địa chỉ để liên hệ đến cửa hàng.</p>
                    </div>
                    <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="websiteName">Tên kinh doanh</label>
                                        <input type="text" class="form-control" id="websiteName" value="Coffee Cake">
                                    </div>
                                    <div class="form-group">
                                        <label for="homeTitle">Điện thoại</label>
                                        <input type="number" class="form-control" id="homeTitle" value="0929272622">
                                    </div>
                                    <div class="form-group">
                                        <label for="homeDescription">Địa chỉ</label>
                                        <textarea class="form-control" id="homeDescription" rows="3">Đường 23, Hai BÀ Trưng, Vĩnh Phước, Hà Nội, Việt Nam.</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="country">Quốc gia</label>
                                            <select class="form-control" id="city">
                                                <option value="" disabled selected>Chọn Quốc Gia</option>
                                                <option value="">Việt Nam</option>
                                                <option value="">Trung Quốc</option>
                                                <option value="">Thái Lan</option>
                                                <option value="">Hoa Kỳ</option>
                                                <option value="">Anh</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">Tỉnh / Thành phố</label>
                                            <select class="form-control" id="city">
                                            <option value="" disabled selected>Chọn Tỉnh/Thành Phố</option>
                                            <option>Hà Nội</option>a
                                            <option>NewYork</option>a
                                            <option>Hồ Chí Minh</option>a
                                            <option>Nha Trang</option>a
                                            </select>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Ẩn sản phẩm khi hết hàng</h5>
                        <p class="pet">Khi bật chế độ này, các sản phẩm hết hàng sẽ không được hiển thị ở các trang danh sách sản phẩm.</p>
                    </div>
                    <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="hideOutOfStock">
                                    <label class="custom-control-label" for="hideOutOfStock">Ẩn sản phẩm hết hàng</label>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Trạng thái Website</h5>
                        <p class="pet">Khi bật chế độ hiển thị nâng cấp, khách hàng sẽ thấy website của bạn đang ở trạng thái bảo trì. Nhập mật khẩu để truy cập được vào website.</p>
                    </div>
                    <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="upgradeMode" onchange="toggleUpgradeForm()">
                                    <label class="custom-control-label" for="upgradeMode">Bật chế độ hiển thị nâng cấp</label>
                                </div>
                                <!-- Hidden upgrade form -->
                                <div id="upgradeForm" class="form-group hidden mt-2">
                                    <label for="password">Mật khẩu truy cập</label>
                                    <input type="password" class="form-control" id="password" value="123456Q">
                                    <div class="form-group">
                                        <label for="homeDescription">Thông tin truy cập website</label>
                                        <textarea class="form-control" id="homeDescription" rows="3">Website của ShopMen đang trong quá trình chỉnh sửa.Xin quý khách vui lòng quay lại vào 2 ngày tới!</textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Your existing HTML content here -->
            <div class="container mt-3">
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Lưu</button>
                    </div>
                </div>
            </div>
        </form>
        </main>
        </div>
    <script src="index.js"></script>
    <script>
        function toggleUpgradeForm() {
            var upgradeForm = document.getElementById("upgradeForm");
            var upgradeCheckbox = document.getElementById("upgradeMode");

            if (upgradeCheckbox.checked) {
                upgradeForm.classList.remove("hidden");
            } else {
                upgradeForm.classList.add("hidden");
            }
        }
    </script>
</body>
</html>
