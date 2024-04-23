<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php
    include '../../import/libary.php';
    include '../../import/connect.php';
    ?>

    <link rel="stylesheet" href="css/book.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center" href="index.php">
                <img src="..\..\..\assets\images\logo\light_theme_logo.png" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book/book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stationery/stationery.php">Stationery</a>
                    </li>
                </ul>
                <form class="d-flex me-auto search align-items-center" role="search">
                    <input class="form-control border-secondary rounded-start-pill" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-secondary rounded-end-pill" type="submit"><i
                            class="bi bi-search"></i></button>
                </form>


                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active btn mx-2" aria-current="page" href="cart.php">
                                <i class="bi bi-basket"></i>
                                Cart
                            </a>
                        </li>

                        <?php
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
                                        <h5>
                                            <?php echo $row_user['last_name'] . " " . $row_user['middle_name'] . " " . $row_user['first_name'] ?>
                                        </h5>
                                        <p><?php echo $row_user['email'] ?></p>
                                    </div>
                                </li>
                                <li><a class="dropdown-item" href="details/accounts/profile.php"><i
                                            class="bi bi-gear"></i>Setting</a>
                                </li>
                                <li><a class="dropdown-item" href="../../login/sign_out.php"><i
                                            class="bi bi-box-arrow-right"></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item d-flex">
                            <a class="nav-link btn btn-outline-light me-2" aria-current="page"
                                href="../../login/sign_in.php">Login</a>
                            <a class="nav-link btn btn-warning" aria-current="page"
                                href="../../login/register.php">Register</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['list_item_id'])) {
        $sql_items = "SELECT * FROM list_item WHERE id = " . $_GET['list_item_id'];
    }
    $result_items = sqlsrv_query($conn, $sql_items);

    while ($row = sqlsrv_fetch_array($result_items, SQLSRV_FETCH_ASSOC)) {
        if ($row['type_item'] == 'b') {
            include "feature_book.php";
        } else {
            include "feature_stationery.php";
        }
    }
    ?>

</body>

</html>