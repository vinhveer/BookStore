<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h3>Trang chủ</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary float-end">Xuất báo cáo</button>
                <a href ="news.php" type="button" class="btn btn-primary float-end me-2">Tin tức</a>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Thống kê doanh thu</h5>
                        <div class="col-sm-3">
                            <select class="form-select" id="" name="" required>
                                <option value="" disabled selected>Chọn Lịch sử</option>
                                <option value="">Hôm nay</option>
                                <option value="">Ngày hôm qua</option>
                                <option value="">Một tuần trước</option>
                                <option value="">Một tháng trước</option>
                                <option value="">Một Năm trước</option>
                            </select>
                        </div>
                    </div>
                    <hr class="info-divider">
                    <canvas id="revenueChart" width="400" height="200"></canvas>
                </div>
                <div class="card mt-2 mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Thống kê hoạt động</h5>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%;"
                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Bán hàng</div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Nhập hàng</div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 10%;"
                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">Hoạt động khác</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title text-center">Các hoạt động gần đây</h5>
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="col-sm-10">
                                <select class="form-select" id="activity" name="activity" required>
                                    <option value="" disabled selected>Chọn Lịch sử</option>
                                    <option value="">Hôm nay</option>
                                    <option value="">Ngày hôm qua</option>
                                    <option value="">Một tuần trước</option>
                                    <option value="">Một tháng trước</option>
                                    <option value="">Một Năm trước</option>
                                </select>
                            </div>
                        </div>
                        <hr class="info-divider">
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            100.000</p>
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            500.000</p>
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            250.000 </p>
                        <p><i class='bx bx-shopping-bag bx-sm text-danger'></i> User 4 vừa bán hàng hóa giá trị
                            50.000 </p>
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            100.000 </p>
                            <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            100.000</p>
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            500.000</p>
                        <p><i class='bx bx-package bx-sm text-warning'></i> User 1 vừa nhập hàng hóa giá trị là
                            250.000 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Doanh thu',
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: [1000000, 800000, 1200000, 900000, 1100000, 950000, 300000, 200000, 500000, 1000000, 1200000, 100000],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
