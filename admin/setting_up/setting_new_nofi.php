<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo mới nhất - Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>Thông báo mới nhất</h2>
        <p>Xem danh sách các thông báo mới nhất từ hệ thống.</p>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Thông báo 1</h5>
                    <small>3 ngày trước</small>
                    <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                </div>
                <p class="mb-1">Đây là nội dung của thông báo 1.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Thông báo 2</h5>
                    <small>5 ngày trước</small>
                    <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                </div>
                <p class="mb-1">Đây là nội dung của thông báo 2.</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Thông báo 3</h5>
                    <small>1 tuần trước</small>
                    <small><span class="badge bg-primary rounded-pill">Mới</span></small>
                </div>
                <p class="mb-1">Đây là nội dung của thông báo 3.</p>
            </a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwu/LOeObNXk5r+O6J8kZd6TA+o5K6T1PiF2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha384-BcqZcP/K4L4MczWk9gZ5bdu9/Z26H/JtqvzDe95uqQzzQ49vJ6JsJL9a3kYnyC7b"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-h+LHAo4hCAe8vjsWH1m7kz2tWOh9G/xvc1Dvh6khSN1tzl4Ab2Xgwra1HakWx6xP"
        crossorigin="anonymous"></script>
    <!-- Your custom scripts here -->
    <script>
        // Add your JavaScript code here
    </script>
</body>

</html>
