<?php
include_once 'layout.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt chính sách giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Cài đặt chính sách giá</h2>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="setting_add_price.php" class="btn btn-primary">Thêm</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">TÊN CHÍNH SÁCH</th>
                                    <th scope="col">MÔ TẢ</th>
                                    <th scope="col">THỜI GIAN ÁP DỤNG</th>
                                    <th scope="col">LOẠI TIỀN</th>
                                    <th scope="col">TRẠNG THÁI</th>
                                    <th scope="col">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chính sách giá cho khách lẻ</td>
                                    <td>Bán hàng</td>
                                    <td>01/01/2021 - 31/05/2021</td>
                                    <td>VND</td>
                                    <td>Đang áp dụng</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Sửa</button>
                                        <button class="btn btn-sm btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chính sách giá cho khách hàng công ty xây dựng</td>
                                    <td>Công cụ dụng cụ - Tài sản cố định</td>
                                    <td>01/10/2020 - 31/03/2021</td>
                                    <td>VND</td>
                                    <td>Đang áp dụng</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Sửa</button>
                                        <button class="btn btn-sm btn-danger">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="d-flex justify-content-between">
                                            <span>Tổng số bản ghi: 20</span>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Trước</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#">Sau</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
