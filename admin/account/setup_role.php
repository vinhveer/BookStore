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
    <title>Phân quyền và cài đặt vai trò</title>
    <style>
        .custom-control-label {
            margin-left: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Phân quyền và cài đặt vai trò</h2>
        <div class="row">
            <div class="col-md-8">
                <div class ="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <h4>Chọn vai trò:</h4>
                                <hr>
                                <div class="col-sm-6">
                                    <select class="form-select" id="role">
                                        <option selected disabled>-- Chọn vai trò --</option>
                                        <option value="admin">Quản trị viên</option>
                                        <option value="manager">Quản lý</option>
                                        <option value="staff">Nhân viên</option>
                                        <option value="staff">Khách hàng</option>
                                        <option value="staff">Quản lí kho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chọn quyền:</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="read">
                                            <label class="form-check-label" for="read">Xem TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="write">
                                            <label class="form-check-label" for="write">Hiện Thi TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="delete">
                                            <label class="form-check-label" for="delete">Xóa TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="add">
                                            <label class="form-check-label" for="add">Thêm TK</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="edit">
                                            <label class="form-check-label" for="edit">Chỉnh sửa TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="write">
                                            <label class="form-check-label" for="write">Hiện Thi TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="delete">
                                            <label class="form-check-label" for="delete">Xóa TK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="add">
                                            <label class="form-check-label" for="add">Thêm TK</label>
                                        </div>
                                        <!-- Thêm các quyền khác tương tự ở đây -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="add-book">
                                            <label class="form-check-label" for="add-book">Thêm sách</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="edit-book">
                                            <label class="form-check-label" for="edit-book">Chỉnh sửa sách</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="delete-book">
                                            <label class="form-check-label" for="delete-book">Xóa sách</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="manage-orders">
                                            <label class="form-check-label" for="manage-orders">Quản lý đơn đặt hàng</label>
                                        </div>
                                        <!-- Thêm các quyền khác tương tự ở đây -->
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class ="card-body">
                        <h4>Quyền hiện tại:</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Quyền</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dữ liệu về quyền và hoạt động sẽ được hiển thị ở đây -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
    $('input[type="checkbox"]').change(function(){
        var checkedPermissions = $('input[type="checkbox"]:checked').map(function(){
            return $(this).siblings('label').text();
        }).get();

        var permissionList = '';
        $.each(checkedPermissions, function(index, value){
            permissionList += '<tr><td>' + value + '</td><td>Some activity</td></tr>'; // Thay Some activity bằng hoạt động thực tế
        });

        $('tbody').html(permissionList);
    });
});
    </script>
</body>

</html>
