<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <?php include '../../import/libary.php'; ?>
    <?php include '../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/book.css">
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
                    <input class="form-control border-secondary rounded-start-pill" type="search"
                        placeholder="Search book ..." aria-label="Search">
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
    if (isset($_GET['book_id'])) {
        $book_id = $_GET['book_id'];

        $sql = "SELECT * 
        FROM books bo
        INNER JOIN products pr ON bo.product_id = pr.product_id
        INNER JOIN book_author ba ON bo.product_id = ba.product_id
        INNER JOIN author au ON au.author_id = ba.author_id
        INNER JOIN book_categories bc ON bc.book_category_id = bo.book_category_id
        INNER JOIN book_languages bl ON bl.book_language_id = bo.book_language_id
        INNER JOIN book_publishers pb ON pb.book_publisher_id = bo.book_publisher_id
        WHERE bo.product_id = $book_id";

        if ($result = sqlsrv_query($conn, $sql)) {
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        } else {
            echo "Book not found";
        }
        ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-2">
                    <img class="book_image" src="<?php echo $row['product_image'] ?>" alt="<?php echo $row['book_name'] ?>">
                    <p class="text-center"><?php echo $row['book_ISBN'] ?></p>
                </div>
                <div class="col-md-7">
                    <h6 style="font-size: 18px;"><?php echo $row['author_name'] ?></h6>
                    <h3 class="display-6" style="font-size: 35px"><?php echo $row['book_name'] ?></h3>
                    <p style="padding-top: 20px"><?php echo $row['book_description'] ?></p>
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-2"><?php echo $row['book_language'] ?></small>
                    <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2"><?php echo $row['book_category_name'] ?></small>
                </div>
                <div class="col-md-3">
                    <p style="font-size: 30px; font-weight: bold">80.000đ</p>
                    <button class="btn btn-success"><i class="bi bi-cart-plus fw-2"></i>Add to cart</button>
                    <button class="btn btn-warning"><i class="bi bi-credit-card fw-2"></i>Buy now </button>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <h5>Details</h5>
                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <td style="font-weight: bold;">Publisher</td>
                        <td><?php echo $row['book_publisher_name'] ?></td>
                    </tbody>
                    <tbody>
                        <td style="font-weight: bold;">Publication Year</td>
                        <td><?php echo $row['book_publication_year'] ?></td>
                    </tbody>
                    <tbody>
                        <td style="font-weight: bold;">Packaging size</td>
                        <td><?php echo $row['book_packaging_size'] ?></td>
                    </tbody>
                    <tbody>
                        <td style="font-weight: bold;">Format</td>
                        <td><?php echo $row['book_format'] ?></td>
                    </tbody>
                    <tbody>
                        <td style="font-weight: bold;">ISBN</td>
                        <td><?php echo $row['book_ISBN'] ?></td>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <?php
    } else {
        echo "Book not found";
    }
    ?>
</body>

</html>