<?php
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

// Check if the form is submitted for updating user information
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idEdit'])) {
    // Update the record
    $EMP_ID = $_POST["idEdit"];
    $name = $_POST["nameEdit"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];
    $salary = $_POST["salary"];

    
    // Make sure to escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $role = mysqli_real_escape_string($conn, $role);
    $salary = mysqli_real_escape_string($conn, $salary);

    // SQL query to be executed
    $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email',`phone` = '$phone',`role` = '$role', `salary` = '$salary'  WHERE `EMP_ID` = $EMP_ID";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        $update = true;
    } else {
        echo "We could not update the record successfully";
    }
}

// Initialize $delete variable
$delete = false;

// Check if the form is submitted for deleting a user
if(isset($_GET['delete'])){
    $EMP_ID = $_GET['delete'];
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
    <!-- <link rel="stylesheet" href<?php echo time(); ?>"> -->
</head>
<style>
    /* Your corrected CSS here */
.container {
    background: rgba(255, 255, 255, 0.823);
    /* Set a semi-transparent white background */
    backdrop-filter: blur(10px);
    /* Apply a blur effect to the background */
    border-radius: 15px;
    /* Rounded corners */
    padding: 30px;
    padding-right: 90px;
    text-align: center;
}

/* Center the container vertically and horizontally */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    /* Ensure full viewport height */
    background-color: rgb(233, 233, 233);
}

.table td {
    position: relative;
}

/* Adjust the positioning of the delete button */
.table td a.btn-danger {
    position: absolute;
    right: 0;
    bottom: 0;
    margin: 5px;
}

.button {
    position: relative;
    width: 4em;
    height: 4em;
    border: none;
    background: rgba(31, 14, 18, 0.11);
    border-radius: 5px;
    transition: background 0.5s;
    cursor: pointer;
    margin-top: 0px;
}

.X {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 2em;
    height: 1.5px;
    background-color: rgb(255, 255, 255);
    transform: translateX(-50%) rotate(45deg);
}

.Y {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 2em;
    height: 1.5px;
    background-color: #fff;
    transform: translateX(-50%) rotate(-45deg);
}

.close-btn-div {
    position: absolute;
    top: 20px;
    right: 20px;
}

.close {
    display: flex;
    padding: 0.8rem 1.5rem;
    align-items: center;
    justify-content: center;
    width: 3em;
    height: 1.7em;
    font-size: 12px;
    background-color: rgb(19, 22, 24);
    color: rgb(187, 229, 236);
    border: none;
    border-radius: 3px;
    pointer-events: none;
    opacity: 0;
}

.button:hover {
    background-color: rgb(211, 21, 21);
}

.button:active {
    background-color: rgb(130, 0, 0);
}

.button:hover > .close {
    animation: close 0.2s forwards 0.25s;
}

.table td a.btn-danger {
    margin-right: -50px; /* Add margin to separate the delete button from the save button */
}

@keyframes close {
    100% {
        opacity: 1;
    }
}

    </style>
<body>

<div class="hole-div">
        <div class="close-btn-div">
            <button class="button" onclick='window.location.href="Home.php";'>
                <span class="X"></span>
                <span class="Y"></span>
                <div class="close">Close</div>
            </button>
        </div>
</div>
<?php
// Display success message after user deletion
if($delete) {
    header("Location: delete_success.php");
}
?>


<div class="container my4">
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">EMP ID</th>
            <th scope="col">NAME</th>
        </tr>
        </thead>

        <tbody>
        <?php
        // Fetch users from the database and display them in a table
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <th scope='row'>". $row['EMP_ID'] . "</th>
                    <td>". $row['name'] . "</td>
                    
                    <td>
                        <form method='post' action='/Project/edit_success.php'>
                            <input type='hidden' name='idEdit' value='". $row['EMP_ID'] . "'>
                            <input type='text' name='nameEdit' value='". $row['name'] . "'>
                            <input type='text' name='email' value='". $row['email'] . "'>
                            <input type='text' name='phone' value='". $row['phone'] . "'>
                            <input type='text' name='role' value='". $row['role'] . "'>
                            <input type='text' name='salary' value='". $row['salary'] . "'>
                            <button type='submit' class='btn btn-sm btn-primary'>Save</button>
                        </form>
                        <a href='?delete=". $row['EMP_ID'] ."' class='btn btn-sm btn-danger'>Delete</a>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
