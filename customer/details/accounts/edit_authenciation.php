<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Account</title>

    <?php
    include '../../../import/libary.php';
    include '../../../import/connect.php';
    ?>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center d-flex" href="../../index.php">
                <img src="../../../assets/images/logo/light_theme_logo.png" class="logo">
                <h6>Account Settings</h6>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stationery.php">Statistics</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $sql_user = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];
                        $result_user = sqlsrv_query($conn, $sql_user);
                        $row_user = sqlsrv_fetch_array($result_user, SQLSRV_FETCH_ASSOC);
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="../../../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
                                    class="avatar_navbar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="d-flex p-3">
                                    <img src="../../../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
                                        class="avatar_dropdown">
                                    <div class="acc_content px-3">
                                        <h5><?php echo $row_user['last_name'] . " " . $row_user['middle_name'] . " " . $row_user['first_name'] ?>
                                        </h5>
                                        <p><?php echo $row_user['email'] ?></p>
                                    </div>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="details/settings.php"><i
                                            class="bi bi-gear"></i>Setting</a></li>
                                <li><a class="dropdown-item" href="../login/sign_out.php"><i
                                            class="bi bi-box-arrow-right"></i>Logout</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        header("Location: ../login/login.php");
                        exit();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="mb-2" style="padding-left: 15px;">Account Settings</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action list-group-item-light"><a
                            href="profile.php">Profile information</a></li>
                    <li class="list-group-item list-group-item-action list-group-item-light active_item"><a
                            href="authenciation.php">Authenciation</a></li>
                </ul>
            </div>

            <form class="col-md-9" action="process.php" method="POST">
                <section id="personal-info">
                    <div class="container mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 style="margin-bottom: 0px">Edit authentication</h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-end" type="submit" name="update_auth">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <?php
                        $sql_auth = "SELECT ua.username, ua.password FROM users us
                        INNER JOIN user_roles ur ON us.user_id = ur.user_id
                        INNER JOIN user_accounts ua ON ua.user_role_id = ur.user_role_id
                        WHERE us.user_id = " . $_SESSION['user_id'];

                        $result_auth = sqlsrv_query($conn, $sql_auth);

                        $row_auth = sqlsrv_fetch_array($result_auth, SQLSRV_FETCH_ASSOC);
                        ?>
                        <div class="form">
                            <div class="mt-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="@<?php echo $row_auth['username'] ?>">
                                <small id="usernameError" class="text-danger"></small>
                            </div>
                            <div class="mt-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter new password">
                                <small id="passwordError" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('username').addEventListener('input', function () {
            var username = this.value;
            var usernameError = document.getElementById('usernameError');
            if (username.length < 4) {
                usernameError.textContent = 'Username must be at least 4 characters.';
            } else if (/^[A-Za-z]$/.test(username)) {
                usernameError.textContent = 'Username must contain at least one non-alphabetic character.';
            } else {
                usernameError.textContent = '';
            }
        });

        document.getElementById('password').addEventListener('input', function () {
            var password = this.value;
            var passwordError = document.getElementById('passwordError');
            if (/^[A-Za-z]*$/.test(password)) {
                passwordError.textContent = 'Password must contain at least one non-alphabetic character.';
            } else {
                passwordError.textContent = '';
            }
        });
    </script>

</body>

</html>