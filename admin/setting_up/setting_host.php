<?php
include_once('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin - Cài đặt miền hệ thống</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Cài đặt miền hệ thống</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="domainName" class="form-label">Tên miền:</label>
                <input type="text" class="form-control" id="domainName" placeholder="Nhập tên miền" />
              </div>
              <div class="mb-3">
                <label for="domainIP" class="form-label">Địa chỉ IP:</label>
                <input type="text" class="form-control" id="domainIP" placeholder="Nhập địa chỉ IP" />
              </div>
              <div class="mb-3">
                <label for="domainPort" class="form-label">Cổng Kết Nối:</label>
                <input type="text" class="form-control" id="domainPort" placeholder="Nhập cổng kết nối" />
              </div>
              <div class="mb-3">
                <label for="domainDesc" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="domainDesc" rows="3" placeholder="Nhập mô tả"></textarea>
              </div>
              <div class="mb-3">
                <label for="domainStatus" class="form-label">Trạng thái:</label>
                <select class="form-select" id="domainStatus">
                  <option value="active">Hoạt động</option>
                  <option value="inactive">Ngưng hoạt động</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">
                Lưu cài đặt
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
