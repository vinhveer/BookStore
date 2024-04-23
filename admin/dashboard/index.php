<?php
    include_once '../../import/connect.php';
    $sql_product_sold = "SELECT SUM(quantity) AS total_sold_quantity
    FROM (
        SELECT quantity
        FROM order_details_on odo
        INNER JOIN orders_online oo ON odo.order_id = oo.order_id
        WHERE oo.status_on = 'Completed'
        UNION ALL
            SELECT quantity
        FROM order_details_off odf
    ) AS all_orders;";
    $result_product_sold = sqlsrv_query($connect,$sql_product_sold);
    $row_product_sold = sqlsrv_fetch_array($result_product_sold);

    $sql_order_count = "SELECT COUNT(*) AS total_orders
    FROM (
        SELECT order_id FROM orders_online

        UNION ALL
            SELECT order_id FROM orders_offline
    ) AS all_orders;
    ";
    $result_order_count = sqlsrv_query($connect,$sql_order_count);
    $row_order_count = sqlsrv_fetch_array($result_order_count);

    $sql_account_count = "SELECT COUNT(*) AS total_accounts
    FROM user_accounts;";
    $result_account_count = sqlsrv_query($connect,$sql_account_count);
    $row_account_count = sqlsrv_fetch_array($result_account_count);

    $sql_total_revenue = "SELECT SUM(total_amount) AS total_revenue
    FROM (
        SELECT total_amount_on AS total_amount
        FROM orders_online
        UNION ALL
        SELECT total_amount_off AS total_amount
        FROM orders_offline
    ) AS all_orders;";
    $result_total_revenue = sqlsrv_query($connect,$sql_total_revenue);
    $row_total_revenue = sqlsrv_fetch_array($result_total_revenue);

    $sql_order_online = "SELECT TOP 3
    c.customer_id,u.image_user,
    case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
    oo.order_date_on,
    oo.status_on
    FROM
        orders_online oo
    INNER JOIN
        customers c ON oo.customer_id = c.customer_id
    INNER JOIN
        users u ON c.user_id = u.user_id
    ORDER BY
        oo.order_date_on DESC;";
    $result_order_online = sqlsrv_query($connect,$sql_order_online);
    $sql_notification = "SELECT TOP 3 notif_title, notif_content,notif_date
    FROM notiffication ORDER BY notif_date DESC ";
    $result_notification = sqlsrv_query($connect,$sql_notification);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            <div class="logo-name"><span></span>&nbspAdmin</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="index.php"><i class='bx bxs-dashboard'></i>Home</a></li>
            <li><a href="../order/index.php"><i class='bx bx-clipboard'></i>Orders</a></li>
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
            <a href="new.php" class="notif">
                <i class='bx bx-bell'></i>
            </a>
            <a href="#" class="profile">
                <img src="../../assets/images/logo/image.png">
            </a>
        </nav>

    <main>
        <div class="header">
                <div class="left">
                    <h1>Home</h1>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            <?php echo $row_order_count['total_orders'] ?>
                        </h3>
                        <p>Number of Order</p>
                    </span>
                </li>
                <li><i class='bx bx-user-circle'></i>
                    <span class="info">
                        <h3>
                            <?php echo $row_account_count['total_accounts'] ?>
                        </h3>
                        <p>Account User</p>
                    </span>
                </li>
                <li><i class='bx bx-calendar-edit'></i>
                    <span class="info">
                        <h3>
                            <?php echo $row_product_sold['total_sold_quantity'] ?>
                        </h3>
                        <p>Products sold</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $<?php echo $row_total_revenue['total_revenue'] ?>
                        </h3>
                        <p>Total revenue</p>
                    </span>
                </li>
            </ul>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                        <i class='bx bx-filter'></i>
                        <a href="../order/order_list.php"><i class='bx bx-search'></i></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row_order_online = sqlsrv_fetch_array($result_order_online)) {?>
                            <tr>
                                <td>
                                    <img src="../../<?php echo $row_order_online['image_user'] ?>">
                                    <p><?php echo $row_order_online['full_name'] ?></p>
                                </td>
                                <?php $order_date = $row_order_online['order_date_on'];
                                    $formatted_date = $order_date->format('Y-m-d'); ?>
                                <td><?php echo $formatted_date; ?></td>
                                <?php if($row_order_online['status_on'] == "Completed"){ ?>
                                    <td><span class="status completed">Completed</span></td>
                                <?php } if($row_order_online['status_on'] == "Pending"){?>
                                    <td><span class="status pending">Pending</span></td>
                                <?php } if($row_order_online['status_on'] == "Unpaid"){?>
                                    <td><span class="status unpaid">Unpaid</span></td>
                                <?php } if($row_order_online['status_on'] == "Shipped"){?>
                                    <td><span class="status process">Shipped</span></td>
                                <?php } if($row_order_online['status_on'] == "Deleted"){?>
                                    <td><span class="status delete">Deleted</span></td>
                                <?php } if($row_order_online['status_on'] == "Confirmed"){?>
                                    <td><span class="status confirmed">Confirmed</span></td>
                                <?php }?>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <!-- Reminders -->
                <div class="reminders">
                    <div class="header">
                        <a href="../setting_up/setting_notification.php"><i class='bx bx-note'></i></a>
                        <h3>Notifications</h3>
                        <i class='bx bx-filter'></i>
                        <a href="../setting_up/setting_notification.php"><i class='bx bx-plus'></i></a>
                    </div>
                        <ul class="task-list">
                        <?php
                        while ($row_notification = sqlsrv_fetch_array($result_notification)) {?>
                            <li class="completed">
                                <div class="task-title">
                                    <i class='bx bx-check-circle'></i>
                                    <p><?php echo $row_notification['notif_title'] ;?></p>
                                </div>
                                <a href="../setting_up/setting_notification.php"><i class='bx bx-dots-vertical-rounded'></i></a>
                            </li>
                            <?php }?>
                        </ul>
                </div>
            </div>
    </main>
    </div>
    <script src="index.js"></script>
</body>
</html>
