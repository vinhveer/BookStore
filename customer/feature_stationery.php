<?php
if ($_SERVER['SCRIPT_NAME'] !== "/customer/see_more.php") {
    $sql_item_other_product = $row['cmd_top5'];
} else {
    $sql_item_other_product = $row['cmd_top30'];
}

$result_item_other_product = sqlsrv_query($conn, $sql_item_other_product);

?>

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <h4 style="margin-bottom: 0">
                <?php echo $row['title']; ?>
            </h4>
        </div>
        <div class="col-md-2">
            <?php if ($_SERVER['SCRIPT_NAME'] !== "/customer/see_more.php"): ?>
                <a href="see_more.php?list_item_id=<?php echo $row['id'] ?>" class="btn float-end" style="background-color: #ffe100;">See more</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mt-4 d-flex">
    <div class="row">
        <?php while ($row_other_product = sqlsrv_fetch_array($result_item_other_product, SQLSRV_FETCH_ASSOC)) { ?>
            <div class="col-md-2 mb-4">
                <div class="card h-100">
                    <img src="<?php echo $row_other_product['product_image']; ?>" class="card-img-top h-40"
                        alt="<?php echo $row_other_product['others_product_name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row_other_product['others_product_name']; ?></h5>
                    </div>
                    <div class="card-footer">
                        <p class="card-text brand"><?php echo $row_other_product['brand_name']; ?></p>
                        <p class="card-text"><strong><?php echo $row_other_product['product_price']; ?>đ</strong></p>
                    </div>
                    <div class="row d-flex">
                        <form method="post" action="process.php" class="d-flex align-items-center">
                            <a href="order/order.php?product_id=<?php echo $row_other_product['product_id'] ?>"
                                class="btn btn-success flex-grow-1 rounded-0">Buy now</a>
                            <input type="hidden" name="product_id" value="<?php echo $row_other_product['product_id']; ?>">
                            <button type="submit" name="add_to_cart" class="btn btn-secondary ml-auto rounded-0"><i
                                    class="bi bi-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
