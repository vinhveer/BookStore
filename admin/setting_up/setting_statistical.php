<?php
include_once 'layout.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-3">Tổng quan</h2>
        <div class=card>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-cloud-download me-1"></i>Downloads</h5>
                                <p class="card-text">1,252</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-cart4 me-1"></i>Sales</h5>
                                <p class="card-text">203</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-eye me-1"></i>Views</h5>
                                <p class="card-text">274,678</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-chat-dots me-1"></i>Messages</h5>
                                <p class="card-text">263,826</p>
                                 <!-- Icon for messages -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-1">
            <div class="card-body">
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <h3>Download</h3>
                        <canvas id="weeklyOverviewChart"></canvas>
                    </div>
                    <div class="col-lg-6">
                        <h3>Messages</h3>
                        <canvas id="messagesChart"></canvas>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <h3>Sales</h3>
                        <canvas id="salesChart"></canvas>
                    </div>
                    <div class="col-lg-6">
                        <h3>Views</h3>
                        <canvas id="viewsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>
        // JavaScript for initializing and updating charts can be added here
        // Example:
        var weeklyOverviewChart = new Chart(document.getElementById('weeklyOverviewChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Downloads',
                    data: [30, 40, 25, 35, 45, 20, 15],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var viewsChart = new Chart(document.getElementById('viewsChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Views',
                    data: [200, 250, 300, 350, 400, 450, 500],
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var messagesChart = new Chart(document.getElementById('messagesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Messages',
                    data: [50, 45, 60, 55, 70, 65, 80],
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
