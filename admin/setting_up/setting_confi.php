<?php
    include_once '../../import/connect.php';
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
    <title>Amazon Warehouse</title>
    <style>
        .action-buttons .btn.btn-info,.btn.btn-primary{
            display: flex;
            align-items: center;
        }
        h3{
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
            <a href="../dashboard/new.php" class="notif">
                <i class='bx bx-bell'></i>
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>
        <main>
            <div class="container mt-3 mb-3">
                <h3><a style="color:black;" href="index.php"><i class='bx bxs-cog me-3' ></i></i></a>System Administration</h3>
                <div class="row mb-3">
                    <div class="text-right">
                        <a  href ="../account/account_group_add.php?role_id=2" class="btn btn-primary float-end"><i class='bx bx-plus-circle bx-sm' ></i>Add new account</a>
                    </div>
                </div>
                <?php
                    $sql_account_admin = "SELECT
                    CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
                    u.email,
                    ua.password,
                    r.role_id,
                    ua.username,
                    u.user_id
                FROM
                    users u
                INNER JOIN
                    user_roles ur ON u.user_id = ur.user_id
                INNER JOIN
                    roles r ON ur.role_id = r.role_id
                INNER JOIN
                    user_accounts ua on ua.user_role_id = ur.user_role_id
                WHERE r.role_id=2;";
                    $result_account_admin = sqlsrv_query($conn, $sql_account_admin);
                ?>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Account Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row_account_admin = sqlsrv_fetch_array($result_account_admin)) {?>
                                    <tr>
                                        <td scope="row"><?php $i++; echo $i ?></td>
                                        <td><?php echo $row_account_admin['full_name'] ?></td>
                                        <td><?php echo $row_account_admin['username'] ?></td>
                                        <td><?php echo $row_account_admin['email'] ?></td>
                                        <td><?php echo $row_account_admin['password'] ?></td>
                                        <td>
                                            <a href="../account/account_user_edit.php?user_id=<?php echo $row_account_admin['user_id']; ?>&edit=3" class="btn btn-sm btn-warning"><i class='bx bx-edit bx-sm'></i>Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger me-2" data-postid="<?php echo $row_account_admin['user_id']; ?>&delete=2" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class='bx bx-sm bx-trash me-1'></i>Delete</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn.btn-sm.btn-danger.me-2');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-postid');
                    const form = document.querySelector('#deletePostForm');
                    form.action = `../account/process.php?user_id=${userId}`;
                });
            });
        });
    </script>
</body>
</html>
