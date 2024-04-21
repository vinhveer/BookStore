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
    <script>
        function searchProducts() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productsTable");
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

        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("productsTable");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("td")[n];
                    y = rows[i + 1].getElementsByTagName("td")[n];
                    /* Check if the two rows should switch place,
                    based on the direction, asc or desc: */
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /* If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again. */
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
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
            <li  class="active"><a href="category.php"><i class='bx bxs-category'></i>Category</a></li>
            <li><a href="analytics.php"><i class='bx bx-analyse'></i>Analytics</a></li>
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
                <!-- <span class="count">12</span> -->
            </a>
            <a href="#" class="profile">
                <img src="images/logo.jpg">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>Category</h1>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="category.php" class="active">Category</a></li>
                        <li>/</li>
                        <li><a href="analytics.php">Analytics</a></li>
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
            <form action="" method="post">
                <label for="category">Select Category:</label>
                <select name="category" id="category">
                    <?php
                    $sql = "SELECT category_id, category_name FROM product_categories";
                    $stmt = sqlsrv_query($conn, $sql);

                    if ($stmt === false) {
                        die(print_r(sqlsrv_errors(), true));
                    }

                    // Loop through categories and create options for select dropdown
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Submit">
            </form>

            <?php
// Kết nối tới cơ sở dữ liệu và các tập tin cần thiết

// Xử lý khi người dùng chọn danh mục sản phẩm và gửi biểu mẫu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category"])) {
    $category_id = $_POST["category"];

    // Truy vấn để lấy các sản phẩm thuộc danh mục đã chọn
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
            WHERE 
                p.category_id = ?";

    $params = array($category_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Hiển thị bảng sản phẩm
    echo "<h2>Products in Selected Category</h2>";
    echo "<label for='searchInput'>Search Products:</label>";
    echo "<input type='text' id='searchInput' onkeyup='searchProducts()' placeholder='Search for product names..'><br>";
    echo "<table id='productsTable'>";
    echo "<tr>
            <th><button onclick='sortTable(0)'>Product ID</button></th>
            <th><button onclick='sortTable(1)'>Product Name</button></th>
            <th><button onclick='sortTable(2)'>Product Price</button></th>
            <th><button onclick='sortTable(3)'>Product Quantity</button></th>
            <th>Actions</th>
        </tr>";

    // Hiển thị dữ liệu từ truy vấn vào bảng
    $totalQuantity = 0;
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo "<tr>
                <td>" . $row["product_id"] . "</td>
                <td>" . $row["product_name"] . "</td>
                <td>" . $row["product_price"] . "</td>
                <td>" . $row["product_quantity"] . "</td>
                <td><a href='edit_product.php?product_id=" . $row["product_id"] . "'>Edit</a></td>
            </tr>";
        $totalQuantity += $row["product_quantity"];
    }
    echo "</table>";
    echo "<p>Total: " . $totalQuantity . "</p>";
}
?>
        </main>
    </div>
    <script src="index.js"></script>
</body>

</html>