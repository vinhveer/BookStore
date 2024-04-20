<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Account</title>

    <?php include '../../../import/libary.php'; ?>

    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand align-items-center d-flex" href="../../index.php">
                <img src="../../../assets/images/logo/light_theme_logo.png" class="logo">
                <h6>Account Settings</h6>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="book.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stationery.php">Statistics</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="../../../assets/images/avatar/avatar1.png" alt="" srcset="" class="avatar_navbar">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="d-flex p-3">
                                <img src="../../../assets/images/avatar/avatar1.png" alt="" srcset=""
                                    class="avatar_dropdown">
                                <div class="acc_content px-3">
                                    <h5>Trần Thanh Trí</h5>
                                    <p>tritt13579@gmail.com</p>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="mb-2" style="padding-left: 15px;">Order</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action list-group-item-light active_item"><a
                            href="#personal-info">Order purchased</a></li>
                    <li class="list-group-item list-group-item-action list-group-item-light"><a
                            href="#shipping-address">Order status</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <section id="personal-info">
                    <div class="container mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 style="margin-bottom: 0px">Profile information</h4>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-end">Edit</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

</body>

</html>