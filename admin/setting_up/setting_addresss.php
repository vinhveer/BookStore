<?php
include_once ('layout.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cài đặt thông tin địa chỉ cửa hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h2 class="mb-4 text-lg-center">Cài đặt thông tin địa chỉ cửa hàng</h2>

        <!-- Thông tin cơ bản -->
        <div class="card mb-4">
            <div class="card-header">
                Thông tin cơ bản
            </div>
            <div class="card-body">
                <form>
                    <div class ="row g-3">
                        <div class="col-md-4">
                            <label for="storeName" class="form-label">Tên cửa hàng:</label>
                            <input type="text" class="form-control" id="storeName">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Điện thoại:</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>

        <!-- Thiết lập địa chỉ -->
        <div class="card mb-4">
            <div class="card-header">
                Thiết lập địa chỉ
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="province" class="form-label">Tỉnh/Thành:</label>
                            <input type="text" class="form-control" id="province">
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">Quận/Huyện:</label>
                            <input type="text" class="form-control" id="district">
                        </div>
                        <div class="col-md-4">
                            <label for="ward" class="form-label">Xã/Phường:</label>
                            <input type="text" class="form-control" id="ward">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Các nút điều khiển -->
        <div class="mb-4">
            <button type="button" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary">Hủy</button>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JIYWsNPjvnR+dTcYGge8kRb9f4vXXDIQhHLD/HFg5t9g9cAN4lBCVCPhJ3Td/iPq"
        crossorigin="anonymous"></script>
</body>

</html>
