<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../../import/libary.php'; ?>
    <?php include '../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/explore_category.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center" href="index.php">
                <img src="../../assets/images/logo/light_theme_logo.png" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../stationery/stationery.php">Stationery</a>
                    </li>
                </ul>
                <form class="d-flex me-auto search align-items-center" role="search">
                    <input class="form-control border-secondary rounded-start-pill" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-secondary rounded-end-pill" type="submit"><i
                            class="bi bi-search"></i></button>
                </form>

                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active btn mx-2" aria-current="page" href="cart.php">
                            <i class="bi bi-cart-dash"></i>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="../../assets/images/avatar/avatar1.png" alt="" srcset="" class="avatar_navbar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="d-flex p-3">
                                <img src="../../assets/images/avatar/avatar1.png" alt="" srcset=""
                                    class="avatar_dropdown">
                                <div class="acc_content px-3">
                                    <h5>Trần Thanh Trí</h5>
                                    <p>tritt13579@gmail.com</p>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="../details/settings.php"><i
                                        class="bi bi-gear"></i>Setting</a></li>
                            <li><a class="dropdown-item" href="../../login/sign_out.php"><i
                                        class="bi bi-box-arrow-right"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $sql_category = "SELECT book_category_name FROM book_categories WHERE book_category_id = " . $_GET['category_id'];
    $result_category = sqlsrv_query($conn, $sql_category);
    $row_category = sqlsrv_fetch_array($result_category, SQLSRV_FETCH_ASSOC);
    ?>

    <div class="container heading">
        <h2><?php echo $row_category['book_category_name'] ?></h2>
    </div>

    <?php
    $sql_item_book = "SELECT bo.book_name, bo.book_publication_year, pr.product_price, pr.product_image, au.author_name 
    FROM books bo
    INNER JOIN products pr ON bo.product_id = pr.product_id
    INNER JOIN book_author ba ON bo.product_id = ba.product_id
    INNER JOIN author au ON au.author_id = ba.author_id
    WHERE book_category_id = " . $_GET['category_id'];
    $result_item_book = sqlsrv_query($conn, $sql_item_book);
    ?>
    <div class="container mt-4">
        <div class="row">
            <?php
            while ($row_book = sqlsrv_fetch_array($result_item_book)) {
                ?>
                <div class="col-md-2">
                    <div class="card mt-3" style="height: 500px">
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

                            <a href="#" class="btn btn-success">Buy now</a>
                            <a href="#" class="btn btn-danger float-end"><i class="bi bi-cart-dash"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

</body>

</html>