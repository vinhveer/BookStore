<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="js/color_modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sign Out</title>

    <?php include '../import/libary.php'; ?>

    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            width: 500px;
            padding: 1rem;
        }

        .btn {
            background-color: #ffe100;
        }

        .btn:hover {
            background-color: #f7ca00;
        }
    </style>

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <?php
    session_start();
    session_destroy(); // Xóa session khi người dùng rời khỏi trang
    ?>

    <main class="form-signin m-auto">
        <form>
            <img class="mb-4" src="../assets/images/logo/light_theme_logo.png" alt="" width="100px">
            <h1 class="h3 mb-3 fw-normal">Goodbye, Tri.</h1>

            <p>You have been signed out successfully.</p>
            <a class="btn w-100 py-2" href="sign_in.php">Sign in Again</a>
            <p class="py-2">New to us? <a href="register.php">Register here.</a></p>  
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
