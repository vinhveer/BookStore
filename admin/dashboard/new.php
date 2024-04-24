<?php
    include_once '../../import/connect.php';
    $sql_notification = "SELECT  notif_id,
    notif_title,
    notif_content,
    notif_date FROM notiffication ORDER BY notif_date DESC ";
    $result_notification = sqlsrv_query($conn,$sql_notification);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Amazon Bookstore</title>
    <style>
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3,.form-label{
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
            <li class="active"><a href="index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="../setting_up/index.php"><i class='bx bx-cog'></i>Settings</a></li>
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
            <a href="new.php" class="notif">
                <i class='bx bx-bell'></i>
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="container">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>System Notifications</h3>
            </div>
        </div>
    </div>
    <div class="row">
            <?php
            $count = 0; // Count the number of notifications
            while ($row = sqlsrv_fetch_array($result_notification)) {
                // Start a new row after displaying 3 notifications
                if ($count % 3 == 0 && $count != 0) {
                    echo '</div><div class="row">';
                }
            ?>
                <div class="col-md-4"> <!-- Use col-md-4 to display 3 notifications per row -->
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['notif_title']; ?></h5>
                            <button class="btn btn-primary view-more-btn" data-title="<?php echo $row['notif_title']; ?>"
                                data-content="<?php echo $row['notif_content']; ?>">View More</button>
                        </div>
                    </div>
                </div>
            <?php
                $count++; // Increase the count after displaying each notification
            }
            ?>
        </div>
    </div>
    </div>
    </main>
    </div>
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 id="notificationTitle"></h5>
                <p id="notificationContent"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        $('.view-more-btn').click(function () {
            var title = $(this).data('title');
            var content = $(this).data('content');
            $('#notificationTitle').text(title);
            $('#notificationContent').text(content);
            $('#notificationModal').modal('show');
        });
    });
</script>
</body>
</html>
