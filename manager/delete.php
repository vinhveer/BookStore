<?php
include '../import/connect.php';

// Check if user_id is set and not empty
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Attempt to delete user from users table
    $sql_delete_user = "DELETE FROM users WHERE user_id = ?";
    $params = array($user_id);
    $stmt_delete_user = sqlsrv_query($conn, $sql_delete_user, $params);

    if ($stmt_delete_user !== false) {
        echo "User deleted successfully.";
    } else {
        // Error handling
        echo "Error deleting user: " . print_r(sqlsrv_errors(), true);
    }

    // Free statement resources
    sqlsrv_free_stmt($stmt_delete_user);

    // Redirect back to the list page
    header("Location: list.php");
    exit();
} else {
    echo "Invalid user ID.";
}
?>
