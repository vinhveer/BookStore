<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <?php include '../../../import/libary.php'; ?>
    <?php include '../../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/details.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center d-flex" href="index.php">
                <img src="..\..\..\assets\images\logo\light_theme_logo.png" class="logo">
                <h6> <i class="bi bi-cart-dash"></i> Cart</h6>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stationery.php">Stationery</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        ?>
                        <li class="nav-item me-3">
                            <form class="d-flex me-5 search align-items-center" role="search">
                                <input class="form-control border-secondary rounded-start-pill" type="search"
                                    placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-secondary rounded-end-pill" type="submit"><i
                                        class="bi bi-search"></i></button>
                            </form>
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
                        header("Location: ../../login/sign_in.php");
                        exit();
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h6 class="head_order">Thông tin đơn hàng</h6>
                <div class="content_order">
                        <div class="card mt-2">
                            <div class="row">
                                <div class="col-md-2"
                                    style="background-image: url(..\..\..\..\assets\images\cover_book\image.png); background-size: cover; height: 100px;">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text">
                                            Book
                                        </p>
                                        <h5 class="card-title">Book name</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <p class="price_section">20000đ</p>
                                        <p>1 Product</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="head_order">Thông tin thanh toán</h6>
                <div class="total">
                    <h2>200000đ</h2>
                </div>
                <div class="pay_type">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="cash" name="payment" value="cash">
                        <label class="form-check-label" for="cash">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="transfer" name="payment" value="transfer">
                        <label class="form-check-label" for="transfer">Thông qua thẻ hoặc ví điện tử</label>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                    <a href="../index.php" class="btn btn-secondary">Hủy đơn</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>