<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phương thức thanh toán</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div class="container py-5">
        <div class="row mt-3">
            <div class="col-lg-12">
                <h2 class="mb-4">Hệ thống phương thức thanh toán</h2>
                <div class="card">
                    <div class="card-header text-black">
                        <h6 class="mb-0">Danh sách phương thức thanh toán</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên phương thức</th>
                                        <th>Trạng thái</th>
                                        <th>Mô tả</th>
                                        <th>Phí</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Thanh toán khi nhận hàng</td>
                                        <td><span class="badge bg-success">Hoạt động</span></td>
                                        <td>Khách hàng thanh toán tiền mặt khi nhận hàng</td>
                                        <td>Không có phí</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            <button class="btn btn-warning mb-3 me-2 btn-edit"><i class="fas fa-edit"></i> Sửa</button>
                                                <button class="btn btn-danger mb-3 btn-delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Thanh toán qua thẻ tín dụng</td>
                                        <td><span class="badge bg-success">Hoạt động</span></td>
                                        <td>Khách hàng thanh toán qua thẻ tín dụng (Visa, MasterCard, etc.)</td>
                                        <td>1.5% phí giao dịch</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            <button class="btn btn-warning mb-3 me-2 btn-edit"><i class="fas fa-edit"></i> Sửa</button>
                                                <button class="btn btn-danger mb-3 btn-delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Thanh toán qua thẻ tín dụng</td>
                                        <td><span class="badge bg-success">Hoạt động</span></td>
                                        <td>Khách hàng thanh toán qua thẻ tín dụng (Visa, MasterCard, etc.)</td>
                                        <td>1.5% phí giao dịch</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            <button class="btn btn-warning mb-3 me-2 btn-edit"><i class="fas fa-edit"></i> Sửa</button>
                                                <button class="btn btn-danger mb-3 btn-delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- More rows can be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <div class="mt-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentMethodModal">
                    <i class="fas fa-plus"></i> Thêm phương thức thanh toán mới
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addPaymentMethodModal" tabindex="-1" aria-labelledby="addPaymentMethodModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPaymentMethodModalLabel">Thêm phương thức thanh toán mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="mb-3">
                            <label for="paymentMethodName" class="form-label">Tên phương thức:</label>
                            <input type="text" class="form-control" id="paymentMethodName">
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethodDescription" class="form-label">Mô tả:</label>
                            <textarea class="form-control" id="paymentMethodDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethodFee" class="form-label">Phí:</label>
                            <input type="text" class="form-control" id="paymentMethodFee">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="paymentMethodStatus">
                            <label class="form-check-label" for="paymentMethodStatus">Kích hoạt</label>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="savePaymentMethod">Lưu</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa phương thức thanh toán này không?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Xóa</button>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="editPaymentMethodModal" tabindex="-1" aria-labelledby="editPaymentMethodModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editPaymentMethodModalLabel">Sửa phương thức thanh toán</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" id="editPaymentMethodIndex">
                                <div class="mb-3">
                                    <label for="editPaymentMethodName" class="form-label">Tên phương thức:</label>
                                    <input type="text" class="form-control" id="editPaymentMethodName">
                                </div>
                                <div class="mb-3">
                                    <label for="editPaymentMethodDescription" class="form-label">Mô tả:</label>
                                    <textarea class="form-control" id="editPaymentMethodDescription" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editPaymentMethodFee" class="form-label">Phí:</label>
                                    <input type="text" class="form-control" id="editPaymentMethodFee">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="editPaymentMethodStatus">
                                    <label class="form-check-label" for="editPaymentMethodStatus">Kích hoạt</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" id="saveEditedPaymentMethod">Lưu</button>
                        </div>
                    </div>
                </div>
