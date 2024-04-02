<?php
include_once ('layout.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt cấu hình hệ thống</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom styles go here */
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-4 mb-5 text-center">Cài đặt cấu hình hệ thống</h2>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="languageSelect">Ngôn ngữ:</label>
                        <select class="form-control" id="languageSelect">
                            <option value="en">English</option>
                            <option value="vn">Vietnamese</option>
                            <option value="fr">French</option>
                            <!-- More options can be added -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="timezoneSelect">Múi giờ:</label>
                        <select class="form-control" id="timezoneSelect">
                            <option value="utc+0">UTC+0</option>
                            <option value="utc+1">UTC+1</option>
                            <option value="utc+2">UTC+2</option>
                            <!-- More options can be added -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="themeSelect">Giao diện:</label>
                        <select class="form-control" id="themeSelect">
                            <option value="light">Sáng</option>
                            <option value="dark">Tối</option>
                            <!-- More options can be added -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="graphicQuality">Chất lượng đồ họa:</label>
                        <select class="form-control" id="graphicQuality">
                            <option value="low">Thấp</option>
                            <option value="medium">Trung bình</option>
                            <option value="high">Cao</option>
                            <!-- More options can be added -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fontSelect">Font chữ:</label>
                        <select class="form-control" id="fontSelect">
                            <option value="arial">Arial</option>
                            <option value="times new roman">Times New Roman</option>
                            <option value="calibri">Calibri</option>
                            <!-- More options can be added -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="connectionType">Kết nối:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="connectionType" id="wifi" value="wifi" checked>
                            <label class="form-check-label" for="wifi">
                                Wifi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="connectionType" id="ethernet" value="ethernet">
                            <label class="form-check-label" for="ethernet">
                                Ethernet
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logoUpload">Logo:</label>
                        <input type="file" class="form-control-file" id="logoUpload">
                    </div>
                    <div class="form-group">
                        <label for="brightnessRange">Độ sáng màn hình:</label>
                        <input type="range" class="form-control-range" id="brightnessRange" min="0" max="100" value="50">
                    </div>
                </div>
            </div>
            <!-- More configuration options can be added -->
            <button type="submit" class="btn btn-primary">Lưu cài đặt</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
