<?php
include '../import/connect.php';

if (isset($_POST['login']))
{
    $username_email = $_POST['username_email'];
    $password =  $_POST['password'];
    $remember_me = $_POST['remember_me'];
    
    // Sử dụng hàm sqlsrv_prepare để chuẩn bị câu lệnh SQL
    $sql = "DECLARE @loginResult VARCHAR(50)
    SET @loginResult = dbo.CheckLogin('phuonghn@sso.edu.vn', 'password789')
    PRINT @loginResult;";
    $loginResult = '';

    // Khởi tạo một biến output để lưu trữ kết quả trả về từ hàm
    $output = '';

    // Sử dụng hàm sqlsrv_prepare để chuẩn bị câu lệnh SQL
    $stmt = sqlsrv_prepare($conn, $sql, array(&$output, &$username_email, &$password));

    if( !$stmt ) {
        die( print_r( sqlsrv_errors(), true));
    }

    // Thực thi câu lệnh
    if( sqlsrv_execute($stmt) ) {
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $loginResult .= $row['loginResult'];
        }
    } else {
        echo "Thất bại khi thực thi câu lệnh.\n";
        die( print_r( sqlsrv_errors(), true));
    }

    echo $loginResult;
}