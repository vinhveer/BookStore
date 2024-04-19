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

    <link rel="stylesheet" href="css/profile.css">
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="mb-2" style="padding-left: 15px;">Account Settings</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action list-group-item-light active_item"><a
                                href="profile.php">Profile information</a></li>
                        <li class="list-group-item list-group-item-action list-group-item-light"><a
                                href="authenciation.php">Authenciation</a></li>
                    </ul>
                </div>

                <div class="col-md-9">
                    <section id="personal-info">
                        <div class="container mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 style="margin-bottom: 0px">Edit profile information</h4>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary float-end">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row header">
                                <div class="col-md-2">
                                    <img src="../../../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
                                        class="avatar_header">
                                </div>
                                <div class="col-md-10">
                                    <h3><?php echo $row_user['last_name'] . " " . $row_user['middle_name'] . " " . $row_user['first_name'] ?>
                                    </h3>
                                    <p><?php echo $row_user['email'] ?></p>
                                </div>
                                <div class="mt-5">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action list-group-item-light">
                                            <div class="d-flex align-items-center">
                                                <strong style="margin-right: 90px">Gender</strong>
                                                <p style="margin-bottom: 0px">
                                                    <?php echo $row_user['gender'] == 1 ? "Female" : "Male" ?></p>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action list-group-item-light">
                                            <div class="d-flex align-items-center">
                                                <strong style="margin-right: 43px">Date Of Birth</strong>
                                                <p style="margin-bottom: 0px">
                                                    <?php echo date_format($row_user['date_of_birth'], 'd/m/Y') ?>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action list-group-item-light">
                                            <div class="d-flex align-items-center">
                                                <strong style="margin-right: 85px">Address</strong>
                                                <p style="margin-bottom: 0px"><?php echo $row_user['address'] ?></p>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action list-group-item-light">
                                            <div class="d-flex align-items-center">
                                                <strong style="margin-right: 98px">Phone</strong>
                                                <p style="margin-bottom: 0px"><?php echo $row_user['phone'] ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        <?php
        } else {
            header("Location: ../login/login.php");
            exit();
        }
        ?>
</body>

</html>