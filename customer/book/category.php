<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../../import/libary.php'; ?>
    <?php include '../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/category.css">
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

    <div class="container mb-2">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="#">Recommends</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#" style="background-color: #24292e; color: white;">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Prominent authors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">In recent years</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Language</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Publisher</a>
            </li>
        </ul>
    </div>

    <div class="container-fluid heading">
        <h1>Category</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos libero culpa, id explicabo sunt, accusantium
            atque tenetur nulla neque odio distinctio iusto optio laudantium ipsam. Ipsam reprehenderit iste similique
            excepturi?</p>
    </div>

    <?php
    $sql = "SELECT * FROM book_categories;";
    $result = sqlsrv_query($conn, $sql);
    ?>

    <div class="container">
        <div class="row">
            <?php
            while ($row = sqlsrv_fetch_array($result)) {
                $sql_book = "SELECT COUNT(*) FROM books WHERE book_category_id = " . $row['book_category_id'] . ";";
                $result_book = sqlsrv_query($conn, $sql_book);
                $row_book = sqlsrv_fetch_array($result_book);
            ?>
            <div class="col-md-3">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['book_category_name']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo $row_book[0]; ?> books
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="explore_category.php?category_id=<?php echo $row['book_category_id'] ?>" class="btn btn-primary">Explore</a>
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