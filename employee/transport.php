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
            <li class="active"><a href="index.php"><i class='bx bx-store-alt' ></i>Home</a></li>
            <li><a href="#"><i class='bx bx-group'></i>User</a></li>
            <li><a href="#"><i class='bx bx-message-dots' ></i></i>Chat</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
            <li><a href="#"><i class='bx bx-headphone' ></i>Support</a></li>
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
                    <h1>Bookstore</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Home
                            </a>
                        </li>
                        /
                        <li><a href="#" class="active">Transport</a></li>
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
                <h2>Transporter</h2>
                <ul class="product">
                <li>
                    <img src="images/profile_1.jpg" alt="">
                    <span class="info">
                        <h3>
                            name of transporter
                        </h3>
                        <h4>
                            ID: 
                        </h4>
                        <h4>
                            Phone number:
                        </h4>
                        <h4>
                            Average rating:
                        </h4>
                        <span class="status fb">Feedback</span>
                    </span>
                </li>
            </ul>
            </div>
            <div class="update">
                <h2>Rating: </h2>
                <span class="status fivestars"><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i></span>
                <span class="status fourstars"><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i></span>
                <span class="status threestars"><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i></span>
                <span class="status twostars"><i class='bx bx-star' ></i><i class='bx bx-star' ></i></span>
                <span class="status onestars"><i class='bx bx-star' ></i></span>
            </div>
            </div>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
</body>
</html>