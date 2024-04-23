<?php
    include_once '../../import/connect.php';
    $order_id = $_GET['order_id'];
    $select = $_GET['select'];
    $product_id = $_GET['product_id'];
    $sql_product_detail = "SELECT
    CASE
        WHEN b.product_id IS NOT NULL THEN 'Book'
        ELSE 'Stationery'
    END AS product_type,
	p.product_price,
    p.product_image,
    p.product_status,
    COALESCE(b.product_id, op.product_id) AS product_id,
    COALESCE(b.book_name, op.others_product_name) AS product_name,
    COALESCE(b.book_description, op.others_product_description) AS product_description,
    COALESCE(bc.book_category_name, NULL) AS category_name,
    COALESCE(bl.book_language, NULL) AS language,
    COALESCE(b.book_publication_year, NULL) AS publication_year,
    COALESCE(b.book_packaging_size, op.others_product_size) AS packaging_size,
    COALESCE(b.book_format, NULL) AS book_format,
    COALESCE(b.book_ISBN, NULL) AS ISBN,
    COALESCE(bp.book_publisher_name, NULL) AS publisher_name,
    COALESCE(op.others_product_brand_id, NULL) AS brand_id,
    COALESCE(br.brand_name, NULL) AS brand_name,
    COALESCE(op.others_product_color, NULL) AS color,
    COALESCE(op.others_product_material, NULL) AS material,
    COALESCE(op.others_product_weight, NULL) AS weight
    FROM
        products p
    LEFT JOIN books b ON p.product_id = b.product_id
    LEFT JOIN others_products op ON p.product_id = op.product_id
    LEFT JOIN book_categories bc ON b.book_category_id = bc.book_category_id
    LEFT JOIN book_languages bl ON b.book_language_id = bl.book_language_id
    LEFT JOIN book_publishers bp ON b.book_publisher_id = bp.book_publisher_id
    LEFT JOIN brands br ON op.others_product_brand_id = br.brand_id
    WHERE
        p.product_id = $product_id";
    $result_product_detail = sqlsrv_query($connect,$sql_product_detail);
    $row_product_detail = sqlsrv_fetch_array($result_product_detail);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Home Admin</title>
    <style>
        .action-buttons .btn.btn-info  {
            display: flex;
            align-items: center;
        }
        h3{
            color: var(--dark);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>&nbspBookstore</div>
        </a>
        <ul class="side-menu">
            <li><a href="../dashboard/index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li class="active"><a href="index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
            <li><a href="../setting_up/setting_support.php"><i class='bx bx-support'></i>Support</a></li>
            <li><a href="../account/index.php"><i class='bx bx-group'></i>Users</a></li>
            <li><a href="../setting_up/index.php"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="../dashboard/new.php" class="notif">
                <i class='bx bx-bell'></i>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="container-fluid mb-4">
        <div class="header">
                <h3><a style="color:black;" href="order_detail.php?order_id=<?php echo $order_id;?>&select=<?php echo $select;?>"><i class='bx bxs-chevrons-left me-3' ></i></a>Thông tin sản phẩm</h3>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Xuất báo cáo</span>
                </a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <img src="<?php echo $row_product_detail['product_image'];?>" alt="Profile Image" class="img-fluid"
                                style="width: 200px; height: 300px;">
                    </div>
                    <div class="col-md-8">
                    <h4>Chi tiết sản phẩm</h4>
                    <hr class="info-divider">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action list-group-item-light">
                            <div class="d-flex align-items-center">
                                <strong style="margin-right: 75px">Loại Sản Phẩm</strong>
                                <p style="margin-bottom: 0px"><?php echo $row_product_detail['product_type'];?></p>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action list-group-item-light">
                            <div class="d-flex align-items-center">
                                <strong style="margin-right: 75px">Mã Sản Phẩm</strong>
                                <p style="margin-bottom: 0px">DH00<?php echo $product_id?></p>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action list-group-item-light">
                            <div class="d-flex align-items-center">
                                <strong style="margin-right: 95px">Tên Sản Phẩm:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['product_name'];?></p>
                            </div>
                        </li>

                        <?php if($row_product_detail['product_type']=='Book'){ ?>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Ngôn ngữ:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['language'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Loại sách:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['category_name'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Nhà xuất bản:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['publisher_name'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Năm xuất bản:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['publication_year'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Định dạng sách:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['book_format'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Kích thước sách:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['packaging_size'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">ISBN:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['ISBN'];?></p>
                                </div>
                            </li>
                        <?php }else { ?>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Thương hiệu:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['brand_name'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Màu sản phẩm:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['color'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Chất liệu:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['material'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Trọng lượng:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['weight'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Kích thước:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['packaging_size'];?></p>
                                </div>
                            </li>
                        <?php }?>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Mô tả sản phẩm:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['product_description'];?></p>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Trạng thái:</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['product_status'];?></p>
                            </div>
                            </li>
                            <li class="list-group-item list-group-item-action list-group-item-light">
                                <div class="d-flex align-items-center">
                                    <strong style="margin-right: 50px">Giá sẩn phẩm</strong>
                                    <p style="margin-bottom: 0px"><?php echo $row_product_detail['product_price'];?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
