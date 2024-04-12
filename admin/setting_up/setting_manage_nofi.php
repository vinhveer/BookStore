<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý thông báo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Quản lý thông báo</h2>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Thông báo 1</td>
                            <td>Nội dung thông báo 1</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Xem</button>
                                <button type="button" class="btn btn-warning btn-sm">Chỉnh sửa</button>
                                <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Thông báo 2</td>
                            <td>Nội dung thông báo 2</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm">Xem</button>
                                <button type="button" class="btn btn-warning btn-sm">Chỉnh sửa</button>
                                <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                            </td>
                        </tr>
                        <!-- Các hàng dữ liệu khác -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS và các thư viện cần thiết -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>
