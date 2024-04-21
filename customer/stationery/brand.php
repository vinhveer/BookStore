<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../../import/libary.php'; ?>
    <?php include '../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/brand.css">
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

    <div class="container">
        <h2>Brand</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui esse quaerat, molestiae aut incidunt
            praesentium modi quia libero suscipit nostrum minima corporis optio cum, veniam nesciunt voluptas, quod quae
            quasi? </p>
    </div>

    <?php
    $sql = "SELECT * FROM brands;";
    $result = sqlsrv_query($conn, $sql);
    ?>

    <div class="container">
        <div class="row">
            <?php
            while ($row = sqlsrv_fetch_array($result)) {
                $sql_op = "SELECT COUNT(*) FROM others_products WHERE others_product_brand_id = " . $row['brand_id'] . ";";
                $result_op = sqlsrv_query($conn, $sql_op);
                $row_op = sqlsrv_fetch_array($result_op);
            ?>
            <div class="col-md-3">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['brand_name']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo $row_op[0]; ?> product
                        </h6>
                    </div>
                    <div class="card-footer">
                        <a href="explore_brand.php?brand_id=<?php echo $row['brand_id'] ?>" class="btn btn-primary">Explore</a>
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