<?php
$insert = false;
$update = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "adduser";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  if (isset( $_POST['idEdit'])){
    // Update the record
      $id = $_POST["idEdit"];
      $name = $_POST["nameEdit"];
  
    // Sql query to be executed
      $sql = "UPDATE `users` SET `name` = '$name' , WHERE `users`.`id` = $id";
      $result = mysqli_query($conn, $sql);
      if($result){
      $update = true;
      }
      else{
          echo "We could not update the record successfully";
      }
  }else {
      // Insert a new user into the database
      $name = $_POST["name"];
      $email = $_POST["email"];
      $age = $_POST["age"];
      $phone = $_POST["phone"];
      $joinDate = $_POST["joinDate"];
      $country = $_POST["country"];
      $role = $_POST["role"];
      $salary = $_POST["salary"];
  
  
      $sql = "INSERT INTO `users` (`name`, `email`,`age`,`phone`,`joinDate`,`country`,`role`,`salary`) VALUES ('$name', '$email','$age','$phone','$joinDate','$country','$role','$salary')";
      $result = mysqli_query($conn, $sql);
  
  
      if($result){ 
          $insert = true;
      }
      else{ echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
  }
}
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="success_style.css?v=<?php echo time(); ?>">
    <title>User Added</title>
    <style>
    </style>
</head>
<body>
    <div class="hole-div">
        <div class="close-btn-div">
            <button class="button" onclick='window.location.href="Home.php";'>
                <span class="X"></span>
                <span class="Y"></span>
                <div class="close">Close</div>
            </button>
        </div>
        <div class="container">
            <h1>Leave applied successfully</h1>
        </div>
    </div>
</body>
</html>


<?php
// Redirect to another page
header('/Project/adduser.php');
exit(); // Make sure to exit after the redirect
?>