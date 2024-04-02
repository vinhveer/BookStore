<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt thông báo hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cài đặt thông báo hệ thống</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Thiết lập thông báo</h6>
                        <p class="card-text">Thiết lập cách hệ thống thông báo với người dùng.</p>
                        <button class="btn btn-primary"><i class="fas fa-cog me-1"></i>Cài đặt</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Thông báo mới nhất</h6>
                        <p class="card-text">Xem danh sách các thông báo mới nhất từ hệ thống.</p>
                        <button class="btn btn-primary"><i class="fas fa-bell me-1"></i>Xem danh sách</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Gửi thông báo</h6>
                        <p class="card-text">Gửi thông báo mới đến người dùng.</p>
                        <button class="btn btn-primary"><i class="fas fa-envelope me-1"></i>Gửi thông báo</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Quản lý thông báo</h6>
                        <p class="card-text">Xem, chỉnh sửa hoặc xóa các thông báo đã gửi.</p>
                        <button class="btn btn-primary"><i class="fas fa-list-alt me-1"></i>Quản lý thông báo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
