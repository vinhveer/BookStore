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
                <a href="#" class="btn btn-danger float-end"><i class="bi bi-cart-plus"></i></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>