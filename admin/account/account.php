<?php
include_once 'layout.php'
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
    <style>
        .action-buttons {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2">
                <h3>Tài khoản</h3>
            </div>
            <div class="col-md-4">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                        name="tukhoa" value="">
                    <button class="btn btn-outline-primary" type="submit" name="timkiem" value="find">Tìm</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="account_add.php" class="btn btn-primary float-end">Thêm tài khoản mới</a>
                <a href="account_group.php" class="btn btn-primary float-end me-2">Nhóm Tài khoản</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <table class="table table-striped">
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
                <tr>
                    <th scope="row">1</th>
                    <td>user1</td>
                    <td>user1@example.com</td>
                    <td>user</td>
                    <td>
                        <div class="action-buttons">
                            <a href="account_edit.php" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                            <a href="account_show.php" class="btn btn btn-info"><i
                                    class='bx bx-show-alt me-1'></i>View</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>user1</td>
                    <td>user1@example.com</td>
                    <td>user</td>
                    <td>
                        <div class="action-buttons">
                        <a href="account_edit.php" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                            <a href="account_show.php" class="btn btn btn-info"><i
                                    class='bx bx-show-alt me-1'></i>View</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>user1</td>
                    <td>user1@example.com</td>
                    <td>user</td>
                    <td>
                        <div class="action-buttons">
                            <a href="account_edit.php" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                            <a href="account_show.php" class="btn btn btn-info"><i
                                    class='bx bx-show-alt me-1'></i>View</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>user1</td>
                    <td>user1@example.com</td>
                    <td>user</td>
                    <td>
                        <div class="action-buttons">
                            <a href="account_edit.php" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                            <a href="account_show.php" class="btn btn btn-info"><i
                                    class='bx bx-show-alt me-1'></i>View</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
