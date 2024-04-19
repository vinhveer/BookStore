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
            <div class="logo-name"><span>A</span>Warehouse</div>
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
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Product</h3>
                        <input type="search" placeholder="Search ID...">
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/profile_1.jpg">
                                    <p>ID pro 1</p>
                                </td>
                                <td>name pro 1</td>
                                <td>price</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile_1.jpg">
                                    <p>ID pro 2</p>
                                </td>
                                <td>name pro 2</td>
                                <td>price</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile_1.jpg">
                                    <p>ID pro 3</p>
                                </td>
                                <td>name pro 3</td>
                                <td>price</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile_1.jpg">
                                    <p>ID pro 4</p>
                                </td>
                                <td>name pro 4</td>
                                <td>price</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile_1.jpg">
                                    <p>ID pro 5</p>
                                </td>
                                <td>name pro 5</td>
                                <td>price</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Reminders -->
                <div class="reminders">
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




