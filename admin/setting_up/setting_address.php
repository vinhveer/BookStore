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
        h4,#cod{
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
        <div class="container-fluid mt-5">
        <div class="row">
              <div class="col-md-4 me-3">
                <h4>Địa chỉ cửa hàng</h4> <hr>
                <p id="cod" style="text-align: justify;">Quản lý địa chỉ cửa hàng, chi nhánh, kho hàng giúp chúng tôi gửi đơn hàng của bạn đến nhà vận chuyển nhanh gọn và chính xác hơn.</p><hr>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addAddressModal">Thêm địa chỉ cửa hàng</button>
          </div>
          <div class="col-md-7">
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Cửa hàng chính</h5>
                    <p>Cửa hàng chính-<a href="#">Thay đổi</a></p>
                </div>
                <hr>
                <p>266 Đội Cấn </p>
                <p>Quận Ba Đình </p>
                <p>Hà Nội </p>
                <p>Việt Nam </p>
                <div class="row">
                  <div class="col d-flex justify-content-between">
                    <button class="btn btn-danger btn-sm">Xóa địa chỉ</button>
                    <button class="btn btn-primary btn-sm ml-2">Sửa địa chỉ</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Kho hàng Gia Lâm</h5>
                <hr>
                <p>132, Nguyễn Văn Cừ</p>
                <p>Quận Long Biên</p>
                <p>Hà Nội</p>
                <p>Việt Nam</p>
                <div class="row">
                  <div class="col d-flex justify-content-between">
                    <button class="btn btn-danger btn-sm">Xóa địa chỉ</button>
                    <button class="btn btn-primary btn-sm ml-2">Sửa địa chỉ</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addAddressModalLabel">Thêm địa chỉ cửa hàng</h5>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="addressName">Tên địa điểm</label>
                  <input type="text" class="form-control" id="addressName" placeholder="Nhập Tên địa điểm">
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group col-md-6 mt-2">
                      <label for="phone">Điện thoại</label>
                      <input type="tel" class="form-control" id="phone" placeholder="Nhập điện thoại">
                    </div>
                </div>
                <div class="form-group mt-2">
                  <label for="address">Địa chỉ</label>
                  <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
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
                    <div class="form-group col-md-6 mt-2">
                      <label for="zip">Postal / Zip Code</label>
                      <input type="text" class="form-control" id="zip" placeholder="Nhập Postal / Zip Code">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mt-2">
                      <label for="city">Tỉnh / Thành phố</label>
                      <select class="form-control" id="city">
                      <option value="" disabled selected>Chọn Tỉnh/Thành Phố</option>
                        <option>Hà Nội</option>a
                        <option>NewYork</option>a
                        <option>Hồ Chí Minh</option>a
                        <option>Nha Trang</option>a
                      </select>
                    </div>
                    <div class="form-group col-md-6 mt-2">
                      <label for="district">Quận huyện</label>
                      <select class="form-control" id="district">
                        <option>Quận Ba Đình</option>
                      </select>
                    </div>
                </div>
                <div class="form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="pickup">
                  <label class="form-check-label" for="pickup">Địa chỉ lấy hàng</label>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary">Lưu</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    </div>
    <script src="index.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
