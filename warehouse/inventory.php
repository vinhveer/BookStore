<?php
include '../import/connect.php';
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
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
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
            <li><a href="analytics.php"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li class="active"><a href="inventory.php"><i class='bx bxs-store-alt'></i>Inventory</a></li>
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
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Inventory</h1>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="category.php">Category</a></li>
                        <li>/</li>
                        <li><a href="analytics.php">Analytics</a></li>
                        <li>/</li>
                        <li><a href="inventory.php" class="active">Inventory</a></li>
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

            <form action="inventory.php" method="post">
                <label for="query">Select Query:</label>
                <select name="query" id="query">
                    <option value="total_inventory_value">Total Inventory Value</option>
                    <option value="check_inventory">Check Inventory</option>
                    <option value="low_inventory_products">Low Inventory Products</option>
                </select>
                <input type="submit" value="Submit">
            </form>
            <?php
                    echo "<a href='add_product.php'><button>Add Product</button></a>";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["query"] == "check_inventory"): ?>
                <script>
                    // Tìm kiếm trong bảng "Available Products"
                    function searchAvailableProducts() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("searchAvailableInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("availableProducts");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1]; // Thứ tự cột chứa tên sản phẩm
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
                <label for="searchAvailableInput">Search Products:</label>
                <input type="text" id="searchAvailableInput" onkeyup="searchAvailableProducts()"
                    placeholder="Search for product names..">
            <?php endif; ?>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["query"] == "low_inventory_products"): ?>
                <script>
                    // Tìm kiếm trong bảng "Low Inventory Products"
                    function searchLowInventoryProducts() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("searchLowInventoryInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("lowInventoryProducts");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1]; // Thứ tự cột chứa tên sản phẩm
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
                <label for="searchLowInventoryInput">Search Products:</label>
                <input type="text" id="searchLowInventoryInput" onkeyup="searchLowInventoryProducts()"
                    placeholder="Search for product names..">
            <?php endif; ?>
            <?php
            // Xử lý truy vấn khi nhận được yêu cầu POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $query_type = $_POST["query"];

                if ($query_type == "check_inventory") {
                    $quantity_threshold = isset($_POST["quantity_threshold"]) ? $_POST["quantity_threshold"] : 10;

                    $sql = "SELECT 
                p.product_id,
                CASE
                    WHEN b.book_name IS NOT NULL THEN b.book_name
                    WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                    ELSE 'Unknown'
                END AS product_name,
                p.product_quantity
            FROM 
                products p
            LEFT JOIN 
                books b ON p.product_id = b.product_id
            LEFT JOIN 
                others_products op ON p.product_id = op.product_id
            WHERE 
                p.product_quantity > 0";

                    $stmt = sqlsrv_query($conn, $sql);

                    if ($stmt === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }

                    echo "<h2>Available Products</h2>";
                    echo "<table id='availableProducts'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
            </tr>";
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>
                <td>" . $row["product_id"] . "</td>
                <td>" . $row["product_name"] . "</td>
                <td>" . $row["product_quantity"] . "</td>
              </tr>";
                    }
                    echo "</table>";
                } elseif ($query_type == "total_inventory_value") {
                    $sql = "SELECT SUM(product_quantity * product_price) AS total_inventory_value FROM products";
                    $stmt = sqlsrv_query($conn, $sql);

                    if ($stmt === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }

                    $row = sqlsrv_fetch_array($stmt);
                    echo "<p>Total Inventory Value: $" . $row["total_inventory_value"] . "</p>";
                } elseif ($query_type == "low_inventory_products") {
                    // Hiển thị biểu mẫu nhập giá trị ngưỡng số lượng
                    echo "<form action='inventory.php' method='post'>";
                    echo "<label for='quantity_threshold'>Enter Quantity Threshold:</label>";
                    echo "<input type='number' name='quantity_threshold' id='quantity_threshold' min='1' value='10'>";
                    echo "<input type='hidden' name='query' value='low_inventory_products'>";
                    echo "<input type='submit' value='Submit'>";
                    echo "</form>";

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["query"] == "low_inventory_products") {
                        $quantity_threshold = isset($_POST["quantity_threshold"]) ? $_POST["quantity_threshold"] : 10;

                        $sql = "SELECT 
                    p.product_id,
                    CASE
                        WHEN b.book_name IS NOT NULL THEN b.book_name
                        WHEN op.others_product_name IS NOT NULL THEN op.others_product_name
                        ELSE 'Unknown'
                    END AS product_name,
                    p.product_price,
                    p.product_quantity
                FROM 
                    products p
                LEFT JOIN 
                    books b ON p.product_id = b.product_id
                LEFT JOIN 
                    others_products op ON p.product_id = op.product_id
                JOIN 
                    product_categories pc ON p.category_id = pc.category_id
                WHERE 
                    p.product_quantity < ?";

                        $params = array($quantity_threshold);
                        $stmt = sqlsrv_query($conn, $sql, $params);

                        if ($stmt === false) {
                            die(print_r(sqlsrv_errors(), true));
                        }
                        echo "<h2>Low Inventory Products (Quantity Below $quantity_threshold)</h2>";
                        echo "<table id='lowInventoryProducts'>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                </tr>";
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>
                    <td>" . $row["product_id"] . "</td>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["product_price"] . "</td>
                    <td>" . $row["product_quantity"] . "</td>
                  </tr>";
                        }
                        echo "</table>";
                    }
                }
            }

            sqlsrv_close($conn);
            ?>
        </main>
    </div>
    <script src="index.js"></script>
</body>

</html>