</div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-A5CRzWPsHvMOZTw0H9GtMh9VvAsVTnFhATNx9t6pXH67NgEgSP9b5qBtFAq5HKSZ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha384-VwX5S1GGC0B4Iui21axoVYovA0mZgRSjzKZmzp8rGAPDxpQUdRerApXGfJ2MFsFc"
        crossorigin="anonymous"></script>
    <script>
    document.getElementById("savePaymentMethod").addEventListener("click", function() {
        // Lấy thông tin từ các trường input trong modal
        var name = document.getElementById("paymentMethodName").value;
        var description = document.getElementById("paymentMethodDescription").value;
        var fee = document.getElementById("paymentMethodFee").value;
        var status = document.getElementById("paymentMethodStatus").checked ? '<span class="badge bg-success">Hoạt động</span>' : '<span class="badge bg-danger">Không hoạt động</span>';

        // Thêm hàng mới vào bảng
        var table = document.querySelector("table tbody");
        var newRow = table.insertRow(-1);
        newRow.innerHTML = "<td></td><td>" + name + "</td><td>" + status + "</td><td>" + description + "</td><td>" + fee + "</td><td><div class='btn-group' role='group'><button class='btn btn-warning mb-3 me-2'><i class='fas fa-edit'></i> Sửa</button><button class='btn btn-danger mb-3'><i class='fas fa-trash-alt'></i> Xóa</button></div></td>";

        // Cập nhật số thứ tự của các hàng
        updateRowNumbers();

        // Đóng modal
        $('#addPaymentMethodModal').modal('hide');
    });

    // Hàm cập nhật số thứ tự của các hàng
    function updateRowNumbers() {
        var rows = document.querySelectorAll("table tbody tr");
        rows.forEach(function(row, index) {
        row.cells[0].textContent = index + 1;
        });
    }

    document.querySelectorAll(".btn-delete").forEach(function(button) {
        button.addEventListener("click", function() {
            var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            var row = this.closest("tr");
            var deleteButton = document.getElementById("confirmDeleteButton");

            deleteButton.onclick = function() {
                // Thực hiện hành động xóa ở đây, ví dụ:
                // row.remove();
                modal.hide();
            };

            modal.show();
        });
    });

    document.querySelectorAll(".btn-edit").forEach(function(button) {
        button.addEventListener("click", function() {
            var modal = new bootstrap.Modal(document.getElementById('editPaymentMethodModal'));
            var row = this.closest("tr");
            var cells = row.cells;
            var index = parseInt(cells[0].textContent) - 1; // Lấy chỉ số của hàng
            var name = cells[1].textContent;
            var status = cells[2].querySelector("span").textContent.includes("Hoạt động");
            var description = cells[3].textContent;
            var fee = cells[4].textContent;

            document.getElementById("editPaymentMethodIndex").value = index;
            document.getElementById("editPaymentMethodName").value = name;
            document.getElementById("editPaymentMethodDescription").value = description;
            document.getElementById("editPaymentMethodFee").value = fee;
            document.getElementById("editPaymentMethodStatus").checked = status;

            modal.show();
        });
    });

    // Lưu thông tin phương thức thanh toán đã sửa
    document.getElementById("saveEditedPaymentMethod").addEventListener("click", function() {
        var index = parseInt(document.getElementById("editPaymentMethodIndex").value);
        var name = document.getElementById("editPaymentMethodName").value;
        var description = document.getElementById("editPaymentMethodDescription").value;
        var fee = document.getElementById("editPaymentMethodFee").value;
        var status = document.getElementById("editPaymentMethodStatus").checked ? '<span class="badge bg-success">Hoạt động</span>' : '<span class="badge bg-danger">Không hoạt động</span>';

        var row = document.querySelectorAll("table tbody tr")[index];
        row.cells[1].textContent = name;
        row.cells[2].innerHTML = status;
        row.cells[3].textContent = description;
        row.cells[4].textContent = fee;

        var modal = new bootstrap.Modal(document.getElementById('editPaymentMethodModal'));
        modal.hide();
    });
    </script>

</body>

</html>
