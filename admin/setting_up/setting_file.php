<?php
include_once ('layout.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lí file hệ thống</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
    <h2 class="mb-4">Quản lí file hệ thống</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm" id="searchInput" value="">
                    <button class="btn btn-outline-primary" type="button" id="searchBtn">Tìm</button>
                </form>
            </div>
            <div class="col-md-6">
                <button id="btnAddNew" class="btn btn-primary mb-3 float-right">Tạo mới</button>
                <button class="btn btn-outline-secondary ml-2" type="button" id="showTrashBtn">Xem thùng rác</button>
            </div>
        </div>
        <div class="table-responsive">
            <table id="fileTable" class="table table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Tên file</th>
                <th>Loại file</th>
                <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu sẽ được thêm vào đây bằng JavaScript -->
            </tbody>
            </table>
        </div>
        </div>

    <!-- Modal Tạo mới -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tạo mới file</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                <div class="form-group">
                    <label for="fileName">Tên file:</label>
                    <input type="text" class="form-control" id="fileName" required>
                </div>
                <div class="form-group">
                    <label for="fileType">Loại file:</label>
                    <select class="form-control" id="fileType" required>
                    <option value="">Chọn loại file</option>
                    <option value="pdf">PDF</option>
                    <option value="doc">DOC</option>
                    <option value="txt">TXT</option>
                    </select>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btnSave">Lưu</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Modal Xác nhận xóa -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa file này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xác nhận</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal Xem thùng rác -->
        <div class="modal fade" id="trashModal" tabindex="-1" role="dialog" aria-labelledby="trashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trashModalLabel">Thùng rác</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="trashTable" class="table table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Tên file</th>
                    <th>Loại file</th>
                    <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dữ liệu sẽ được thêm vào đây bằng JavaScript -->
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
  var files = [
    { id: 1, name: 'File 1', type: 'pdf' },
    { id: 2, name: 'File 2', type: 'doc' },
    { id: 3, name: 'File 3', type: 'txt' }
  ];
  var deletedFiles = [];

  displayFiles(files);

  $('#btnAddNew').click(function() {
    $('#addModal').modal('show');
  });

  $('#btnSave').click(function() {
    var fileName = $('#fileName').val();
    var fileType = $('#fileType').val();
    var newFile = { id: files.length + 1, name: fileName, type: fileType };
    files.push(newFile);
    displayFiles(files);
    $('#addModal').modal('hide');
  });

  $('#searchBtn').click(function() {
    var searchText = $('#searchInput').val().toLowerCase();
    var filteredFiles = files.filter(function(file) {
      return file.name.toLowerCase().includes(searchText);
    });
    displayFiles(filteredFiles);
  });

  $('#showTrashBtn').click(function() {
    displayTrash();
    $('#trashModal').modal('show');
  });

  // Event delegation for delete button click
  $('#fileTable').on('click', '.delete-btn', function() {
    var fileId = $(this).data('id');
    $('#confirmDeleteModal').modal('show');
    $('#confirmDeleteBtn').off('click').on('click', function() {
      var fileToDelete = files.find(function(file) {
        return file.id === fileId;
      });
      deletedFiles.push(fileToDelete);
      files = files.filter(function(file) {
        return file.id !== fileId;
      });
      displayFiles(files);
      $('#confirmDeleteModal').modal('hide');
    });
  });

  // Event delegation for restore button click
  $('#trashTable').on('click', '.restore-btn', function() {
    var fileId = $(this).data('id');
    var fileToRestore = deletedFiles.find(function(file) {
      return file.id === fileId;
    });
    files.push(fileToRestore);
    deletedFiles = deletedFiles.filter(function(file) {
      return file.id !== fileId;
    });
    displayTrash();
    displayFiles(files);
  });

  function displayFiles(filesToDisplay) {
    $('#fileTable tbody').empty();
    filesToDisplay.forEach(function(file) {
      var row = '<tr>' +
                  '<td>' + file.id + '</td>' +
                  '<td>' + file.name + '</td>' +
                  '<td>' + file.type.toUpperCase() + '</td>' +
                  '<td>' +
                    '<button class="btn btn-danger btn-sm delete-btn" data-id="' + file.id + '">Xóa</button>' +
                  '</td>' +
                '</tr>';
      $('#fileTable tbody').append(row);
    });
  }

  function displayTrash() {
    $('#trashTable tbody').empty();
    deletedFiles.forEach(function(file) {
      var row = '<tr>' +
                  '<td>' + file.id + '</td>' +
                  '<td>' + file.name + '</td>' +
                  '<td>' + file.type.toUpperCase() + '</td>' +
                  '<td>' +
                    '<button class="btn btn-success btn-sm restore-btn" data-id="' + file.id + '">Khôi phục</button>' +
                  '</td>' +
                '</tr>';
      $('#trashTable tbody').append(row);
    });
  }
});


</script>
</body>
</html>
