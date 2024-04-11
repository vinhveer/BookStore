<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Amazon Employee</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bxl-amazon'></i>
            <div class="logo-name"><span>A</span>Employee</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="index.php"><i class='bx bx-store-alt' ></i>Sell</a></li>
            <li><a href="#"><i class='bx bx-headphone' ></i>Support</a></li>
            <li><a href="#"><i class='bx bx-group'></i>User</a></li>
            <li><a href="#"><i class='bx bx-message-dots' ></i></i>Chat</a></li>
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
                    <h1>Sell</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Sell
                            </a>
                        </li>
                        /
                        <li><a href="#" class="active">Orders</a></li>
                        /
                        <li><a href="#" class="active">ID: 001</a></li>
                    </ul>
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
                            1,999
                        </h3>
                        <p><a href="index2.php">Paid Order</a></p>
                    </span>
                </li>
                <li><i class='bx bx-book-content'></i>
                    <span class="info">
                        <h3>
                            3,999
                        </h3>
                        <p><a href="index1.php">Orders</a></p>
                    </span>
                </li>
                <li><i class='bx bxs-truck' ></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p><a href="index3.php">Transport</a></p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p><a href="index4.php">Total Sales</a></p>
                    </span>
                </li>
            </ul>
            <div class="order-content">
                <h2>Order detail</h2>
                <ul class="product">
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of product
                        </h3>
                        <h4>
                            amount
                        </h4>
                        <h4>
                            unit price
                        </h4>
                        <p>Total Prices</p>
                    </span>
                </li>
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of product
                        </h3>
                        <h4>
                            amount
                        </h4>
                        <h4>
                            unit price
                        </h4>
                        <p>Total Prices</p>
                    </span>
                </li>
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of product
                        </h3>
                        <h4>
                            amount
                        </h4>
                        <h4>
                            unit price
                        </h4>
                        <p>Total Prices</p>
                    </span>
                </li>
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of product
                        </h3>
                        <h4>
                            amount
                        </h4>
                        <h4>
                            unit price
                        </h4>
                        <p>Total Prices</p>
                    </span>
                </li>
            </ul>
            <h2 class="total">Total Sales: </h2>
            <div class="update">
                <h2>Update Status: </h2>
                <span class="status completed_update">Completed</span>
                <span class="status pending_update">Pending</span>
                <span class="status canceled_update">Canceled</span>
            </div>
            <h2>Customer</h2>
            <ul class="product">
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of customer
                        </h3>
                        <h4>
                            ID: 
                        </h4>
                        <h4>
                            Phone number:
                        </h4>
                        <h4>
                            Address:
                        </h4>
                    </span>
                </li>
            </ul>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>