<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Thông tin hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-4">
        <h2 class="text-center">Thông tin hệ thống</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin hệ thống
                    </div>
                    <div class="card-body">
                        <p class="d-flex justify-content-between">Version: 1.0.0<a href="">Xem chi tiết</a></p>
                        <p>Developed by: Your Company Name</p>
                        <p>Email: info@company.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin phiên bản
                    </div>
                    <div class="card-body">
                        <p>Phiên bản mới nhất: 1.1.0</p>
                        <p>Ngày cập nhật: 01/01/2024</p>
                        <p><a href="#">Xem chi tiết cập nhật</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Bản quyền
                    </div>
                    <div class="card-body">
                        <p>Bản quyền © 2024. Bảo lưu mọi quyền.</p>
                        <p>Được phát triển bởi Your Company Name.</p>
                        <p>Mã: IVAGSSSSF</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Liên hệ
                    </div>
                    <div class="card-body">
                        <p class="d-flex justify-content-between">Thông tin liên hệ<a href="">Xem chi tiết</a></p>
                        <p>Điện thoại: 0123 456 789</p>
                        <p>Email: contact@company.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>
