<?php
if ($_SERVER['SCRIPT_NAME'] !== "/customer/see_more.php") {
    $sql_item_book = $row['cmd_top5'];
} else {
    $sql_item_book = $row['cmd_top30'];
}
$result_item_book = sqlsrv_query($conn, $sql_item_book);
?>

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-9">
            <h4><?php echo $row['title']; ?></h4>
        </div>
        <div class="col-md-3 text-end">
            <?php if ($_SERVER['SCRIPT_NAME'] !== "/customer/see_more.php"): ?>
                <a href="see_more.php?list_item_id=<?php echo $row['id'] ?>" class="btn btn-warning">See more</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <?php while ($row_book = sqlsrv_fetch_array($result_item_book, SQLSRV_FETCH_ASSOC)) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo $row_book['product_image']; ?>" class="card-img-top-book"
                                alt="<?php echo $row_book['book_name']; ?>">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column" style="height: 40%">
                                <a href="book/book_details.php?book_id=<?php echo $row_book['product_id'] ?>">
                                    <h5 class="card-title">
                                        <?php
                                        $title = $row_book['book_name'];
                                        echo (strlen($title) > 40) ? substr($title, 0, 40) . "..." : $title;
                                        ?>
                                    </h5>
                                </a>
                            </div>
                            <div class="card-details card-footer" style="height: 40%">
                                <div class="card-text">
                                    <p class="author"><?php echo $row_book['author_name']; ?></p>
                                    <p class="year"><?php echo $row_book['book_publication_year']; ?></p>
                                </div>
                                <div class="card-text">
                                    <strong><?php echo $row_book['product_price']; ?>đ</strong>
                                </div>
                            </div>
                            <div class="row d-flex" style="height: 20%">
                                <form method="post" action="process.php">
                                    <a href="order/order.php?product_id=<?php echo $row_book['product_id'] ?>"
                                        class="col-md-8 btn btn-success">Buy now</a>
                                    <input type="hidden" name="product_id" value="<?php echo $row_book['product_id']; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-secondary col-md-3"><i
                                            class="bi bi-cart-plus"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
