<?php
    include_once '../../import/connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $sql_account ="SearchUsers N'$keyword'";
        $result_account = sqlsrv_query($conn, $sql_account);
    } else {
        $recordsPerPage = 8;
        $sql_count = "SELECT COUNT(*) AS total_records FROM users";
        $result_count = sqlsrv_query($conn, $sql_count);
        $row_count = sqlsrv_fetch_array($result_count);
        $totalRecords = $row_count['total_records'];
        $totalPages = ceil($totalRecords / $recordsPerPage);
        if (!isset($_GET['page'])) {
            $currentPage = 1;
        } else {
            $currentPage = $_GET['page'];
        }
        $sql_account = "EXEC GetUserInformation_no $currentPage";
        $result_account = sqlsrv_query($conn, $sql_account);
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
    <link rel="stylesheet" href="style.css">
    <title>Home Admin</title>
    <style>
        .action-buttons .btn-info,.action-buttons .btn-warning,.action-buttons .btn-danger,.btn.btn-primary  {
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }

    </style>
</head>

<body >
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span></span>&nbspAdmin</div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-group'></i>Users</a></li>
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

    <div class="content">
        <nav class="fixed-nav">
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
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="header ms-3">
                <div class="left">
                    <h1>Account</h1>
                </div>
            </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form class="d-flex" action="index.php" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" value="">
                    <button class="btn btn-outline-primary" type="submit" name="search" value="find">Search</button>
                    </form>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) { ?>
                    <div class="row mt-3">
                        <div class="col">
                            <?php
                            $keyword = $_POST['keyword'];
                            echo "<p>Search keyword: '<strong>$keyword</strong>'</p>";
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-8 text-right">
                    <a href="account_add.php" class="btn btn-primary float-end"><i class='bx bxs-user-plus' ></i>Add New Account</a>
                    <a href="account_group.php" class="btn btn-primary float-end me-2"><i class='bx bxs-user-detail' ></i>Account Groups</a>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2" >
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" >
                        <thead >
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                while ($row_account = sqlsrv_fetch_array($result_account)) {?>
                                <tr>
                                    <td scope="row"><?php $i++; echo $i ?></td>
                                    <td><?php echo $row_account['full_name'] ?></td>
                                    <td><?php echo $row_account['username'] ?></td>
                                    <td><?php echo $row_account['email'] ?></td>
                                    <td><?php echo $row_account['role_name'] ?></td>
                                    <td>
                                        <div class="action-buttons d-flex justify-content-start">
                                            <a href="account_user_edit.php?user_id=<?php echo $row_account['user_id'];?>&edit=0" class="btn btn-sm btn-warning me-1"><i class='bx bx-sm bx-edit-alt me-1'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger float-end me-2" data-postid="<?php echo $row_account['user_id']; ?>&delete=0" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
                                            <a href="show.php?user_id=<?php echo $row_account['user_id']; ?>&role_id=<?php echo $row_account['role_id'];?>&show=0" class="btn btn-info">
                                            <i class='bx bx-sm bx-show-alt me-1'></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <div class="pagination">
                                    <?php
                                    if ($totalPages > 1) {
                                        // Display first page link
                                        echo '<a href="index.php?page=1">1</a>';
                                        // If current page is greater than 3, display ... at the beginning
                                        if ($currentPage > 3) {
                                            echo '<span>...</span>';
                                        }

                                        // Display middle pages
                                        for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                            echo "<a href='index.php?page=$i'>$i</a>";
                                        }

                                        // If current page is the last or near the last page, do not display ... at the end
                                        if ($currentPage < $totalPages - 2) {
                                            echo '<span>...</span>';
                                        }

                                        // Display last page link
                                        echo "<a href='index.php?page=$totalPages'>$totalPages</a>";
                                    }
                                    ?>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirm Account Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deletePostForm" action="" method="post">
                        <button type="submit" class="btn btn-danger" name="delete_user">Delete</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn.btn-sm.btn-danger.float-end.me-2');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-postid');
                    const form = document.querySelector('#deletePostForm');
                    form.action = `process.php?user_id=${userId}`;
                });
            });
        });
    </script>
</script>
</body>
</html>
