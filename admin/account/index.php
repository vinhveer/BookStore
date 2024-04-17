<?php
    include_once '../../import/connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
        $keyword = strtolower(trim($tukhoa));
        $keyword = str_replace(' ', '', $keyword);
        $sql_account ="EXEC SearchUsers $keyword";
        $result_account = sqlsrv_query($connect, $sql_account);
    } else {
        $sql_account = "EXEC GetUserInformation_no";
        $result_account = sqlsrv_query($connect, $sql_account);
    }

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
    <title>Home Admin</title>
    <style>
        .action-buttons .btn-info,.action-buttons .btn-warning,.action-buttons .btn-danger  {
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>Admin</span></div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>
            <li><a href="#"><i class='bx bxs-user-account'></i>Manager</a></li>
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
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-2">
                    <h3>Tài khoản</h3>
                </div>
                <div class="col-md-4">
                    <form class="d-flex" action="index.php" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                        name="tukhoa" value="">
                    <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                    </form>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem'])) { ?>
                    <div class="row mt-3">
                        <div class="col">
                            <?php
                            $tukhoa = $_POST['tukhoa'];
                            echo "<p>Tìm kiếm với từ khóa: '<strong>$tukhoa</strong>'</p>";
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-6 text-right">
                    <a href="account_add.php" class="btn btn-primary float-end">Thêm tài khoản mới</a>
                    <a href="account_group.php" class="btn btn-primary float-end me-2">Nhóm Tài khoản</a>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                while ($row_account = sqlsrv_fetch_array($result_account)) {?>
                                <tr>
                                    <td scope="row"><?php $i++; echo $i ?></td>
                                    <td><?php echo $row_account['full_name'] ?></td>
                                    <td><?php echo $row_account['email'] ?></td>
                                    <td><?php echo $row_account['role_name'] ?></td>
                                    <td>
                                        <div class="action-buttons d-flex justify-content-start">
                                            <a href="account_edit.php" class="btn btn-sm btn-warning me-1"><i class='bx bx-sm bx-edit-alt me-1'></i>Edit</a>
                                            <button class="btn btn-sm btn-danger me-1"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                            <a href="show.php?user_id=<?php echo $row_account['user_id']; ?>&role_id=<?php echo $row_account['role_id'];?>" class="btn btn-info">
                                            <i class='bx bx-sm bx-show-alt me-1'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
