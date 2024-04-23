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
                
                <form class="col-md-9" action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="container mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 style="margin-bottom: 0px">Edit profile information</h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-end" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row header">
                            <div class="col-md-2">
                                <img src="../../../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
                                    class="avatar_header" style="width: 100px">
                            </div>
                            <div class="col-md-10">
                                <h5>Upload your avatar if you need change</h5>
                                <input type="file" name="avatar_image" class="form-control">
                            </div>
                            <div class="mt-5 mb-5">
                                <form action="" class="form-control">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first_name" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="<?php echo $row_user['first_name'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="last_name" class="form-label">Middle name</label>
                                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                                value="<?php echo $row_user['middle_name'] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="last_name" class="form-label">Last name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="<?php echo $row_user['last_name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo $row_user['email'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="<?php echo $row_user['phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob"
                                                value="<?php echo $row_user['date_of_birth']->format('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="1" <?php if ($row_user['gender'] == 'male')
                                                    echo 'selected'; ?>>Male</option>
                                                <option value="2" <?php if ($row_user['gender'] == 'female')
                                                    echo 'selected'; ?>>Female</option>
                                                <option value="3" <?php if ($row_user['gender'] == 'other')
                                                    echo 'selected'; ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control"
                                                id="address" name="address"><?php echo $row_user['address'] ?></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
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