<?php
include '../import/connect.php';

function SetLoginSession($conn, $username_email, $password)
{
    $sql_user_info = "SELECT us.user_id, us.first_name, us.middle_name, us.last_name, us.email, us.image_user FROM user_accounts ua
        INNER JOIN user_roles ur ON ua.user_role_id = ur.user_role_id
        INNER JOIN users us ON us.user_id = ur.user_id
        WHERE (email = ? OR username = ?) AND password = ?";

    // Prepare the statement
    $stmt = sqlsrv_prepare($conn, $sql_user_info, array(&$username_email, &$username_email, &$password));

    // Execute the statement
    $result_user = sqlsrv_execute($stmt);

    // Fetch the result
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($row) {
        // Start session
        session_start();

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['middle_name'] = $row['middle_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['image_user'] = $row['image_user'];

        // // Check if "Remember me" is set
        // if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
        //     // Set cookie
        //     $cookie_name = 'user_credentials';
        //     $cookie_value = base64_encode($username_email . ':' . $password);
        //     setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days expiration
        // }
    }
}

if (isset($_POST['login']))
{
    $username_email = $_POST['username_email'];
    $password =  $_POST['password'];
    $remember_me = $_POST['remember_me'];
    
    // Replace 'phuonghn@sso.edu.vn' and 'password789' with actual user input
    $sql = "DECLARE @loginResult VARCHAR(50);
        SET @loginResult = dbo.CheckLogin(?, ?);
        SELECT @loginResult AS LoginStatus";

    // Prepare the statement
    $stmt = sqlsrv_prepare($conn, $sql, array(&$username_email, &$password));

    // Execute the statement
    $result = sqlsrv_execute($stmt);

    // Fetch the result
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $loginStatus = $row['LoginStatus'];
    
    switch ($loginStatus) {
        case 'customer':
            SetLoginSession($conn, $username_email, $password);
            header('Location: ../customer/index.php');
            exit();
        
        case 'admin':
            SetLoginSession($conn, $username_email, $password);
            header('Location: ../admin/index.php');
            exit();

        case 'employee':
            SetLoginSession($conn, $username_email, $password);
            header('Location: ../employee/index.php');
            exit();

        case 'warehouse':
            SetLoginSession($conn, $username_email, $password);
            header('Location: ../warehouse/index.php');
            exit();
        
        case 'manager':
            SetLoginSession($conn, $username_email, $password);
            header('Location: ../manager/index.php');
            exit();

        default:
            header('Location: sign_in.php');
            break;
    }  
}

if (isset($_POST['register'])) {
    // Lưu thông tin vào session
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['middle_name'] = $_POST['middle_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['date_of_birth'] = $_POST['date_of_birth'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['gender'] = $_POST['gender']; // Thêm giới tính vào session
    
    // Kiểm tra xem người dùng đã tải lên ảnh hay chưa
    if(isset($_FILES['image_user']) && $_FILES['image_user']['error'] === UPLOAD_ERR_OK) {
        $image_user_tmp = $_FILES['image_user']['tmp_name'];
        $image_user = $_FILES['image_user']['name'];
        move_uploaded_file($image_user_tmp, "path_to_your_upload_directory/".$image_user);
        $_SESSION['image_user'] = $image_user;
    } else {
        $_SESSION['image_user'] = ""; // Nếu không tải ảnh lên, gán giá trị rỗng cho trường ảnh
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gọi stored procedure để thêm người dùng mới
    $sql = "EXEC InsertNewUser ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?"; // Bổ sung thêm một tham số cho giới tính
    $params = array(
        $_SESSION['first_name'],
        $_SESSION['middle_name'],
        $_SESSION['last_name'],
        $_SESSION['date_of_birth'],
        $_SESSION['gender'],
        $_SESSION['email'],
        $_SESSION['address'],
        $_SESSION['phone'],
        $_SESSION['image_user'],
        $username,
        $password
    );
    
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die( print_r( sqlsrv_errors(), true));
    } else {
        header('Location: sign_in.php');
    }
}