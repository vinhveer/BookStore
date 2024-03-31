<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore - Trang chủ</title>
    <?php include 'import/libary.php'; ?>
    <link rel="stylesheet" href="index.css">
</head>

<body class="vh-100 overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <a class="navbar-brand me-5" href="#">Navbar</a>
                </div>
                <div class="col justify-content-center">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" width="100%"
                            placeholder="Tìm kiếm sách, tác giả và hơn thế nữa ..." aria-label="Search">
                        <button class="btn btn-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <a href="#sign-up" class="btn btn-primary float-end">Đăng ký</a>
                <a href="#login" class="btn btn-outline-primary text-white mx-2 float-end">Đăng nhập</a>
            </div>
        </div>
    </nav>
</body>

</html>