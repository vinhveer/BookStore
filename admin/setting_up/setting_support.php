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
        h3,.bxs-chevrons-left{
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
            <li class="active"><a href="setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li ><a href="index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
            <div class="container-fluid mt-3 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <h3><a style="color:black;" href="index.php"><i class='bx bxs-chevrons-left me-3'></i></a>Hỗ
                            trợ kỹ thuật</h3>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
                <hr>
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Đánh giá</th>
                                    <th scope="col">Thời gian</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Người dùng A</td>
                                    <td>nnnnn@ddd</td>
                                    <td>5 sao</td>
                                    <td>2024-04-14 10:00</td>
                                    <td>
                                        <a href="#" class="view-details">xem chi tiết</a>
                                        <button class="btn btn-success float-end" >Gửi phản hồi</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Người dùng B</td>
                                    <td>uuuu@ghgahah</td>
                                    <td>4 sao</td>
                                    <td>2024-04-14 11:30</td>
                                    <td>
                                        <a href="#" class="view-details">xem chi tiết</a>
                                        <button class="btn btn-success float-end" >Gửi phản hồi</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Review Details Form -->
    <div id="reviewDetailsModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết đánh giá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Họ tên khách hàng:</label>
                            <input type="text" class="form-control" id="customerName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="customerEmail" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewRating" class="form-label">Đánh giá:</label>
                            <input type="text" class="form-control" id="reviewRating" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewTime" class="form-label">Thời gian đánh giá:</label>
                            <input type="text" class="form-control" id="reviewTime" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewContent" class="form-label">Nội dung đánh giá:</label>
                            <textarea class="form-control" id="reviewContent" readonly></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Feedback Form -->
<div id="feedbackModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gửi phản hồi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm">
                    <div class="mb-3">
                        <label for="selectedCustomerEmail" class="form-label">Email khách hàng:</label>
                        <input type="email" class="form-control" id="selectedCustomerEmail" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="feedbackSubject" class="form-label">Tiêu đề phản hồi:</label>
                        <input type="text" class="form-control" id="feedbackSubject" required>
                    </div>
                    <div class="mb-3">
                        <label for="feedbackContent" class="form-label">Nội dung phản hồi:</label>
                        <textarea class="form-control" id="feedbackContent" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
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
            const viewDetailLinks = document.querySelectorAll('.view-details');

            viewDetailLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const row = event.target.closest('tr');
                    const customerName = row.cells[1].innerText;
                    const customerEmail = row.cells[2].innerText;
                    const reviewRating = row.cells[3].innerText;
                    const reviewTime = row.cells[4].innerText;
                    const reviewContent = "Nội dung đánh giá của khách hàng";

                    document.getElementById('customerName').value = customerName;
                    document.getElementById('customerEmail').value = customerEmail;
                    document.getElementById('reviewRating').value = reviewRating;
                    document.getElementById('reviewTime').value = reviewTime;
                    document.getElementById('reviewContent').value = reviewContent;

                    $('#reviewDetailsModal').modal('show');
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
    const feedbackButtons = document.querySelectorAll('.btn.btn-success');

    feedbackButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const row = event.target.closest('tr');
            const selectedCustomerEmail = row.cells[2].innerText;

            document.getElementById('selectedCustomerEmail').value = selectedCustomerEmail;
            $('#feedbackModal').modal('show');
        });
    });

    // Xử lý gửi form phản hồi
    $('#feedbackForm').submit(function (event) {
        event.preventDefault();

        // Lấy dữ liệu từ form
        const selectedCustomerEmail = $('#selectedCustomerEmail').val();
        const feedbackSubject = $('#feedbackSubject').val();
        const feedbackContent = $('#feedbackContent').val();

        // Đoạn này bạn có thể thực hiện các thao tác gửi phản hồi, ví dụ gửi thông qua AJAX

        // Sau khi gửi xong, có thể đóng modal feedback
        $('#feedbackModal').modal('hide');

        // Clear form sau khi gửi
        $('#feedbackForm')[0].reset();
    });
});

    </script>

</body>

</html>


</html>
