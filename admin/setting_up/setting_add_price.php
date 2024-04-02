<?php
include_once 'layout.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xây dựng chính sách giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <h2 class="mb-4">Xây dựng chính sách giá</h2>

    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class ="card">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="fromDate" class="col-sm-2 col-form-label">Từ ngày</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="fromDate">
                            </div>
                            <label for="toDate" class="col-sm-2 col-form-label">Đến ngày</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="toDate">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="customerGroup" class="col-sm-2 col-form-label">Nhóm khách hàng</label>
                            <div class="col-sm-4">
                                <select class="form-select" id="activity" name="activity" required>
                                    <option value="" disabled selected>Chọn Nhóm</option>
                                    <option value="">Hôm nay</option>
                                    <option value="">Ngày hôm qua</option>
                                    <option value="">Một tuần trước</option>
                                    <option value="">Một tháng trước</option>
                                    <option value="">Một Năm trước</option>
                                </select>
                            </div>
                            <label for="currency" class="col-sm-2 col-form-label">Loại tiền</label>
                            <div class="col-sm-4">
                            <select class="form-select" id="activity" name="activity" required>
                                    <option value="" disabled selected>Chọn Loại tiền</option>
                                    <option value="">VND</option>
                                    <option value="">USD</option>
                                    <option value="">ERO</option>
                                    <option value="">Coin</option>
                                    <option value="">YEN</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="policyName" class="col-sm-2 col-form-label">Tên chính sách</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="policyName">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="policyDescription" class="col-sm-2 col-form-label">Mô tả chi tiết</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="policyDescription" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "card mt-3">
                <h3 class="text-center mt-2">Thiết lập giá bán</h3>
                <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">MÃ HÀNG</th>
                                        <th scope="col">TÊN HÀNG</th>
                                        <th scope="col">DVT</th>
                                        <th scope="col">GIÁ BÁN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>200</td>
                                        <td>Canon PowerShot A810</td>
                                        <td>Chiếc</td>
                                        <td>2.500.000,00</td>
                                    </tr>
                                    <tr>
                                        <td>202</td>
                                        <td>Canon PowerShot A3200 IS</td>
                                        <td>Chiếc</td>
                                        <td>3.500.000,00</td>
                                    </tr>
                                    <tr>
                                        <td>205</td>
                                        <td>Canon Digital IXUS 125HS</td>
                                        <td>Chiếc</td>
                                        <td>3.580.000,00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-secondary">Thêm dòng</button>
                                                <button class="btn btn-secondary">Lấy lên tất cả hàng hóa</button>
                                                <button class="btn btn-danger">Xóa hết dòng</button>
                                                <span>Tổng số: 3 bản ghi</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
