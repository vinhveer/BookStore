<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php
    include '../import/libary.php';
    include '../import/connect.php';
    ?>

    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center d-flex" href="index.php">
                <img src="..\assets\images\logo\light_theme_logo.png" class="logo">
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
                        <a class="nav-link" href="statione  ry.php">Stationery</a>
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
                                <img src="../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
                                    class="avatar_navbar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="d-flex p-3">
                                    <img src="../../<?php echo $row_user['image_user'] ?>" alt="" srcset=""
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

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="section-title">Cart</h3>
            </div>
        </div>
    </div>

    <form action="process.php" method="post">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-6">
                    <p>Tick chọn các mặt hàng để mua và thanh toán</p>
                </div>
                <div class="col-md-6">
                    <div class="form-check float-end">
                        <input class="form-check-input" type="checkbox" id="select-all">
                        <label class="form-check-label" for="select-all">Select All</label>
                        <span class="checkmark"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="sum_product">0đ - 0 Product</p>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary btn-purchase" name="buy_now"><i
                            class="bi bi-cart-fill me-2"></i>Mua ngay</button>
                    <a href="index.php" class="btn btn-danger"><i class="bi bi-cart-fill me-2"></i>Xóa khỏi giỏ hàng
                        (2)</a>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <h4>Book</h4>
        </div>
        <div class="container mt-2">
            <?php
            $sql = "SELECT pr.product_id ,bo.book_name, bo.book_publication_year, pr.product_price, pr.product_image, au.author_name 
            FROM books bo
            INNER JOIN products pr ON bo.product_id = pr.product_id
            INNER JOIN carts ca ON ca.product_id = bo.product_id
            INNER JOIN book_author ba ON bo.product_id = ba.product_id
            INNER JOIN author au ON au.author_id = ba.author_id
            WHERE user_id = " . $_SESSION['user_id'];

            $result_book = sqlsrv_query($conn, $sql);
            ?>
            <div class="row">
                <?php
                $index = 0;
                while ($row_book = sqlsrv_fetch_array($result_book, SQLSRV_FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-2">
                        <div class="card">
                            <img src="<?php echo $row_book['product_image']; ?>" class="card-img-top-book"
                                alt="<?php echo $row_book['book_name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                                    $title = $row_book['book_name'];
                                    if (strlen($title) > 40) {
                                        $title = substr($title, 0, 35) . "...";
                                    }
                                    echo $title;
                                    ?>
                                </h5>
                            </div>
                            <div class="card-footer">
                                <div class="card-text">
                                    <p class="author"><?php echo $row_book['author_name']; ?></p>
                                    <p class="year"><?php echo $row_book['book_publication_year']; ?></p>
                                </div>
                                <p class="card-text">
                                    <strong>
                                        <?php echo $row_book['product_price']; ?>đ
                                    </strong>
                                </p>
                                <?php $index++; ?>
                                <div class="form-check-product">
                                    <input class="form-check-input" type="checkbox" id="choose-product<?php echo $index; ?>" name="books[]" value="<?php echo $row_book['product_id']; ?>">
                                    <label class="form-check-label" for="choose-product<?php echo $index; ?>">Chọn mua</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="container mt-4">
            <h5>Stationery</h5>
        </div>
        <div class="container mt-2">
            <p>Bạn chưa thêm vào giỏ hàng vật phẩm học tập nào</p>
        </div>
    </form>
    <?php include "footer.php" ?>
</body>

</html>