<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <?php include '../import/libary.php'; ?>

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .logo {
            margin: 0 auto;
            margin-top: 30px;
            width: 250px;
        }

        .logo img {
            width: 50%;
        }

        .logo p {
            font-size: 16px;
            color: #6c757d;
            padding-top: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            appearance: none;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="../assets/images/logo/light_theme_logo.png" alt="logo" class="logo">
        <p>Please enter your information into the following form to register for an account.</p>
        <div class="mt-3 text-center">
            <p>Already have an account? <a href="../sign_in.php" class="btn-secondary">Sign in</a></p>
        </div>
    </div>

    <div class="container">
        <h3>Register</h3>
        <hr>
        <form action="process.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                    name="password" required>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="first_name"
                    placeholder="Enter your first name" required>
            </div>
            <div class="mb-3">
                <label for="middleName" class="form-label">Middle name</label>
                <input type="text" class="form-control" id="middleName" name="middle_name"
                    placeholder="Enter your middle name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="last_name"
                    placeholder="Enter your last name" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">Select your gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                    <option value="2">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label">Date of birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
                    required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload profile picture</label>
                <input class="form-control" type="file" name="image_user" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
</body>

</html>