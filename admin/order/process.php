<?php
     include '../../import/connect.php';
     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_delete"])) {
          $order_id = $_POST['order_id'];
          $select = $_POST['select'];
          if($select == 1){
               $sql_delete_order = "DELETE FROM orders_online where order_id = $order_id";
               $query_order = sqlsrv_query($conn, $sql_delete_order);
          }
          if($select == 0){
               $sql_delete_order = "DELETE FROM orders_offline where order_id = $order_id";
               $query_order = sqlsrv_query($conn, $sql_delete_order);
          }
          header ("location: order_list.php?select=$select");
     }
     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_delete_product"])) {
          $order_id = $_POST['order_id'];
          $select = $_POST['select'];
          $product_id = $_POST['product_id'];
          if($select == 1){
               $sql_delete_product = "DELETE FROM order_details_on where product_id = $product_id";
               $query_order = sqlsrv_query($conn, $sql_delete_product);
          }
          if($select == 0){
               $sql_delete_product = "DELETE FROM order_details_off where product_id = $product_id";
               $query_order = sqlsrv_query($conn, $sql_delete_product);
          }
          header ("location: order_detail.php?order_id=$order_id&select=$select");
     }

     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_edit_product"])) {
          $order_id = $_POST['order_id'];
          $select = $_POST['select'];
          $product_id = $_POST['product_id'];
          $quantity = $_POST['edit_quantity'];
          $price_unit = $_POST['edit_price_unit'];
          $discount = $_POST['edit_discount'];
          if($select == 0){
          $sql_update_pro = "UPDATE products SET product_price='$price_unit' where product_id = $product_id;
               UPDATE order_details_off SET quantity='$quantity',discount='$discount' where product_id = $product_id;";
          }
          if($select == 1){
               $sql_update_pro = "UPDATE products SET product_price='$price_unit' where product_id = $product_id;
               UPDATE order_details_on SET quantity='$quantity',discount='$discount' where product_id = $product_id;";
          }
          $query_product = sqlsrv_query($conn, $sql_update_pro);
          header ("location: order_detail.php?order_id=$order_id&select=$select");
     }
     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_edit_order"])) {
          $order_id = $_POST['order_id'];
          $select = $_POST['select'];
          $date_order = $_POST['order_date'];
          $note = $_POST['note'];
          $total = $_POST['total'];
          if($select == 1){
               $customer = $_POST['customer'];
               $status = $_POST['Status'];
               $delivery_status = $_POST['delivery_status'];
               $employee_id = $_POST['employee'];
               $sql_update_order = "UPDATE orders_online SET
                    order_date_on = '$date_order',
                    customer_id = '$customer',
                    status_on = '$status',
                    note_on = N'$note',
                    total_amount_on = '$total',
                    delivery_status = '$delivery_status',
                    employee_id = '$employee_id'
                    where order_id = $order_id;";

          }
          if($select == 0){
               $sql_update_order = "UPDATE orders_offline SET
                    order_date_off = '$date_order',
                    note_off = N'$note',
                    total_amount_off = '$total'
                    where order_id = $order_id;
               ";
          }
          $query_update_oder = sqlsrv_query($conn, $sql_update_order);
          header ("location: order_detail.php?order_id=$order_id&select=$select");
     }
?>
