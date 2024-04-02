<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bảo hành hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4">Bảo hành hệ thống</h2>
            </div>
            <div class="col-md-6">
            <button class="btn btn-primary float-end">Cập nhật bảo hành</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin bảo hành
                    </div>
                    <div class="card-body">
                        <p><strong>Mã hợp đồng:</strong> HD123456</p>
                        <p><strong>Ngày ký:</strong> 01/04/2024</p>
                        <p><strong>Ngày hết hạn:</strong> 01/04/2025</p>
                        <p><strong>Trạng thái:</strong> Đã kích hoạt</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin khách hàng
                    </div>
                    <div class="card-body">
                        <p><strong>Tên khách hàng:</strong> Nguyễn Văn A</p>
                        <p><strong>Email:</strong> example@example.com</p>
                        <p><strong>Số điện thoại:</strong> 0123 456 789</p>
                        <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận XYZ, TP. HCM</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lịch sử bảo hành
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ngày bảo hành</th>
                                    <th scope="col">Mô tả công việc</th>
                                    <th scope="col">Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>01/04/2024</td>
                                    <td>Kiểm tra phần mềm</td>
                                    <td>Hoàn thành</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>02/04/2024</td>
                                    <td>Sửa lỗi giao diện</td>
                                    <td>Đang xử lý</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>03/04/2024</td>
                                    <td>Cập nhật tính năng mới</td>
                                    <td>Chưa xử lý</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
