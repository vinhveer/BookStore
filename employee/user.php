<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user.css">
    <title>Amazon Bookstore</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span></span>Employee</div>
        </a>
        <ul class="side-menu">
            <li><a href="orders.php"><i class='bx bx-store-alt'></i>Orders</a></li>
            <li  class="active"><a href="#"><i class='bx bx-group'></i>User</a></li>
            <li><a href="salary.php"><i class='bx bx-coin-stack' ></i>Salary</a></li>
            <li><a href="revenue.php"><i class='bx bxs-bar-chart-alt-2'></i></i>Revenue</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Message</a></li>

            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
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
                    <h1>Amazon</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Amazon
                            </a></li>
                        /
                        <li><a href="#" class="active">User</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->

            <div class="bottom-data">
                <div class="orders" id="product-table">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Product</h3>
                        <form action="">
                            <input type="search" name="search" placeholder="Search ID...">
                            <button type="submit" name="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kết nối CSDL
                            include_once '../import/connect.php';


                        // Kiểm tra kết nối
                        if (!$conn) {
                            echo "Kết nối đến CSDL thất bại: " . sqlsrv_errors();
                        } else {
                            // Xử lý tìm kiếm
                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                $search_id = $_GET['search'];
                                $sql = "SELECT p.product_id, p.product_price,
                                            CASE
                                                WHEN b.book_name IS NOT NULL THEN b.book_name
                                                ELSE op.others_product_name
                                            END AS product_name
                                        FROM products p
                                        LEFT JOIN books b ON p.product_id = b.product_id
                                        LEFT JOIN others_products op ON p.product_id = op.product_id
                                        WHERE p.product_id = ?";
                                $params = array($search_id);
                            } else {
                                $recordsPerPage = 12;
                                $sql_count = "SELECT COUNT(*) AS total_product FROM products";
                                $result_count = sqlsrv_query($conn, $sql_count);
                                $row_count = sqlsrv_fetch_array($result_count);
                                $totalRecords = $row_count['total_product'];
                                $totalPages = ceil($totalRecords / $recordsPerPage);
                                if (!isset($_GET['page'])) {
                                    $currentPage = 1;
                                } else {
                                    $currentPage = $_GET['page'];
                                }
                                // Mặc định hiển thị tất cả sản phẩm
                                $sql = "EXEC GetProductInformation $currentPage";
                                $params = array();
                            }

                            // Thực hiện câu truy vấn
                            $stmt = sqlsrv_query($conn, $sql,$params);

                            // Kiểm tra và hiển thị kết quả
                            if ($stmt === false) {
                                echo "Lỗi truy vấn: " . sqlsrv_errors();
                            } else {
                                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['product_id'] . "</td>";
                                    echo "<td>" . $row['product_name'] . "</td>";
                                    echo "<td>" . $row['product_price'] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                    <div aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <div class="pagination">
                                    <?php
                                    if (!isset($_GET['search']) && empty($_GET['search'])) {
                                        if ($totalPages > 1) {
                                        // Hiển thị ô đầu tiên
                                        echo '<a href="user.php?page=1">1</a>';
                                        // Nếu trang hiện tại lớn hơn 3, hiển thị dấu ... ở đầu
                                        if ($currentPage > 3) {
                                            echo '<span>...</span>';
                                        }

                                        // Hiển thị các ô trung tâm
                                        for ($i = max(2, $currentPage - 1); $i <= min($currentPage + 1, $totalPages - 1); $i++) {
                                            echo "<a href='user.php?page=$i'>$i</a>";
                                        }
                                        // Nếu trang hiện tại là trang cuối cùng hoặc gần cuối cùng, không hiển thị dấu ... ở cuối
                                        if ($currentPage < $totalPages - 2) {
                                            echo '<span>...</span>';
                                        }
                                        // Hiển thị ô cuối cùng
                                        echo "<a href='user.php?page=$totalPages'>$totalPages</a>";
                                    }}
                                    ?>
                            </div>
                        </ul>
                    </div>
                </div>

                <!-- Reminders -->
                <div class="reminders" id="sales-table">
                    <div class="sales">
                        <div class="header">
                            <i class='bx bx-note'></i>
                            <h3>Sales</h3>
                            <i class='bx bx-filter'></i>
                            <i class='bx bx-plus'></i>
                        </div>
                        <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>product 1</p>
                            </div>
                            <p>amout</p>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>product 2</p>
                            </div>
                            <p>amout</p>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>product 3</p>
                            </div>
                            <p>amout</p>
                        </li>
                        </ul>
                    </div>
                    <!-- Total Sales -->
                    <div class="total-sale">
                        <h2>Total sales: </h2>
                        <a href="#" class="report">
                            <i class='bx bx-dollar-circle' ></i>
                            <span>Pay</span>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="user.js"></script>
</body>
</html>
