<?php
// Lấy 5 sản phẩm với các thông tin ... (JOIN)
$sql_index = "SELECT TOP 5 bo.product_id, bo.book_name, pr.product_image, pr.product_price FROM books bo
    INNER JOIN products pr ON pr.product_id = bo.product_id;";
?>