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

        a {
            text-decoration: none;
            color: #0d6fff;
        }

        .btn {
            background-color: #ffe100;
        }

        .btn:hover {
            background-color: #f7ca00;
        }

        .form-signin {
            width: 500px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin m-auto">
        <form action="process.php" method="post">
            <img class="mb-4" src="..\assets\images\logo\light_theme_logo.png" alt="" width="100px">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username or email address ..."
                    name="username_email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember_me" id="flexCheckDefault"
                    name="remember_me">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn w-100 py-2" type="submit" name="login">Sign in</button>
            <p class="py-2">New customer? <a href="sign_up.php">Start here.</a></p>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
        </form>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>