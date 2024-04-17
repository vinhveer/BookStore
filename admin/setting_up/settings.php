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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-md-6">
                <h3>Cài đặt hệ thống</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary float-end">Cập nhật hệ thống</button>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="fas fa-list me-2"></i>Tính năng</h4>
                        <hr class="info-divider">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="setting_configuration.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-cogs me-1"></i>Cấu hình chung </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_info.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-info-circle me-1"></i>Thông tin </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_host.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-globe me-1"></i>Tên miền </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <a href="setting_file.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-folder-open me-1"></i>Quản lý file </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_method.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-credit-card me-1"></i>Phương thức thanh toán </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_notification.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-bell me-1"></i>Thông báo </h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                               <a href="setting_price.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-dollar-sign me-1"></i>Chính Sách Giá</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                               </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_support.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-tools me-1"> </i>Hỗ trợ kĩ thuật</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                               <a href="setting_statistical.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-chart-line me-1"></i>Thống kê truy cập</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                               </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <a href="setting_guarantee.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-shield-alt me-1"></i>Bảo hành</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_instruction.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-book me-1"></i>Hướng dẫn sử dụng</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="setting_addresss.php" class="nav-link">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-map-marker-alt me-1"></i>Địa chỉ cửa hàng</h5>
                                            <p>Thiết bị</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
