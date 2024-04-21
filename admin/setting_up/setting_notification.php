<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Home Admin</title>
    <style>
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3,hr,.bxs-chevrons-left{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>&nbspBookstore</div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>
        <main>
        <div class="container-fluid">
                <div class="row">
                        <div class="col-md-6">
                            <h3><a style="color:black;" href="index.php"><i class='bx bxs-chevrons-left me-3' ></i></a>Thông báo</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-success float-end" >Thêm thông báo</button>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Thông báo mới nhất</h6>
                            <p class="card-text">Xem danh sách các thông báo mới nhất từ hệ thống.</p>
                            <div class="list-group">
                                <a href="" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 1</h5>
                                        <small>3 ngày trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 1.</p>
                                </a>
                                <a href="" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 2</h5>
                                        <small>5 ngày trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 2.</p>
                                </a>
                                <a href="" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Thông báo 3</h5>
                                        <small>1 tuần trước</small>
                                        <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                                    </div>
                                    <p class="mb-1">Đây là nội dung của thông báo 3.</p>
                                </a>
                            </div>
                        </div>
            </div>
        </div>
        </main>
        </div>
    <!-- Notification Information Form -->
<div id="notificationInfoModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="notificationInfoForm">
                    <div class="mb-3">
                        <label for="notificationTitle" class="form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="notificationTitle" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="notificationContent" class="form-label">Nội dung:</label>
                        <textarea class="form-control" id="notificationContent" readonly></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" id="editNotificationBtn">Sửa</button>
                    <button type="button" class="btn btn-danger" id="deleteNotificationBtn">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Form -->
<div id="deleteConfirmationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa thông báo này?</p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Notification Form -->
<div id="editNotificationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editNotificationForm">
                    <div class="mb-3">
                        <label for="editNotificationTitle" class="form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="editNotificationTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNotificationContent" class="form-label">Nội dung:</label>
                        <textarea class="form-control" id="editNotificationContent" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Notification Form -->
<div id="addNotificationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm thông báo mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNotificationForm">
                    <div class="mb-3">
                        <label for="newNotificationTitle" class="form-label">Tiêu đề:</label>
                        <input type="text" class="form-control" id="newNotificationTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="newNotificationContent" class="form-label">Nội dung:</label>
                        <textarea class="form-control" id="newNotificationContent" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const notificationLinks = document.querySelectorAll('.list-group-item-action');

    notificationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const notificationTitle = link.querySelector('h5').textContent;
            const notificationContent = link.querySelector('p').textContent;

            document.getElementById('notificationTitle').value = notificationTitle;
            document.getElementById('notificationContent').value = notificationContent;
            $('#notificationInfoModal').modal('show');
        });
    });

    // Xử lý sự kiện khi nhấn nút xóa
    document.getElementById('deleteNotificationBtn').addEventListener('click', function () {
        $('#notificationInfoModal').modal('hide');
        $('#deleteConfirmationModal').modal('show');
    });

    // Xác nhận xóa thông báo
    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        // Thực hiện xóa thông báo ở đây

        // Sau khi xóa, đóng modal xác nhận xóa
        $('#deleteConfirmationModal').modal('hide');
    });

    // Xử lý sự kiện khi nhấn nút sửa
    document.getElementById('editNotificationBtn').addEventListener('click', function () {
        // Hiển thị form sửa thông báo ở đây (nếu cần)
    });

});
document.addEventListener("DOMContentLoaded", function () {
    // Xử lý sự kiện khi click vào nút "Sửa"
    document.getElementById('editNotificationBtn').addEventListener('click', function () {
        const notificationTitle = document.getElementById('notificationTitle').value;
        const notificationContent = document.getElementById('notificationContent').value;

        document.getElementById('editNotificationTitle').value = notificationTitle;
        document.getElementById('editNotificationContent').value = notificationContent;

        $('#notificationInfoModal').modal('hide');
        $('#editNotificationModal').modal('show');
    });

    // Xử lý submit form sửa thông báo
    document.getElementById('editNotificationForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Lấy dữ liệu từ form
        const editedNotificationTitle = document.getElementById('editNotificationTitle').value;
        const editedNotificationContent = document.getElementById('editNotificationContent').value;

        // Thực hiện các thao tác cập nhật thông báo ở đây

        // Đóng modal sau khi cập nhật
        $('#editNotificationModal').modal('hide');
    });
});
// Xử lý sự kiện khi click vào nút "Thêm thông báo"
document.querySelector('.btn-success').addEventListener('click', function () {
    $('#addNotificationModal').modal('show');
});

// Xử lý submit form thêm thông báo
document.getElementById('addNotificationForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Lấy dữ liệu từ form
    const newNotificationTitle = document.getElementById('newNotificationTitle').value;
    const newNotificationContent = document.getElementById('newNotificationContent').value;

    // Thực hiện các thao tác thêm thông báo ở đây

    // Đóng modal sau khi thêm
    $('#addNotificationModal').modal('hide');
});

</script>
</body>

</html>
