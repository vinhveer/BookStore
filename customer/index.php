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

	<link rel="stylesheet" href="css/index.css">
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
						<a class="nav-link" href="book/book.php">Book</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="stationery/stationery.php">Stationery</a>
					</li>
				</ul>
				<form class="d-flex me-auto search align-items-center" role="search">
					<input class="form-control border-secondary rounded-start-pill" type="search" placeholder="Search"
						aria-label="Search">
					<button class="btn btn-outline-secondary rounded-end-pill" type="submit"><i
							class="bi bi-search"></i></button>
				</form>

				<ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
					<?php
					if (isset($_SESSION['user_id'])) {
						?>
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
								<li><a class="dropdown-item" href="details/settings.php"><i class="bi bi-gear"></i>Setting</a></li>
								<li><a class="dropdown-item" href="../login/sign_out.php"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
							</ul>
						</li>
					<?php
					} else {
					?>
						<li class="nav-item d-flex">
							<a class="nav-link btn mx-2 login_btn" aria-current="page" href="../login/sign_in.php">Login</a>
							<a class="nav-link btn mx-2 sign_up_btn" aria-current="page" href="../login/register.php">Register</a>
					<?php
					}
					?>
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

	<?php
	$sql_items = "SELECT * FROM list_item";
	$result_items = sqlsrv_query($conn, $sql_items);

	while ($row = sqlsrv_fetch_array($result_items, SQLSRV_FETCH_ASSOC)) {
		if ($row['type_item'] == 'b') {
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
					<?php
				}
				?>
			</div>
			<?php
		} else {
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
			$sql_item_other_product = $row['cmd_top5'];
			$result_item_other_product = sqlsrv_query($conn, $sql_item_other_product);
			?>
			<div class="container mt-4 d-flex">
				<?php
				while ($row_other_product = sqlsrv_fetch_array($result_item_other_product, SQLSRV_FETCH_ASSOC)) {
					?>
					<div class="card me-2" style="width: 18rem;">
						<img src="<?php echo $row_other_product['product_image']; ?>" class="card-img-top-other"
							alt="<?php echo $row_other_product['others_product_name']; ?>">
						<div class="card-body">
							<h5 class="card-title">
								<?php
								$title = $row_other_product['others_product_name'];
								if (strlen($title) > 40) {
									$title = substr($title, 0, 35) . "...";
								}
								echo $title;
								?>
							</h5>
						</div>
						<div class="card-footer">
							<div class="card-text">
								<p class="brand"><?php echo $row_other_product['brand_name']; ?></p>
							</div>
							<p class="card-text">
								<strong>
									<?php echo $row_other_product['product_price']; ?>đ
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