<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <?php include '../../import/libary.php'; ?>
    <?php include '../../import/connect.php'; ?>

    <link rel="stylesheet" href="css/stationery.css">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="stationery.php">Stationery</a>
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
                                <img src="../../assets/images/avatar/avatar1.png" alt="" srcset="" class="avatar_dropdown">
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

    <div class="container heading">
        <h1>Stationery</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos libero culpa, id explicabo sunt, accusantium
            atque tenetur nulla neque odio distinctio iusto optio laudantium ipsam. Ipsam reprehenderit iste similique
            excepturi?</p>
    </div>

    <?php
	$sql_items = "SELECT * FROM list_item";
	$result_items = sqlsrv_query($conn, $sql_items);

	while ($row = sqlsrv_fetch_array($result_items, SQLSRV_FETCH_ASSOC)) {
		if ($row['type_item'] == 'p') {
			?>
			<div class="container mt-4">
				<div class="row justify-content-center align-items-center">
					<div class="col-md-10">
						<h4 style="margin-bottom: 0">
							<?php echo $row['title']; ?>
						</h4>
					</div>
					<div class="col-md-2">
						<a href="#" class="btn float-end" style="background-color: #ffe100;">See more</a>
					</div>
				</div>
			</div>
			<?php
			$sql_item_book = $row['cmd_top5'];
			$result_item_book = sqlsrv_query($conn, $sql_item_book);
			?>
			<div class="container mt-4 d-flex">
				<?php
				while ($row_book = sqlsrv_fetch_array($result_item_book, SQLSRV_FETCH_ASSOC)) {
					?>
                    <div class="card me-2" style="width: 18rem;">
                        <img src="<?php echo $row_book['product_image']; ?>" class="card-img-top"
                            alt="<?php echo $row_book['others_product_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php
                                $title = $row_book['others_product_name'];
                                if (strlen($title) > 40) {
                                    $title = substr($title, 0, 35) . "...";
                                }
                                echo $title;
                                ?>
                            </h5>
                        </div>
                        <div class="card-footer">
                            <div class="card-text">
                                <p class="brand"><?php echo $row_book['brand_name']; ?></p>
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
                    <?php
            }
            ?>
        </div>
        <?php
            }
        }
        ?>
</body>

</html>
