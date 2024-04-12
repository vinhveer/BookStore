<?php
include_once 'layout.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức - Hệ Thống Quản Lý Nhà Sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 60px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Tin Tức Hệ Thống</h2>
            </div>
            <div class="col-md-6">
                <a href="index.php" class="btn btn-primary float-end" type ="button">Thoát</a>
            </div>
        </div>
    </div>
    <div class="row">
            <!-- Tin tức 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 1</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!-- Tin tức 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 2</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            <!-- Tin tức 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tiêu đề tin tức 3</h5>
                        <p class="card-text">Mô tả ngắn gọn về tin tức này...</p>
                        <a href="#" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
