<?php
    include '../../import/connect.php';
    session_start();
    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['sbm_add'])){
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['middle_name'] = $_POST['middle_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['date_of_birth'] = $_POST['date_of_birth'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['gender'] = $_POST['gender'];
    if(isset($_FILES['image_user']) && $_FILES['image_user']['error'] === UPLOAD_ERR_OK) {
        $image_user_tmp = $_FILES['image_user']['tmp_name'];
        $image_user = "assets/images/avatar/".$_FILES['image_user']['name'];
        move_uploaded_file($image_user_tmp, "../../".$image_user);
        $_SESSION['image_user'] = $image_user;
    } else {
        $_SESSION['image_user'] = ""; // Nếu không tải ảnh lên, gán giá trị rỗng cho trường ảnh
    }
    header("location: account_chose.php");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sbm'])) {
        $_SESSION['role'] = $_POST['sbm'];
        header("location: account_user_new.php");
        exit;
    }
    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['sbm_account_add'])){
        $first_name = $_SESSION['first_name'];
        $middle_name = $_SESSION['middle_name'];
        $last_name = $_SESSION['last_name'];
        $image = $_SESSION['image_user'];
        $birth = $_SESSION['date_of_birth'];
        $gender = $_SESSION['gender'];
        $address = $_SESSION['address'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql_check_username = "SELECT * FROM user_accounts WHERE username='$username'";
        $result_check_username = sqlsrv_query($connect, $sql_check_username);
        if ($row_result = sqlsrv_fetch_array($result_check_username) > 0) {

            $role = ($_GET['role_value']!=NULL)?$_GET['role_value']:"";
            $_SESSION['username_exists'] = true;
            header("location: account_user_new.php?role=$role");
        } else {
            if($_GET['role_value'] == NULL){
                if ($_SESSION['role'] == "1") {
                    $sql_new = "EXEC InsertNewUser ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
                } else if ($_SESSION['role'] == "2") {
                    $sql_new = "EXEC InsertNewUser_admin ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
                } else if ($_SESSION['role'] == "3") {
                    $sql_new = "EXEC InsertNewUser_employee ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
                } else if ($_SESSION['role'] == "4") {
                    $sql_new = "EXEC InsertNewUser_warehouse ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
                } else if ($_SESSION['role'] == "5") {
                    $sql_new = "EXEC InsertNewUser_manager ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
                } else {
                    echo "Lỗi role không tồn tại: " . sqlsrv_errors($dbconnect);
                }
            }else if($_GET['role_value'] == 1){
                $sql_new = "EXEC InsertNewUser ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
            }else if($_GET['role_value'] == 2){
                $sql_new = "EXEC InsertNewUser_admin ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
            }else if($_GET['role_value'] == 3){
                $sql_new = "EXEC InsertNewUser_employee ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
            }else if($_GET['role_value'] == 4){
                $sql_new = "EXEC InsertNewUser_warehouse ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
            }else if($_GET['role_value'] == 5){
                $sql_new = "EXEC InsertNewUser_manager ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
                    $params = array(
                        $first_name, $middle_name, $last_name,
                        $birth, $gender, $email, $address,
                        $phone, $image, $username, $password);
                    $insert_result = sqlsrv_query($connect, $sql_new, $params);
            }else {
                echo "Lỗi role không tồn tại: " . sqlsrv_errors($dbconnect);
            }


            if ($insert_result === false) {
                die( print_r( sqlsrv_errors(), true));
            } else {
                unset($_SESSION['first_name']);
                unset($_SESSION['middle_name']);
                unset($_SESSION['last_name']);
                unset($_SESSION['gender']);
                unset($_SESSION['date_of_birth']);
                unset($_SESSION['phone']);
                unset($_SESSION['email']);
                unset($_SESSION['address']);
                unset($_SESSION['image_user']);
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                if($_GET['role_value'] == NULL){
                    header('Location:index.php');
                }else{
                    header('Location:account_group.php');
                }
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sbm_group_add'])) {
        $role_id = $_GET['role'];
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['middle_name'] = $_POST['middle_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['date_of_birth'] = $_POST['date_of_birth'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['address'] = $_POST['address'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['gender'] = $_POST['gender'];
        if(isset($_FILES['image_user']) && $_FILES['image_user']['error'] === UPLOAD_ERR_OK) {
            $image_user_tmp = $_FILES['image_user']['tmp_name'];
            $image_user = "assets/images/avatar/".$_FILES['image_user']['name'];
            move_uploaded_file($image_user_tmp, "../../".$image_user);
            $_SESSION['image_user'] = $image_user;
        } else {
            $_SESSION['image_user'] = ""; // Nếu không tải ảnh lên, gán giá trị rỗng cho trường ảnh
        }
        header("location: account_user_new.php?role=$role_id");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sbm_edit"])) {
        $user_id = $_GET['user_id'];
        $sql_update = "SELECT *
        FROM users u
        INNER JOIN user_roles ur ON u.user_id = ur.user_id
        INNER JOIN roles r ON ur.role_id = r.role_id
        INNER JOIN user_accounts ua on ua.user_role_id = ur.user_role_id
        where u.user_id=$user_id";
        $query_update = sqlsrv_query($connect, $sql_update);
        $row_update = sqlsrv_fetch_array($query_update);
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(isset($_FILES['image_user']) && $_FILES['image_user']['error'] === UPLOAD_ERR_OK) {
            $image_user_tmp = $_FILES['image_user']['tmp_name'];
            $image_user = "assets/images/avatar/".$_FILES['image_user']['name'];
            move_uploaded_file($image_user_tmp, "../../".$image_user);
            $_SESSION['image_user'] = $image_user;
        } else {
            $_SESSION['image_user'] = ""; // Nếu không tải ảnh lên, gán giá trị rỗng cho trường ảnh
        }

        if ($_SESSION['image_user'] == NULL) {
            $image = $row_update['image_user'];
        }else{
            $image = $_SESSION['image_user'];
        }

        $sql_edit_user = "UPDATE users
        SET first_name = '$first_name',
            middle_name = '$middle_name',
            last_name = '$last_name',
            date_of_birth = '$birth',
            gender = $gender,
            address = '$address',
            phone = '$phone',
            email = '$email',
            image_user = '$image'
        WHERE user_id = $user_id;

        UPDATE user_accounts
        SET username = '$username',
            password = '$password'
        WHERE user_role_id IN (SELECT user_role_id FROM user_roles WHERE user_id = $user_id);";
        $query_update_user = sqlsrv_query($connect, $sql_edit_user);
        if ($query_update_user === false) {
            die( print_r( sqlsrv_errors(), true));
        } else {
            $edit = $_GET['edit'];
            if($edit == 0) header ('location: index.php' );
            if($edit == 1) header ('location: account_group.php' );
        }
    }

?>
