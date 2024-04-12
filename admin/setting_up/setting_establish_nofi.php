<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiết lập thông báo - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <h2>Thiết lập thông báo</h2>
    <p>Thiết lập cách và tính năng của hệ thống thông báo với người dùng.</p>

    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="notificationMethod" class="form-label">Phương thức thông báo</label>
                    <select class="form-select" id="notificationMethod">
                        <option selected>Chọn phương thức...</option>
                        <option>Email</option>
                        <option>Tin nhắn SMS</option>
                        <option>Thông báo trực tiếp trên ứng dụng</option>
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="enableNotification">
                    <label class="form-check-label" for="enableNotification">Bật thông báo tự động</label>
                </div>
                <div class="mb-3">
                    <label for="notificationFrequency" class="form-label">Tần suất thông báo</label>
                    <input type="number" class="form-control" id="notificationFrequency" placeholder="Nhập số giờ">
                    <small class="form-text text-muted">Nhập số giờ cách nhau giữa các thông báo (mặc định: 24 giờ).</small>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="notificationSound">
                        <label class="form-check-label" for="notificationSound">
                                Bật âm thanh thông báo
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                        <label for="notificationType" class="form-label">Loại thông báo</label>
                        <select class="form-select" id="notificationType">
                            <option selected disabled>Chọn loại thông báo</option>
                            <option value="1">Thông báo quan trọng</option>
                            <option value="2">Thông báo thường</option>
                            <option value="3">Thông báo khẩn cấp</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="sendToAll">
                        <label class="form-check-label" for="sendToAll">Gửi thông báo cho tất cả người dùng</label>
                    </div>
                <button type="submit" class="btn btn-primary">Lưu thiết lập</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwu/LOeObNXk5r+O6J8kZd6TA+o5K6T1PiF2"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha384-BcqZcP/K4L4MczWk9gZ5bdu9/Z26H/JtqvzDe95uqQzzQ49vJ6JsJL9a3kYnyC7b"
        crossorigin="anonymous"></script>
</body>
</html>
