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
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <?php
                        $show = $_GET['show'];
                        $user_id = $_GET['user_id'];
                        ?>
                        <h3><a href="<?php echo ($show == 1)?'account_group.php':'index.php'; ?>"><i class="bi bi-arrow-left-circle me-3"></i></a> User Information</h3>
                    </div>
                        <div class="col-md-6 text-right">
                            <a href="account_edit.php?user_id=<?php echo $user_id; ?>&show=<?php echo $show;?>" class="btn btn-success float-end"><i class='bx bx-sm bx-edit-alt me-1'></i>Edit Information</a>
                        </div>
                    </div>
                </div>
                <?php
                    $sql_info_account = "SELECT ua.username,ua.password,u.email,r.role_name,r.role_id FROM users u
                    INNER JOIN user_roles ur ON u.user_id = ur.user_id
                    INNER JOIN roles r ON ur.role_id = r.role_id
                    INNER JOIN user_accounts ua on ua.user_role_id = ur.user_role_id
                    WHERE u.user_id =$user_id";
                    $result_account_info = sqlsrv_query($conn, $sql_info_account);
                    $row_account_info = sqlsrv_fetch_array($result_account_info);
                ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row_account_info['username']; ?></td>
                            <td><?php echo $row_account_info['password']; ?></td>
                            <td><?php echo $row_account_info['email']; ?></td>
                            <td><?php echo $row_account_info['role_name']; ?></td>
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
                        <a class="nav-link active" data-toggle="tab" href="#thongtin">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#phanquyen">Permissions</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane fade show active" id="thongtin">
                    <?php
                    $sql_info_user = "SELECT last_name + ' ' + middle_name + ' ' + first_name AS full_name,
                                    CASE WHEN gender = 0 THEN N'Female' ELSE N'Male' END AS gender_name,
                                    CONVERT(VARCHAR, date_of_birth, 103) AS DOB, -- Format date of birth as dd/mm/yyyy
                                    address,phone,email,image_user FROM users where user_id=$user_id;";
                    $result_user_info = sqlsrv_query($conn, $sql_info_user);
                    $row_user_info = sqlsrv_fetch_array($result_user_info); ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                                            <img src="../../<?php echo $row_user_info['image_user']; ?>" alt="Profile Image" class="img-fluid rounded-circle mb-3"
                                                style="width: 200px; height: 200px;">
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Personal Information</h4>
                                            <hr class="info-divider">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 75px">Full name:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['full_name']; ?></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 95px">Gender:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['gender_name']; ?></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 50px">Date Of Birth:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['DOB']; ?></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 85px">Address:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['address']; ?></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 98px">Phone:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['phone']; ?></p>
                                                    </div>
                                                </li>
                                                <li class="list-group-item list-group-item-action list-group-item-light">
                                                    <div class="d-flex align-items-center">
                                                        <strong style="margin-right: 105px">Email:</strong>
                                                        <p style="margin-bottom: 0px"><?php echo $row_user_info['email']; ?></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="phanquyen">
                            <div class="col-md-12 mb-3">
                                <div class="card">
                                    <form action="process.php?user_id=<?php echo $user_id;?>&show=<?php echo $show?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate id="accountForm">
                                        <div class="card-body">
                                        <h4 class="card-title me-5">Account Permissions</h4>
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <span class="col-md-4">Choose role: </span>
                                                        <div class="col-md-5">
                                                            <select class="form-select" id="selectRole" name="role_id">
                                                                <option disabled selected> Choose role</option>
                                                                <option value="2" <?php echo ($row_account_info['role_id'] == '2') ? 'selected' : ''; ?>>Admin</option>
                                                                <option value="1" <?php echo ($row_account_info['role_id'] == '1') ? 'selected' : ''; ?>>Customer</option>
                                                                <option value="3" <?php echo ($row_account_info['role_id'] == '3') ? 'selected' : ''; ?>>Employee</option>
                                                                <option value="5" <?php echo ($row_account_info['role_id'] == '5') ? 'selected' : ''; ?>>Manager</option>
                                                                <option value="4" <?php echo ($row_account_info['role_id'] == '4') ? 'selected' : ''; ?>>Warehouse</option>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Your Store:</b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission1" checked disabled>
                                                            <label class="form-check-label" for="permission1">Homepage</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission2" checked disabled>
                                                            <label class="form-check-label" for="permission2">Products, Categories</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission3" checked disabled>
                                                            <label class="form-check-label" for="permission3">Orders</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission4" checked disabled>
                                                            <label class="form-check-label" for="permission4">Promotions</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission5" checked disabled>
                                                            <label class="form-check-label" for="permission5">Notifications</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Content:</b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission6" checked disabled>
                                                            <label class="form-check-label" for="permission6">Blogs and Content pages</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission7" checked disabled>
                                                            <label class="form-check-label" for="permission7">Menu</label>
                                                        </div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-check-label"><b>Configuration: </b></label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission8" checked disabled>
                                                            <label class="form-check-label" for="permission8">Information</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="permission9" checked disabled>
                                                            <label class="form-check-label" for="permission9" checked disabled>System Configuration</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name ="sbm_role">Save</button>
                                        </div>
                                    </form>
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
</body>
</html>
