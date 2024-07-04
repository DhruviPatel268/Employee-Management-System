<?php
session_start(); // Start session before using $_SESSION

// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "adduser";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Function to send email notification
function sendEmailNotification($to, $subject, $message) {
    // Send email using PHP mail function or a library like PHPMailer
    // Example using PHP mail function:
    mail($to, $subject, $message);
}

// Fetch leave requests with username and email from users table
$sql = "SELECT L.*, U.username, U.email FROM leaves L JOIN users U ON L.username = U.username";
$result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if (!$result) {
    die("Error fetching leave requests: " . mysqli_error($conn));
}

// Handle accepting or declining leave requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accept_leave'])) {
        $leave_id = $_POST['leave_id'];

        // Update leave status to 'Accepted'
        $update_sql = "UPDATE leaves SET status='Accepted' WHERE leave_id='$leave_id'";
        $update_result = mysqli_query($conn, $update_sql);
        
        if (!$update_result) {
            die("Error updating leave status: " . mysqli_error($conn));
        }

        // Decrement leave count for the user
        $user_query = "UPDATE users SET `leave` = `leave` - 1 WHERE username = (SELECT username FROM leaves WHERE leave_id='$leave_id')";
        $user_result = mysqli_query($conn, $user_query);
        
        if (!$user_result) {
            die("Error decrementing leave count: " . mysqli_error($conn));
        }

        // Fetch user email
        $user_email_query = "SELECT email FROM users WHERE username IN (SELECT username FROM leaves WHERE leave_id='$leave_id')";
        $user_email_result = mysqli_query($conn, $user_email_query);

        if (!$user_email_result) {
            die("Error fetching user email: " . mysqli_error($conn));
        }

        $user_email_row = mysqli_fetch_assoc($user_email_result);
        $user_email = $user_email_row['email'];

        // Send email notification to the user
        $subject = "Leave Application Status";
        $message = "Your leave application has been approved by HR.";
        sendEmailNotification($user_email, $subject, $message);
        
        // Redirect to prevent resubmission on refresh
        header("Location: accept-leave.php");
        exit();
    } elseif (isset($_POST['decline_leave'])) {
        $leave_id = $_POST['leave_id'];

        // Update leave status to 'Declined'
        $update_sql = "UPDATE leaves SET status='Declined' WHERE leave_id='$leave_id'";
        $update_result = mysqli_query($conn, $update_sql);

        if (!$update_result) {
            die("Error updating leave status: " . mysqli_error($conn));
        }
        
        // Redirect to prevent resubmission on refresh
        header("Location: accept-leave.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Leave Management</title>
    <link rel="stylesheet" href="leave-style.css">
</head>
<style>
    /* CSS for styling the table and form */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h3 {
    text-align: center;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

form {
    display: inline-block;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a {
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    color: #333;
}

a:hover {
    color: #000;
}

    </style>
<body>
    <h3>Leave Requests</h3>
    <table>
        <tr>
            <th>User name</th>
            <th>Email</th>
            <th>Leave Reason</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['leave_reason'] . "</td>";
            echo "<td>" . $row['start_date'] . "</td>";
            echo "<td>" . $row['end_date'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>";
            if ($row['status'] == 'Pending') {
                echo "<form method='post'>";
                echo "<input type='hidden' name='leave_id' value='" . $row['leave_id'] . "'>";
                echo "<input type='submit' name='accept_leave' value='Accept'>";
                echo "<input type='submit' name='decline_leave' value='Decline'>";
                echo "</form>";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="home.php">Go back to Dashboard</a>
</body>

</html>
