<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết liên hệ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Thông tin chi tiết liên hệ</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Phần mềm quản lý nhà sách và văn phòng phẩm</h5>
                        <p class="card-text">Dưới đây là thông tin chi tiết liên hệ:</p>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fas fa-envelope"></i> Email: contact@example.com</li>
                            <li class="list-group-item"><i class="fab fa-facebook"></i> Facebook: <a
                                    href="https://www.facebook.com/example">example</a></li>
                            <li class="list-group-item"><i class="fab fa-twitter"></i> Twitter: <a
                                    href="https://twitter.com/example">@example</a></li>
                            <li class="list-group-item"><i class="fab fa-google"></i> Google Mail: <a
                                    href="mailto:contact@example.com">contact@example.com</a></li>
                            <li class="list-group-item"><i class="fab fa-instagram"></i> Instagram: <a
                                    href="https://www.instagram.com/example">@example</a></li>
                        </ul>
                        <a href="setting_info.php" class="btn btn-primary mt-3"><i class="fas fa-arrow-left"></i> Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-A5CRzWPsHvMOZTw0H9GtMh9VvAsVTnFhATNx9t6pXH67NgEgSP9b5qBtFAq5HKSZ"
        crossorigin="anonymous"></script>
</body>

</html>
