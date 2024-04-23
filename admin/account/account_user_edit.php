<?php
    include_once '../../import/connect.php';
    $edit = $_GET['edit'];
    $user_id = $_GET['user_id'];
    $sql_user_edit = "SELECT ua.password, ua.username
    FROM user_roles ur
	INNER JOIN user_accounts ua on ua.user_role_id = ur.user_role_id
    where ur.user_id=$user_id";
    $result_user_edit = sqlsrv_query($conn, $sql_user_edit);
    $row_user_edit = sqlsrv_fetch_array($result_user_edit,SQLSRV_FETCH_ASSOC);
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
        .action-buttons .btn.btn-info {
            display: flex;
            align-items: center;
        }

        h3,.info,.form-label,
        hr {
            color: var(--dark);
        }
        #log{
            text-align: center;
            color: red;
            margin-top: 10px;

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
            <h3><a style="color:black;" href="<?php if($edit==1) echo'account_group.php'; else if($edit==0) echo'index.php';
            else echo'../setting_up/setting_confi.php';?>"><i class='bx bxs-chevrons-left me-3' ></i></a>Thông tin tài khoản</h3>
                <p class="info">Hoàn thành các thông tin sau:</p>
                <hr class="my-4">
                <form id="accountInfoForm" action="process.php?user_id=<?php echo $user_id;?>&edit=<?php echo $edit;?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Tên tài khoản</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" id="username" name="username" pattern="[a-zA-Z0-9_]+" title="Tên tài khoản không hợp lệ. Chỉ chấp nhận chữ, số và gạch dưới." required value="<?php echo $row_user_edit['username'] ?>">
                                <div class="invalid-feedback">
                                    Tên tài khoản không hợp lệ. Chỉ chấp nhận chữ, số và gạch dưới.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required value="<?php echo $row_user_edit['password'];?>">
                                <span class="input-group-text" id="password-toggle"><i class="bx bxs-hide"></i></span>
                                <div class="invalid-feedback">
                                    Mật khẩu không được trống.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required value="<?php echo $row_user_edit['password'] ?>">
                                <span class="input-group-text" id="confirm-password-toggle"><i class="bx bxs-hide"></i></span>
                                <div class="invalid-feedback">
                                    Vui lòng xác nhận mật khẩu.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger <?= (!isset($_SESSION['username_exists']) || !$_SESSION['username_exists']) ?
                    'hidden' : '' ?>" role="alert">
                        <p id="log"></p>
                    </div>
                    <hr class="my-4">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary" name="sbm_account_edit">Hoàn tất việc tạo tài khoản</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
    <script>
        (function () {
            'use strict';

            var form = document.getElementById('accountInfoForm');
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirm_password');
            var passwordToggle = document.getElementById('password-toggle');
            var confirmPasswordToggle = document.getElementById('confirm-password-toggle');

            // Function to show or hide password
            function togglePasswordVisibility(input, toggle) {
                if (input.type === 'password') {
                    input.type = 'text';
                    toggle.innerHTML = '<i class="bx bxs-show"></i>';
                } else {
                    input.type = 'password';
                    toggle.innerHTML = '<i class="bx bxs-hide"></i>';
                }
            }

            // Toggle password visibility
            passwordToggle.addEventListener('click', function () {
                togglePasswordVisibility(passwordInput, passwordToggle);
            });

            confirmPasswordToggle.addEventListener('click', function () {
                togglePasswordVisibility(confirmPasswordInput, confirmPasswordToggle);
            });

            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                // Check if passwords match
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordInput.setCustomValidity("Mật khẩu không khớp.");
                    var confirmPasswordFeedback = confirmPasswordInput.nextElementSibling;
                    confirmPasswordFeedback.textContent = "Mật khẩu không khớp!."
                    confirmPasswordFeedback.style.color = "red";
                    event.preventDefault(); // Ngăn chặn gửi form nếu mật khẩu không khớp
                } else {
                    confirmPasswordInput.setCustomValidity('');
                }

                form.classList.add('was-validated');
            }, false);
        })();

    </script>
    <script>
    // Kiểm tra nếu biến session hoặc query string tồn tại và có giá trị là true
    <?php if (isset($_SESSION['username_exists']) && $_SESSION['username_exists']) : ?>
        document.getElementById('log').innerHTML = 'Tài khoản đã tồn tại.';
    <?php endif; ?>

    // Xóa biến session sau khi đã sử dụng (nếu bạn sử dụng biến session)
    <?php unset($_SESSION['username_exists']); ?>
</script>

</body>

</html>
