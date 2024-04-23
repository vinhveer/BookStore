<?php
    include '../../import/connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn_send"])) {
        $support_id = $_POST['supportId'];
        $title_feedback = $_POST['Tilte_feedback'];
        $content_feedback = $_POST['Content_feedback'];
        $sql_feedback = "INSERT INTO feedback(title_feedback, content_feedback, date_time_feedback, support_id)
        VALUES (N'$title_feedback',N'$content_feedback',GETDATE(),'$support_id')";
        $query_feedback = sqlsrv_query($conn,$sql_feedback);
        header ("location:setting_support.php");
    }
    if ( isset($_GET["support_id"])) {
        $support_id = $_GET['support_id'];
        header ("location: setting_support.php?support_id=$support_id");
    }
?>
