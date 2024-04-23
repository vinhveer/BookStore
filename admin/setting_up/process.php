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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["delete"])) {
        $notif_id = $_POST['notif_id'];
        $sql_delete_notif = "DELETE FROM notiffication where notif_id = $notif_id";
        $query_delete_notif = sqlsrv_query($conn, $sql_delete_notif);
        header ("location: setting_notification.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["edit"])) {
        $notif_id = $_POST['notif_id'];
        $title_notif = $_POST['title_notif'];
        $content_notif = $_POST['content_notif'];
        $sql_edit_notif = "UPDATE notiffication SET
        notif_title=N'$title_notif',
        notif_content=N'$content_notif',
        notif_date = GETDATE()
        WHERE notif_id = $notif_id";
        $query_edit_notif = sqlsrv_query($conn, $sql_edit_notif);
        header ("location: setting_notification.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["add"])) {
        $title_notif = $_POST['title_notif'];
        $content_notif = $_POST['content_notif'];
        $sql_add_notif = "INSERT INTO notiffication (notif_title, notif_content, notif_date)
        VALUES (N'$title_notif',N'$content_notif',GETDATE())";
        $query_add_notif = sqlsrv_query($conn, $sql_add_notif);
        header ("location: setting_notification.php");
    }
?>
