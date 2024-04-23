<?php
    include_once '../../import/connect.php';
    $show = $_GET['show'];
    $user_id = $_GET['user_id'];
    $sql_edit = "SELECT * FROM users where user_id=$user_id";
    $result_account_edit = sqlsrv_query($conn, $sql_edit);
    $row_account_edit = sqlsrv_fetch_array($result_account_edit,SQLSRV_FETCH_ASSOC);
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
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3,.form-label{
            color: var(--dark);
        }
    </style>
</head>

<body>
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
            <a href="../dashboard/new.php" class="notif">
                <i class='bx bx-bell'></i>
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
        <div class="container mt-5">
            <!-- Header -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h3><a href="show.php?user_id=<?php echo $user_id; ?>&show=<?php echo $show; ?>"><i class="bi bi-arrow-left-circle me-3"></i></a>Cập nhật thông tin</h3>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary me-2">Tải lên từ Excel</button>
                    </div>
                </div>
            </div>

            <!-- Body - Registration Form -->
            <form action="process.php?user_id=<?php echo $user_id;?>&show=<?php echo $show; ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate id="accountForm">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="firstName" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" required placeholder="Nhập Tên" value="<?php echo $row_account_edit['first_name']; ?>">
                        <div class="invalid-feedback">
                            Tên không được trống.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Tên đệm</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Nhập tên đệm (có thể bỏ trống)" value="<?php echo $row_account_edit['middle_name']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="lastName" class="form-label">Họ</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" required placeholder="Nhập họ" value="<?php echo $row_account_edit['last_name']; ?>">
                        <div class="invalid-feedback">
                            Họ không được trống.
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="dob" class="form-label">Ngày sinh</label>
                        <?php $dob = $row_account_edit['date_of_birth'];
                        $formatted_dob = $dob->format('Y-m-d');?>
                        <input type="date" class="form-control" id="dob" name="date_of_birth" required value="<?php echo $formatted_dob; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="gender" class="form-label">Giới tính</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="1" <?php echo ($row_account_edit['gender'] == '1') ? 'selected' : ''; ?>>Nam</option>
                            <option value="0" <?php echo ($row_account_edit['gender'] == '0') ? 'selected' : ''; ?>>Nữ</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Nhập Số điện thoại" value="<?php echo $row_account_edit['phone']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email" value="<?php echo $row_account_edit['email']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" required placeholder="Nhập địa chỉ" value="<?php echo $row_account_edit['address']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="image_user" class="form-label">Ảnh chân dung</label>
                        <span style="padding-left: 10px;"><img src="../../<?php echo $row_account_edit['image_user']; ?>" width="60px"></span> <br><br>
                        <input type="file" class="form-control" id="image_user" name="image_user">
                        <div class="invalid-feedback">
                            Vui lòng chọn ảnh chân dung.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="sbm_edit">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </main>
    </div>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rqI2waM7CtpVHmUnY9NXfQTKc3N8RBLtbl6TbY3b3NC6HjbF2wF81v11z5KnMK17" crossorigin="anonymous"></script>
    <script>
        // Enable Bootstrap form validation
        (function() {
            'use strict';

            var form = document.getElementById('accountForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();

    </script>
</body>
</html>
