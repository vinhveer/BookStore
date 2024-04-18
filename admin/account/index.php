<?php
    include_once '../../import/connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['timkiem'])) {
        $tukhoa = $_POST['tukhoa'];
        $sql_account ="SearchUsers N'$tukhoa'";
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
        .action-buttons .btn-info,.action-buttons .btn-warning,.action-buttons .btn-danger,.btn.btn-primary  {
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }
    </style>
</head>

<body >
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
        <nav class="fixed-nav">
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
        <div class="container-fluid">
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
                    <a href="account_add.php" class="btn btn-primary float-end"><i class='bx bxs-user-plus' ></i>Thêm tài khoản mới</a>
                    <a href="account_group.php" class="btn btn-primary float-end me-2"><i class='bx bxs-user-detail' ></i>Nhóm Tài khoản</a>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3" >
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" >
                        <thead >
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên người dùng</th>
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
                                    <td><?php echo $row_account['username'] ?></td>
                                    <td><?php echo $row_account['email'] ?></td>
                                    <td><?php echo $row_account['role_name'] ?></td>
                                    <td>
                                        <div class="action-buttons d-flex justify-content-start">
                                            <a href="account_edit.php?user_id=<?php echo $row_account['user_id']; ?>&edit=0" class="btn btn-sm btn-warning me-1"><i class='bx bx-sm bx-edit-alt me-1'></i>Edit</a>
                                            <button class="btn btn-sm btn-danger me-1 deleteUserBtn" data-userId="<?php echo $row_account['user_id']; ?>"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
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
    <div style="z-index:99999" class="modal fade mt-5" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Xác nhận xóa người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa người dùng này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteUserForm" action="" method="post">
                    <button type="submit" class="btn btn-danger" id="confirmDeleteUser" name="confirmDeleteUser">Xóa</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Xác định nút "Xóa" trên bảng
    const deleteButtons = document.querySelectorAll('.btn-danger');

    // Lặp qua từng nút và thêm sự kiện click
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Lấy id của người dùng từ thuộc tính data-userId của nút "Xóa"
            const userId = button.getAttribute('data-userId');

            // Set action của form xóa để truyền userId
            document.getElementById('deleteUserForm').action = 'delete_user.php?user_id=' + userId;

            // Hiển thị modal xác nhận xóa
            const deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
            deleteUserModal.show();
        });
    });
});
</script>
</body>
</html>
