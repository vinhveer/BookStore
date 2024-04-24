<?php
// Include the connection file
include '../import/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if attendance data is submitted
    if(isset($_POST['attendance'])) {
        $attendance = $_POST['attendance'];

        // Prepare a statement for inserting attendance
        $stmt = $conn->prepare("INSERT INTO employee_attendance (employee_id, attendance_date) VALUES (?, CURDATE())");

        // Bind parameters and execute the statement for each employee
        $stmt->bind_param("i", $user_id);
        foreach($attendance as $user_id) {
            $stmt->execute();
        }

        // Close the statement
        $stmt->close();

        echo "Attendance submitted successfully.";
    } else {
        echo "No attendance data submitted.";
    }
} else {
    // Redirect to the index page if accessed directly
    header("Location: timekeeping.php");
    exit();
}

?>
