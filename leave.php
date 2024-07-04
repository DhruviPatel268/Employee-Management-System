<?php
// Connection to the database
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "adduser";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Check if the form is submitted for applying leave
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure $_SESSION['username'] is set before using it
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    if (!empty($username)) {
        // Get the user's leave count
        $leave_query = "SELECT 'leave' FROM users WHERE username='$username'";
        $leave_result = mysqli_query($conn, $leave_query);
        if ($leave_row = mysqli_fetch_assoc($leave_result)) {
            $leave = $leave_row['leave'];
            
            // Check if the leave count is greater than 0
            if ($leave > 0) {
                // Insert leave application into the database
                $leave_reason = $_POST["leave_reason"];
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];

                // SQL query to insert leave application
                $sql = "INSERT INTO leaves (username, leave_reason, start_date, end_date, status) VALUES ('$username', '$leave_reason', '$start_date', '$end_date', 'Pending')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: leaveApplied.php"); // Redirect to success page
                    exit(); // Ensure script execution stops after redirection
                } else {
                    echo "Sorry, there was an error applying for leave.";
                }
            } else {
                echo "Sorry, you have no remaining leave balance.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "Username not set. Please log in again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Leave</title>
    <link rel="stylesheet" href="leave-style.css?v=<?php echo time(); ?>">
</head>

<body>
    <section class="container">
        <form action="" method="POST">
            <h3>Apply for Leave</h3>
            <div class="reason">
                <label for="leave_reason">Leave Reason:</label><br>
                <textarea id="leave_reason" name="leave_reason" rows="4" cols="50"></textarea><br>
            </div>
            <div class="start-date">
                <label for="start_date">Start Date:</label><br>
                <input type="date" id="start_date" name="start_date"><br>
            </div>
            <div class="end-date">
                <label for="end_date">End Date:</label><br>
                <input type="date" id="end_date" name="end_date"><br><br>
            </div>
            <input type="submit" value="Apply">
            <br>
            <a href="user.php">Go back to Dashboard</a>
        </form>
    </section>
</body>

</html>
