<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>employee-orders</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='employee.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: black; 
            z-index: 1000;
            overflow: hidden;
            padding-top: 50px; 
        }
        .logo img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }
        .sidebar-menu {
            padding-top: 20px; 
        }
        .sidebar-menu a {
            color: black;
            background-color: white; 
            padding: 10px 15px; 
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease; 
            border-radius: 30px; 
        }
        .sidebar-menu ul li{
            list-style: none;
            padding-bottom: 15px;
            padding-right: 15px;
        }
        .sidebar-menu ul{
            padding-top: 30px;
            padding-bottom: 70px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            font-weight: bold;
        }
        .sidebar-menu a .bi {
            font-size: 24px;
            margin-right: 10px; 
            font-weight: bold;
        }
        .sidebar-menu .logout {
            color: red; 
        }
        .sidebar-menu ul li.active a {
            color: rgb(224, 152, 19); 
        }
        .sidebar.close{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 103px;
            background-color: black; 
            z-index: 1000;
            overflow: hidden;
            padding-top: 50px; 
        }
        .sidebar.close .sidebar-menu a .bi{
            padding-right: 100px;
        }
        .navbar-nav .nav-link .bi {
            color: black;
            margin-right: 5px; 
        }
        .sidebar-menu a:hover {
            color: rgb(224, 152, 19);
        }
    </style>
    <script src='main.js'></script>
</head>
<body>
    <div class="container-fluid">
        <!--sidebar-->
        <div class="sidebar close">
            <div class="logo">
              <img src="logo/image.png" alt="">
            </div>
            <div class="sidebar-menu">
              <ul>
                  <li><a href="#"><i class="bi bi-person"></i>User</a></li>
                  <li class="active"><a href="#"><i class="bi bi-shop"></i>Sell</a></li>
                  <li><a href="#"><i class="bi bi-bell"></i>Notification</a></li>
                  <li><a href="#"><i class="bi bi-gear"></i>Settings</a></li>
                  <li><a href="#"><i class="bi bi-headset"></i>Support</a></li>
              </ul>
              <ul>
                    <li>
                        <a class="logout" href="#">
                        <i class="bi bi-box-arrow-left"></i>
                                Logout
                        </a>
                      </li>
                </ul>
              </div>
            </div>
        <!--end of sidebar-->
        <!--navbar-->
        <div class="navbar">
          <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-list"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-file-text"></i>Orders</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      All
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Waiting</a></li>
                      <li><a class="dropdown-item" href="#">Confirmed</a></li>
                      <li><a class="dropdown-item" href="#">Cancelled</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Search for orders</a>
                  </li>
                </ul>
                <form class="d-flex" style="margin-right: 400px;">
                  <input class="form-control me-2" type="search" placeholder="ID..." aria-label="Search">
                  <button class="btn btn-warning" type="submit">SEARCH</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"style="margin-right: 20px;">
                      <a class="nav-link" href="#"><i class="bi bi-truck"></i>Transport</a>
                  </li>
                  <li class="nav-item" style="margin-right: 20px;">
                      <a class="nav-link" href="#"><i class="bi bi-cash-coin"></i>Payment</a>
                  </li>
                  <li class="nav-item" style="margin-right: 20px;">
                      <a class="nav-link" href="#"><i class="bi bi-list-stars"></i>Feedback</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <!--end of navbar-->
        <!--content-->
        <div class="content" style="margin-left: 100px;">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Client ID</th>
                <th scope="col">Name</th>
                <th scope="col">State</th>
                <th scope="col">Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Mảng chứa các thông tin của đơn hàng
              $orders = array(
                  array("D4653", "0112", "Đức Ngạn", "waiting"),
                  array("D0870", "9873", "Vinh Veer", "confirmed"),
                  array("D4456", "1879", "Trà My", "cancelled"),
                  array("D7658", "0987", "Minh Tài", "cancelled"),
                  array("D6666", "0230", "Như Thủy", "confirmed"),
                  // Thêm các đơn hàng khác nếu cần
              );

              // Duyệt mảng và hiển thị thông tin đơn hàng
              foreach ($orders as $order) {
                  echo "<tr>";
                  echo "<th scope='row'>$order[0]</th>";
                  echo "<td>$order[1]</td>";
                  echo "<td>$order[2]</td>";
                  echo "<td>$order[3]</td>";
                  echo "<td><a href='#' style='color: rgb(224, 152, 19);'>Click to see</a></td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLE
