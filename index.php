<?php
$insert = false;
$update = false;
$delete = false;

// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "adduser";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

// Check if the form is submitted for deleting a user
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM `users` WHERE `EMP_ID` = $EMP_ID";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        $delete = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="button.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="success_style.css?v=<?php echo time(); ?>">
</head>

<body>

<div class="close-btn-div">
            <button class="button" onclick='window.location.href="Home.php";'>
                <span class="X"></span>
                <span class="Y"></span>
                <div class="close">Close</div>
            </button>
        </div>

<?php
// Display success message after user deletion
if($delete) {
    echo header("Location: Project/delete ");
}
?>


<div class="container my4">
    <table class="table" id="myTable">
        <tbody>
        <?php
        // Fetch users from the database and display them in a table
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            // Displaying fetched records in a table
            echo "<table border='1'>";
            echo "<tr><th>EMP id</th><th>Name</th><th>Email</th><th>Phone</th><th>Joining Date</th><th>Gender</th><th>Age</th><th>Role</th><th>Salary</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['EMP_ID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['joinDate'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
