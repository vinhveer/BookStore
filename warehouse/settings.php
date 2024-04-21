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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Amazon Warehouse</title>
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
            <li><a href="inventory.php"><i class='bx bxs-store-alt'></i>Inventory</a></li>
            <li><a href="supplier.php"><i class='bx bxs-user-pin'></i>Supplier</a></li>
            <li class="active"><a href="settings.php"><i class='bx bx-cog'></i>Settings</a></li>
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

        <main style="background-color: #eeeeee; height:100%;">
            <div class="header">
                <div class="left">
                    <h1>Settings</h1>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li>/</li>
                        <li><a href="category.php">Category</a></li>
                        <li>/</li>
                        <li><a href="analytics.php">Analytics</a></li>
                        <li>/</li>
                        <li><a href="inventory.php">Inventory</a></li>
                        <li>/</li>
                        <li><a href="supplier.php">Supplier</a></li>
                        <li>/</li>
                        <li><a href="settings.php" class="active">Settings</a></li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </main>
    </div>
    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>