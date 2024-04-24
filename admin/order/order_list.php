<?php
    include_once '../../import/connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $keyword = strtolower(trim($keyword));
        $select_order = $_GET['select'];
        if($select_order == 1){
            $sql_order = "SELECT oo.order_id, oo.order_date_on,oo.delivery_status,
        case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        case
			when LEN(ue.middle_name)> 0 then
				 CONCAT(ue.last_name, ' ', ue.middle_name, ' ', ue.first_name)
			else CONCAT(ue.last_name,' ', ue.first_name)
		end AS employee_name, oo.status_on,oo.note_on
            FROM orders_online AS oo
            JOIN customers AS c ON oo.customer_id = c.customer_id
            JOIN users AS u ON c.user_id = u.user_id
            JOIN employees AS e ON oo.employee_id = e.employee_id
            JOIN users AS ue ON e.user_id = ue.user_id
            WHERE LOWER(CONCAT('DH00', CAST(order_id AS NVARCHAR(MAX)))) LIKE '%' + '$keyword' + '%';";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
        if($select_order == 0){
            $sql_order = "SELECT *
            FROM orders_offline
            WHERE LOWER(CONCAT('DH00', CAST(order_id AS NVARCHAR(MAX)))) LIKE '%' + '$keyword' + '%';";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
    }
    else{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sbm_select_order'])) {
        $select_order=$_POST['order'];
        if($select_order == 1){
            $sql_order = "SELECT oo.order_id, oo.order_date_on,oo.delivery_status,
        case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        case
			when LEN(ue.middle_name)> 0 then
				 CONCAT(ue.last_name, ' ', ue.middle_name, ' ', ue.first_name)
			else CONCAT(ue.last_name,' ', ue.first_name)
		end AS employee_name,
        oo.status_on,oo.note_on
            FROM orders_online AS oo
            JOIN customers AS c ON oo.customer_id = c.customer_id
            JOIN users AS u ON c.user_id = u.user_id
            JOIN employees AS e ON oo.employee_id = e.employee_id
            JOIN users AS ue ON e.user_id = ue.user_id;";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
        if($select_order == 0){
            $sql_order = "SELECT * FROM orders_offline";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
    }
    else{
        $select_order = (isset($_GET['select']))?$_GET['select']:1;
        if($select_order == 1){
            $sql_order = "SELECT oo.order_id, oo.order_date_on,oo.delivery_status,
        case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        case
			when LEN(ue.middle_name)> 0 then
				 CONCAT(ue.last_name, ' ', ue.middle_name, ' ', ue.first_name)
			else CONCAT(ue.last_name,' ', ue.first_name)
		end AS employee_name, oo.status_on,oo.note_on
            FROM orders_online AS oo
            JOIN customers AS c ON oo.customer_id = c.customer_id
            JOIN users AS u ON c.user_id = u.user_id
            JOIN employees AS e ON oo.employee_id = e.employee_id
            JOIN users AS ue ON e.user_id = ue.user_id;";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
        if($select_order == 0){
            $sql_order = "SELECT * FROM orders_offline";
            $result_order = sqlsrv_query($conn, $sql_order);
        }
    }
}
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
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

    <main>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-5">
                <h3><a style="color:black;" href="index.php"><i class='bx bxs-chevrons-left me-3' ></i></a>List of orders</h3>
            </div>
            <div class="col-md-4">
                <form class="d-flex" action="order_list.php?select=<?php echo $select_order?>" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="keyword" value="">
                    <button class="btn btn-outline-primary" type="submit" name="search" value="find">Search</button>
                    </form>
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) { ?>
                    <div class="row mt-3">
                        <div class="col">
                            <?php
                            $keyword = $_POST['keyword'];
                            echo "<p>Search with keyword: '<strong>$keyword</strong>'</p>";
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-3 text-right">
                <button class="btn btn-primary float-end">Export to Excel</button>
            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">
                <form  action="order_list.php" method="post">
                   <div class="row">
                        <div class="col-md-5">
                            <h5 class="card-title">Order listing table</h5>
                        </div>
                            <div class="col-md-7 text-end">
                                <div class=" row d-flex">
                                    <div class="col-md-6"></div>
                                   <div class ="col-md-3 text-end ">
                                        <select class="form-select" id="order" name="order" required>
                                            <option value="" disabled selected>Select order type</option>
                                            <option value="1" <?php echo ($select_order == '1') ? 'selected' : ''; ?>>Online orders</option>
                                            <option value="0"<?php echo ($select_order == '0') ? 'selected' : ''; ?>>Offline orders</option>
                                        </select>
                                   </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-outline-success" name="sbm_select_order">Filter orders</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                   </div>
                   <hr>
                   <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Order Date</th>
                                        <?php if($select_order == 1) { ?>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Note</th>
                                        <?php } else { ?>
                                            <th scope="col">Note</th>
                                        <?php } ?>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($row_order = sqlsrv_fetch_array($result_order)) {
                                        $i++;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td>OD00<?php echo $row_order['order_id']; ?></td>
                                        <?php
                                        if($select_order == 1) $order_date = $row_order['order_date_on'];
                                        else $order_date = $row_order['order_date_off'];
                                        $formatted_date = $order_date->format('Y-m-d');?>
                                        <td><?php echo  $formatted_date; ?></td>
                                        <?php if($select_order == 1) { ?>
                                            <td><?php echo $row_order['full_name']; ?></td>
                                            <td><?php echo $row_order['employee_name']; ?></td>
                                            <td><?php echo $row_order['status_on']; ?></td>
                                            <td><?php echo $row_order['note_on']; ?></td>
                                        <?php } else { ?>
                                            <td><?php echo $row_order['note_off']; ?></td>
                                        <?php } ?>
                                        <td>
                                       <div class="d-flex">
                                            <?php if($select_order == 1) { ?>
                                                <a href="order_detail.php?order_id=<?php echo $row_order['order_id']; ?>&select=1" class="btn btn-sm btn-info me-2">View</a>
                                                <button class="btn btn-sm btn-danger delete-btn me-2" data-order-id="<?php echo $row_order['order_id']; ?>">Delete</button>
                                            <?php } else { ?>
                                                <a href="order_detail.php?order_id=<?php echo $row_order['order_id']; ?>&select=0" class="btn btn-sm btn-info me-2">View</a>
                                                <button class="btn btn-sm btn-danger delete-btn me-2" data-order-id="<?php echo $row_order['order_id']; ?>">Delete</button>
                                            <?php } ?>
                                       </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>
    </main>
    </div>
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this order?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="process.php" method="POST">
                    <input type="hidden" name="order_id" id="order_id_input">
                    <input type="hidden" name="select" id="" value="<?php echo $select_order;?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="btn_delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
    // JavaScript to handle delete button click and pass order ID to the confirmation modal
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var orderId = $(this).data('order-id');
            $('#order_id_input').val(orderId);
            $('#deleteConfirmationModal').modal('show');
        });
    });
</script>
</body>
</html>
