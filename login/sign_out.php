<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="js/color_modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Sign in</title>

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

    <main class="form-signin m-auto">
        <form>
            <img class="mb-4" src="..\assets\images\logo\light_theme_logo.png" alt="" width="100px">
            <h1 class="h3 mb-3 fw-normal">Bye bye! Tri.</h1>

            <p>Resign in now?</p>
            <a class="btn w-100 py-2" href="sign_in">Sign in</a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>