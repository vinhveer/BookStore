<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hỗ trợ kỹ thuật</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <h2 class="text-center mb-4">Quản lý hỗ trợ kỹ thuật</h2>

    <!-- Form để thêm yêu cầu hỗ trợ -->
    <div class="card mb-4">
        <div class="card-header">
            Thêm yêu cầu hỗ trợ mới
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" placeholder="Nhập tiêu đề">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Nhập mô tả"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
            </form>
        </div>
    </div>

    <!-- Danh sách các yêu cầu hỗ trợ -->
    <div class="card">
        <div class="card-header">
            Danh sách yêu cầu hỗ trợ
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Yêu cầu 1: <span class="badge bg-info text-dark">Chưa xử lý</span></li>
                <li class="list-group-item">Yêu cầu 2: <span class="badge bg-success">Đã xử lý</span></li>
                <li class="list-group-item">Yêu cầu 3: <span class="badge bg-danger">Chờ phản hồi</span></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
