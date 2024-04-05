<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cài đặt thông báo hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Cài đặt thông báo hệ thống</h2>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="notificationTitle" class="form-label">Tiêu đề thông báo</label>
                        <input type="text" class="form-control" id="notificationTitle" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="mb-3">
                        <label for="notificationContent" class="form-label">Nội dung thông báo</label>
                        <textarea class="form-control" id="notificationContent" rows="3"
                            placeholder="Nhập nội dung"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi thông báo</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Danh sách thông báo</h4>
                <ul class="list-group">
                    <!-- Dynamic content for notifications will be here -->
                    <li class="list-group-item">Thông báo 1</li>
                    <li class="list-group-item">Thông báo 2</li>
                    <li class="list-group-item">Thông báo 3</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwu/LOeObNXk5r+O6J8kZd6TA+o5K6T1PiF2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha384-BcqZcP/K4L4MczWk9gZ5bdu9/Z26H/JtqvzDe95uqQzzQ49vJ6JsJL9a3kYnyC7b"
        crossorigin="anonymous"></script>
</body>

</html>
