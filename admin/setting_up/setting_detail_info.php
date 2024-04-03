<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hệ thống - Phần mềm quản lý nhà sách và văn phòng phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Thông tin hệ thống</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tên phần mềm:</strong> Phần mềm quản lý nhà sách và văn phòng phẩm</li>
                        <li class="list-group-item"><strong>Phiên bản:</strong> 1.0</li>
                        <li class="list-group-item"><strong>Ngày phát hành:</strong> 2024-04-03</li>
                        <li class="list-group-item"><strong>Nhà phát triển:</strong> Công ty ABC</li>
                        <li class="list-group-item"><strong>Mô tả:</strong> Phần mềm này được thiết kế để quản lý các hoạt động kinh doanh của cửa hàng nhà sách và văn phòng phẩm. Nó cung cấp các tính năng như quản lý hàng hóa, quản lý khách hàng, quản lý đơn đặt hàng và nhiều tính năng khác để hỗ trợ hoạt động kinh doanh một cách hiệu quả.</li>
                        <li class="list-group-item"><strong>Liên hệ:</strong> support@abc.com</li>
                        <li class="list-group-item"><strong>Website:</strong> <a href="https://www.example.com">www.example.com</a></li>
                        <li class="list-group-item"><strong>Địa chỉ:</strong> 123 Đường ABC, Thành phố XYZ</li>
                        <li class="list-group-item"><strong>Số điện thoại:</strong> +123456789</li>
                        <li class="list-group-item"><strong>Thành viên:</strong> John Doe, Jane Smith, Tom Brown</li>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="setting_info.php" class="btn btn-primary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
