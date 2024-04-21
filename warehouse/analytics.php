<?php
include '../import/connect.php';
$sql = "SELECT 
            si.stock_in_id,
            si.inflow_date,
            p.product_id,
            (
                SELECT 
                    CASE
                        WHEN b.book_name IS NOT NULL THEN b.book_name
                        WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                        ELSE 'Unknown'
                    END
                FROM 
                    books b
                LEFT JOIN 
                    products pb ON b.product_id = pb.product_id
                LEFT JOIN 
                    others_products op ON pb.product_id = op.product_id
                WHERE 
                    pb.product_id = p.product_id
            ) AS product_name,
            sid.quantity_in,
            sid.unit_price_in
        FROM 
            stock_in si
        JOIN 
            employees e ON si.employee_id = e.employee_id
        JOIN 
            stock_in_details sid ON si.stock_in_id = sid.stock_in_id
        JOIN 
            products p ON sid.product_id = p.product_id";

$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Amazon Warehouse</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>Warehouse</div>
        </a>
        <ul class="side-menu">
            <li><a href="dashboard.php"><i class='bx bxs-bar-chart-alt-2'></i>Dashboard</a></li>
            <li><a href="category.php"><i class='bx bxs-category'></i>Category</a></li>
            <li class="active"><a href="analytics.php"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="inventory.php"><i class='bx bxs-store-alt'></i>Inventory</a></li>
            <li><a href="supplier.php"><i class='bx bxs-user-pin'></i>Supplier</a></li>
            <li><a href="settings.php"><i class='bx bx-cog'></i>Settings</a></li>
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
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Analytics</h1>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="category.php">Category</a></li>
                        <li>/</li>
                        <li><a href="analytics.php" class="active">Analytics</a></li>
                        <li>/</li>
                        <li><a href="inventory.php">Inventory</a></li>
                        <li>/</li>
                        <li><a href="supplier.php">Supplier</a></li>
                        <li>/</li>
                        <li><a href="settings.php">Settings</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>
            <h2>Stock In</h2>

            <table id="stockInTable">
                <thead>
                    <tr>
                        <th><button onclick="sortTable(0)">Stock In ID</button></th>
                        <th><button onclick="sortTable(1)">Inflow Date</button></th>
                        <th><button onclick="sortTable(2)">Product ID</button></th>
                        <th><button onclick="sortTable(3)">Product Name</button></th>
                        <th><button onclick="sortTable(4)">Quantity In</button></th>
                        <th><button onclick="sortTable(5)">Unit Price In</button></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row["stock_in_id"] . "</td>";
                        echo "<td>" . $row["inflow_date"]->format('Y-m-d') . "</td>";
                        echo "<td>" . $row["product_id"] . "</td>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["quantity_in"] . "</td>";
                        echo "<td>" . $row["unit_price_in"] . "</td>";
                        echo "<td><a href='product_detail.php?product_id=" . $row["product_id"] . "'>View Details</a></td>"; // Tạo liên kết "Xem chi tiết"
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </main>
    </div>
    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("stockInTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
    <script src="index.js"></script>
</body>

</html>