<?php

session_start();

// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "adduser";

$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

// Fetch user data
$name = $_SESSION['username'];
$sql = "SELECT * FROM `users` WHERE username='$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
}
//$user = mysqli_fetch_assoc($result);


?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Panel</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   <!-- <link rel="stylesheet" href="styles.css"> -->
   <style>
       /* Additional CSS for user details section */
       .user-details {
           margin-bottom: 20px;
           font-size: 18px;
           color: #333;
       }
       .user-details p {
           margin: 10px 0;
       }
       .user-details p strong {
           color: #555;
           font-weight: bold;
       }

       /* Your custom CSS */
       .user-details p {
           background-color: #f9f9f9;
           border: 1px solid #ccc;
           border-radius: 10px;
           padding: 20px;
           margin-bottom: 20px;
       }
   </style>
 </head>
 <body>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Leaves', 'Number'],
          ['Applied',     11],
          ['Pending',      5],

        ]);

        var options = {
          title: 'Leaves'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
     <div class="container">
     <!-- aside section start -->
       <aside>
       <div class="top">
        <div class="logo">
          <img src="logo.png" alt="Logo" class="logo-image" id="logo">
      </div>
       </div>
       <!-- end top -->
 
       <div class="sidebar">
       <a href=#>
         <span class="material-symbols-outlined">grid_view</span>
       <h3>DashBoard</h3>
       </a>
 
       <a href=# class="active">
         <span class="material-symbols-outlined">group</span>
       <h3>Me</h3>
       </a>
 
       <a href="leave.php">
         <span class="material-symbols-outlined">grid_view</span>
       <h3>Leave</h3>
       </a>
 
       
       <a href="logout.php">
       <span class="material-symbols-outlined">logout</span>
       <h3>logout</h3>
       </a>
 

       <a href="#" id="about_us_link">
        <span class="material-symbols-outlined">info</span>
        <h3>About Us</h3>
      </a>
      <div class="about-us-content">
        <p>Email: EmployeeMng@gmail.com</p>
        <p>Contact No: +1234567890</p>
        <!-- <p>Social Media: Facebook, Twitter, LinkedIn</p> -->
        <p>Brief about our Website : We made Website which can manage employees details.</p>
      </div>
      
       </div> 
     </aside>
     <!-- aside section end -->
 
     <!-- main section start -->
     <main>
       <h1>DashBoard</h1>

       
     <h2>Welcome, <?php echo $row['name']; ?>!</h2>
     <div class="user-details">
        <p><strong>Name: </strong> <?php echo $row['name']; ?></p>
        <p><strong>Email: </strong> <?php echo $row['email']; ?></p>
        <p><strong>Phone: </strong> <?php echo $row['phone']; ?></p>
        <p><strong>Role: </strong> <?php echo $row['role']; ?></p>
        <p><strong>Salary: </strong> <?php echo $row['salary']; ?></p>
     </div>
    <br>
    <a href="logout.php">Logout</a>
 
     </main>
     <!--  main section end -->
 
     <!-- Right section start -->
         <div class="right">
           <div class="top">
             <button id="menu_bar">
             <span class="material-symbols-outlined">menu</span>
             </button>
 
             <div class="theme-toggler">
             <!-- <span class="material-symbols-outlined active">light_mode</span>
             <span class="material-symbols-outlined">dark_mode</span> -->
             <img src="moon.png" id="icon">
             </div>
 
             <div class="profile">
               <div class="info">
                 <!-- <p><b>xyz</b></p> -->
                 <p>User</p>
                 <small class="text-muted"></small>
               </div>
 
               <div class="profile-photo">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
               </div>
             </div>
           </div>
           <!-- end top section -->

 
           <!-- Start Employee analytics -->
           <div class="emp_analytics">
             <h2>My Analytics</h2>
             <div class="item online">
               <div class="icon">
               </div>
               <div id="piechart" style="width: 400px; height: 300px;"></div>

           </div>
           <!-- End employee analytics -->
         </div>
     <!-- Right section end -->
 </div>
 <script src="script.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
      var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/661659571ec1082f04e0c487/1hr3kpvhq';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();

    document.addEventListener('DOMContentLoaded', function () {
      var modeSwitch = document.querySelector('.mode-switch');
    
      modeSwitch.addEventListener('click', function () {  document.documentElement.classList.toggle('dark');
        modeSwitch.classList.toggle('active');
      });
      
      var listView = document.querySelector('.list-view');
      var gridView = document.querySelector('.grid-view');
      var projectsList = document.querySelector('.project-boxes');
      
      listView.addEventListener('click', function () {
        gridView.classList.remove('active');
        listView.classList.add('active');
        projectsList.classList.remove('jsGridView');
        projectsList.classList.add('jsListView');
      });
      
      gridView.addEventListener('click', function () {
        gridView.classList.add('active');
        listView.classList.remove('active');
        projectsList.classList.remove('jsListView');
        projectsList.classList.add('jsGridView');
      });
      
      document.querySelector('.messages-btn').addEventListener('click', function () {
        document.querySelector('.messages-section').classList.add('show');
      });
      
      document.querySelector('.messages-close').addEventListener('click', function() {
        document.querySelector('.messages-section').classList.remove('show');
      });
    });
    
    
    const sidemenu=document.querySelector('aside')
    const menuBtn=document.querySelector('#menu_bar')
    const closeBtn=document.querySelector('#close_btn')
  
    var icon = document.getElementById("icon");
    var logo = document.getElementById("logo");
    icon.onclick = function () {
      document.body.classList.toggle("dark-theme");
      if(document.body.classList.contains( "dark-theme")){
        icon.src="sun.png";
        logo.src="darkModeLogo.jpg";
      }else{
        icon.src="moon.png";
        logo.src="logo.png";
      }
    }
    
    
var icon = document.getElementById("icon");
var logo = document.getElementById("logo");
icon.onclick = function () {
  document.body.classList.toggle("dark-theme");
  if(document.body.classList.contains( "dark-theme")){
    icon.src="sun.png";
    logo.src="darklogo.png";
  }else{
    icon.src="moon.png";
    logo.src="logo.png";
  }
}
    
    document.addEventListener("DOMContentLoaded", function() {
      var aboutUsLink = document.getElementById("about_us_link");
      var aboutUsContent = document.querySelector(".about-us-content");
    
      aboutUsLink.addEventListener("click", function(event) {
        event.preventDefault();
        aboutUsContent.style.display = (aboutUsContent.style.display === "none") ? "block" : "none";
      });
    });
  </script>
  <!--End of Tawk.to Script-->

 
   </body>
 </html>