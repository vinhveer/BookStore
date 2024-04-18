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
            width: 100%;
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

        h6 {
            padding-left: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar-brand {
            padding-top: 10px;
        }

        .sum_product {
            font-size: 20px;
            font-weight: 300;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center d-flex" href="index.php">
                <img src="..\assets\images\logo\light_theme_logo.png" class="logo">
                <h6>
                    <i class="bi bi-cart-dash"></i>
                    Cart
                </h6>
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
                    <form class="d-flex me-auto search align-items-center" role="search">
                        <input class="form-control border-secondary rounded-start-pill" type="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary rounded-end-pill" type="submit"><i
                                class="bi bi-search"></i></button>
                    </form>
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

    <main class="container">
        <div class="row">
            <!-- Phần tiêu đề -->
            <div class="col-md-6">
                <h3 class="section-title">Cart</h3>
            </div>

        </div>
    </main>

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
                <a href="index.php" class="btn btn-primary btn-purchase"><i class="bi bi-cart-fill me-2"></i>Mua ngay
                    (2)</a>
                <a href="index.php" class="btn btn-danger"><i class="bi bi-cart-fill me-2"></i>Xóa khỏi giỏ hàng
                    (2)</a>
            </div>
        </div>
    </div>

    <div class="container mt-4 d-flex">
        <div class="card me-2" style="width: 18rem;">
            <img src="" class="card-img-top-book" alt="">
            <div class="card-body">
                <h5 class="card-title">
                    Hello
                </h5>
            </div>
            <div class="card-footer">
                <div class="card-text">
                    <p class="author"></p>
                    <p class="year"></p>
                </div>
                <p class="card-text">
                    <strong>
                        đ
                    </strong>
                </p>
            </div>
        </div>
    </div>



    <footer class="py-5 container mt-4">
        <div class="row">
            <div class="col-6 col-md-3 mb-3">
                <h5>Thông tin liên hệ</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <h5>Các nền tảng mạng xã hội</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Bạn chưa đăng nhập</h5>
                    <p>Hãy đăng nhập để trải nghiệm đầy đủ tính năng.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2024 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <img src="..\assets\images\logo\light_theme_logo.png" class="logo">
            </ul>
        </div>
    </footer>
</body>

</html>