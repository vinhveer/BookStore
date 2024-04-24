<?php
    include_once '../../import/connect.php';
    $sql_support="SELECT
    CASE
        WHEN LEN(u.middle_name) > 0 THEN CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
        ELSE CONCAT(u.last_name, ' ', u.first_name)
    END AS full_name,
        u.email, si.title_support, si.content_support, si.created_at,si.support_id,u.user_id
    FROM
        support_info si
    INNER JOIN
        support_users su ON si.support_id = su.support_id
    INNER JOIN
        users u ON su.user_id = u.user_id
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    WHERE  ur.role_id <> 2;
";
    $result_support = sqlsrv_query($conn,$sql_support);

    $sql_feedback_ids = "SELECT support_id FROM feedback";
    $result_feedback_ids = sqlsrv_query($conn, $sql_feedback_ids);
    $feedback_ids = array();
    while ($row = sqlsrv_fetch_array($result_feedback_ids)) {
        $feedback_ids[] = $row['support_id'];
}

?>
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
        h3,.bxs-chevrons-left,.bxs-cog{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span></span>&nbspAdmin</div>
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
            <a href="../dashboard/new.php" class="notif">
                <i class='bx bx-bell'></i>
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>
        <main>


            <div class="header">
                <div class="left ms-4">
                    <h1><a style="color:black;" href="index.php"><i class='bx bxs-cog me-3' ></i></a>Support</h1>
                </div>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Time</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                while ($row_support = sqlsrv_fetch_array($result_support)) {?>
                                    <tr>
                                        <div>
                                            <td><?php $i++; echo $i; ?></td>
                                            <td>KH00<?php echo $row_support['user_id'] ?></td>
                                            <td><?php echo $row_support['full_name']; ?></td>
                                            <?php $created = $row_support['created_at'];
                                                $formatted_created = $created->format('Y-m-d H:i:s');?>
                                            <td><?php echo $row_support['email'] ?></td>
                                            <td><?php echo $formatted_created; ?></td>
                                            <td>
                                                <div class="d-flex row">
                                                    <div class = "col-md-6">
                                                        <a href="#" class="view-details"
                                                               data-title="<?php echo $row_support['title_support']; ?>"
                                                               data-content="<?php echo $row_support['content_support']; ?>">View Details</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php
                                                        // Kiểm tra xem support_id có trong danh sách feedback_ids hay không
                                                        if (in_array($row_support['support_id'], $feedback_ids)) { ?>
                                                           <form action="process.php" method="post">
                                                            <button type="submit" class="btn btn-danger float-end" name="btn_feed">Feedback Sent</button>
                                                            <input type="hidden" name="support_id" value="<?php echo $row_support['support_id'];?>">
                                                        </form>
                                                        <?php } else {
                                                        ?>
                                                            <button class="btn btn-success float-end" data-support-id="<?php echo $row_support['support_id']; ?>">Send Feedback</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                <?php } ?>

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
                    <h5 class="modal-title">Comment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="customerID" class="form-label">Customer ID:</label>
                            <input type="text" class="form-control" id="customerID" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name:</label>
                            <input type="text" class="form-control" id="customerName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="customerEmail" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewTime" class="form-label">Review Time:</label>
                            <input type="text" class="form-control" id="reviewTime" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewTittle" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="reviewTittle" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reviewContent" class="form-label">Content:</label>
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
                <h5 class="modal-title">Send Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="feedbackForm" action="process.php" method="post">
                    <div class="mb-3">
                        <label for="selectedCustomerEmail" class="form-label">Customer Email:</label>
                        <input type="email" class="form-control" id="selectedCustomerEmail" readonly>
                        <input type="hidden" id="supportId" name="supportId">
                    </div>
                    <div class="mb-3">
                        <label for="feedbackSubject" class="form-label">Feedback Subject:</label>
                        <input type="text" class="form-control" id="feedbackSubject" name="Tilte_feedback" required>
                    </div>
                    <div class="mb-3">
                        <label for="feedbackContent" class="form-label">Feedback Content:</label>
                        <textarea class="form-control" id="feedbackContent" name="Content_feedback" required></textarea >
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_send">Sebd</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <?php
    if(isset($_GET['support_id'])){
     $support_id = $_GET['support_id'];
    $sql_feedback_info = "SELECT * FROM feedback WHERE support_id = $support_id";
    $stmt_feedback_info = sqlsrv_query($conn,$sql_feedback_info);
    $row_feedback_info = sqlsrv_fetch_array($stmt_feedback_info, SQLSRV_FETCH_ASSOC);

?>-->
<div id="feedbackInfoModal" class="modal fade" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Feedback Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="feedbackTitle" class="form-label">Feedback Title:</label>
                    <input type="text" class="form-control" id="feedbackTitle" value="<?php echo $row_feedback_info['title_feedback']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="feedbackContent" class="form-label">Feedback Content:</label>
                    <textarea class="form-control" id="feedbackContent" readonly><?php echo $row_feedback_info['content_feedback']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="feedbackDateTime" class="form-label">Feedback Time:</label>
                    <input type="text" class="form-control" id="feedbackDateTime" value="<?php echo $row_feedback_info['date_time_feedback']; ?>" readonly>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- <?php }?> -->
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
                const customerID = row.cells[1].innerText;
                const customerName = row.cells[2].innerText;
                const customerEmail = row.cells[3].innerText;
                const reviewTime = row.cells[4].innerText;
                const reviewTittle = event.target.getAttribute('data-title');
                const reviewContent = event.target.getAttribute('data-content');

                document.getElementById('customerID').value = customerID;
                document.getElementById('customerName').value = customerName;
                document.getElementById('customerEmail').value = customerEmail;
                document.getElementById('reviewTime').value = reviewTime;
                document.getElementById('reviewTittle').value = reviewTittle;
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
            const supportId = button.getAttribute('data-support-id');
            const selectedCustomerEmail = button.closest('tr').cells[3].innerText;

            document.getElementById('selectedCustomerEmail').value = selectedCustomerEmail;
            document.getElementById('supportId').value = supportId; // Thêm dòng này để gửi support_id vào form
            $('#feedbackModal').modal('show');
        });
        });
    });
    $('#feedbackModal').on('hidden.bs.modal', function () {
        document.getElementById('feedbackForm').reset(); // Reset form
    });

document.addEventListener("DOMContentLoaded", function () {
    const feedbackButtons = document.querySelectorAll('.btn.btn-danger');

    feedbackButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const supportId = button.closest('tr').querySelector('[name="support_id"]').value;

            // Chuyển hướng qua process.php để xử lý dữ liệu
            window.location.href = `process.php?support_id=${supportId}`;
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const supportId = urlParams.get('support_id');

    if (supportId) {
        $('#feedbackInfoModal').modal('show');
    }
});

    </script>

</body>

</html>


</html>
