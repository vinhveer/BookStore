<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../import/libary.php'; ?>
    <?php include 'sql_command.php' ?>

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
        <div class="row">
            <div class="col-md-10">
                <h4>New book</h4>
            </div>
            <div class="col-md-2">
                <a href="#" class=" float-end">See more</a>
            </div>
        </div>
    </div>

    <?php
    include '../import/connect.php';

    // $sql = "SELECT TOP 5 bo.product_id, bo.book_name, pr.product_image, pr.product_price FROM books bo
    // INNER JOIN products pr ON pr.product_id = bo.product_id;";

    $result = sqlsrv_query($conn, $sql_index);
    ?>

    <div class="container mt-4 d-flex">
        <?php
        while ($row = sqlsrv_fetch_array($result))
        {
        ?>
        <div class="card me-2" style="width: 18rem;">
            <img src="<?php echo $row['product_image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
                <p class="card-text"> <?php echo $row['product_price'] ?></p>
                <a href="#" class="btn btn-primary">Buy now</a>
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
                <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Home</a></li>
                        <li class="mb-2"><a href="/docs/5.3/">Docs</a></li>
                        <li class="mb-2"><a href="/docs/5.3/examples/">Examples</a></li>
                        <li class="mb-2"><a href="https://icons.getbootstrap.com/">Icons</a></li>
                        <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
                        <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
                        <li class="mb-2"><a href="https://cottonbureau.com/people/bootstrap" target="_blank"
                                rel="noopener">Swag Store</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Guides</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
                        <li class="mb-2"><a href="/docs/5.3/examples/starter-template/">Starter template</a></li>
                        <li class="mb-2"><a href="/docs/5.3/getting-started/webpack/">Webpack</a></li>
                        <li class="mb-2"><a href="/docs/5.3/getting-started/parcel/">Parcel</a></li>
                        <li class="mb-2"><a href="/docs/5.3/getting-started/vite/">Vite</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Projects</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap" target="_blank"
                                rel="noopener">Bootstrap 5</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev" target="_blank"
                                rel="noopener">Bootstrap 4</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/icons" target="_blank"
                                rel="noopener">Icons</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/rfs" target="_blank" rel="noopener">RFS</a>
                        </li>
                        <li class="mb-2"><a href="https://github.com/twbs/examples/" target="_blank"
                                rel="noopener">Examples repo</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5>Community</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues" target="_blank"
                                rel="noopener">Issues</a></li>
                        <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions" target="_blank"
                                rel="noopener">Discussions</a></li>
                        <li class="mb-2"><a href="https://github.com/sponsors/twbs" target="_blank"
                                rel="noopener">Corporate sponsors</a></li>
                        <li class="mb-2"><a href="https://opencollective.com/bootstrap" target="_blank"
                                rel="noopener">Open Collective</a></li>
                        <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5"
                                target="_blank" rel="noopener">Stack Overflow</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>