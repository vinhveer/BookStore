<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../import/libary.php'; ?>

    <style>
    a {
        text-decoration: none;
        color: black;
    }

    .logo {
        width: 80px;
    }

    .nav-link i {
        font-size: 20px;
    }

    .search {
        width: 35%;
        height: 35px;
    }

    .avatar_navbar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .avatar_dropdown {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .dropdown-menu {
        width: 350px;
    }

    .active {
        font-weight: bold;
    }

    body {
        margin-top: 90px;
    }

    .dropdown-item i {
        padding-right: 8px;
    }

    .scroll {
        overflow-x: auto;
        /* Hoặc overflow-x: scroll; */
        white-space: nowrap;
        /* Ngăn chặn các phần tử bên trong container xuống dòng */
    }

    .card-img {
        width: 100%;
        height: 100%;
        object-fix: cover;
        border-bottom-right-radius: 0;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center" href="index.php">
                <img src="..\assets\images\logo\light_theme_logo.png" class="logo">
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
                        <a class="nav-link" href="book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stationery.php">Stationery</a>
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
                        <a class="nav-link active btn mx-2" aria-current="page" href="#">
                            <i class="bi bi-cart-dash"></i>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="..\assets\images\avatar\avatar1.png" alt="" srcset="" class="avatar_navbar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="d-flex p-3">
                                <img src="..\assets\images\avatar\avatar1.png" alt="" srcset="" class="avatar_dropdown">
                                <div class="acc_content px-3">
                                    <h5>Trần Thanh Trí</h5>
                                    <p>tritt13579@gmail.com</p>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i>Setting</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleAutoplaying" class="carousel slide container mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..\assets\images\slide\image.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..\assets\images\slide\image copy.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <h4 style="margin-bottom: 0">New book</h4>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn float-end" style="background-color: #ffe100;">See more</a>
            </div>
        </div>
    </div>

    <?php
    include '../import/connect.php';

    $sql = "SELECT TOP 5 bo.product_id, bo.book_name, pr.product_image, pr.product_price FROM books bo
    INNER JOIN products pr ON pr.product_id = bo.product_id;";

    $result = sqlsrv_query($conn, $sql);
    ?>

    <div class="container mt-4 d-flex">
        <?php
        while ($row = sqlsrv_fetch_array($result))
        {
        ?>
        <div class="card me-2" style="width: 18rem;">
            <img src="<?php echo $row['product_image'] ?>" class="card-img-top" alt="..." style="max-height: 250px">
            <div class="card-body">
                <h6 class="card-title">
                    <?php 
                        $book_name = $row['book_name'];
                        if(strlen($book_name) > 50) {
                            echo substr($book_name, 0, 50) . '...';
                        } else {
                            echo $book_name;
                        }
                    ?>
                </h6>
            </div>
            <div class="card-footer">
                <p class="card-text"> <?php echo $row['product_price'] ?></p>
                <a href="#" class="btn btn-success">Buy now</a>
                <a href="#" class="btn btn-danger float-end"><i class="bi bi-cart-dash"></i></a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
        <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/"
                        aria-label="Amazon">
                        <img src="..\assets\images\logo\light_theme_logo.png" alt="" srcset="" class="logo">
                    </a>
                    <ul class="list-unstyled small">
                        <li class="mb-2">

                        </li>
                        <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE"
                                target="_blank" rel="license noopener">MIT</a>, docs <a
                                href="https://creativecommons.org/licenses/by/3.0/" target="_blank"
                                rel="license noopener">CC BY 3.0</a>.</li>
                        <li class="mb-2">Currently v5.3.3.</li>
                    </ul>
                </div>
                <div class="col-8 col-lg-3 offset-lg-1 mb-3">
                    <h5>Product Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Home</a></li>
                        
                    </ul>
                </div>
                <div class="col-8 col-lg-3 mb-3">
                    <h5>Site Maps</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
                        
                    </ul>
                </div>
                <div class="col-8 col-lg-2 mb-3">
                    <h5>Role</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap" target="_blank"
                                rel="noopener">Bootstrap 5</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>