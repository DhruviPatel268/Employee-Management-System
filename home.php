<?php
session_start(); // Start the session
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Stop further execution
}
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
?>
 <!-- index.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management System</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', { 'packages': ['corechart'] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Role', 'Number Of Employees'],
          ['Software Engineer', 11],
          ['Backend Developer', 5],
          ['Full Stack Devloper', 2],
          ['Managers', 2],
          ['Workers', 4]
        ]);

        var options = {
          title: 'Employee'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>

<body>

<div class="container">
    <!-- aside section start -->
      <aside>
    <div class="top">
        <div class="logo">
        <img src="logo.jpeg" alt="Logo" class="logo-image" id="logo">
        </div>
    </div>
      <!-- end top -->

      <div class="sidebar">
      <a href=# class="active">
        <span class="material-symbols-outlined">grid_view</span>
      <h3>DashBoard</h3>
      </a>

      <a href="/Project/index.php">
        <span class="material-symbols-outlined">group</span>
      <h3>Employees</h3>
      </a>

      <a href="/Project/adduser.php" >
        <span class="material-symbols-outlined">person_add</span>
      <h3>Add-Employee</h3>
      </a>

      <a href="/Project/edit.php">
        <span class="material-symbols-outlined">manage_accounts</span>
      <h3>Edit</h3>
      </a>

      <a href="/Project/accept-leave.php">
        <span class="material-symbols-outlined">grid_view</span>
      <h3>Leave</h3>
      </a>

      <a href="#" id="about_us_link">
        <span class="material-symbols-outlined">info</span>
        <h3>About Us</h3>
      </a>
      <div class="about-us-content">
        <p>Email: example@example.com</p>
        <p>Contact No: +1234567890</p>
        <p>Social Media: Facebook, Twitter, LinkedIn</p>
        <p>Brief about our company: Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>

      <a href="logout.php">
      <span class="material-symbols-outlined">logout</span>
      <h3>logout</h3>
      </a>

      


      </div> 
    </aside>
    <!-- aside section end -->
<?php
$roleCounts = array(); // Array to store role counts
$roles = array("Software Engineer", "Backend Developer", "Full Stack Developer", "Managers", "Workers");

foreach ($roles as $role) {
    $sql = "SELECT COUNT(*) AS total FROM users WHERE role='$role'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $roleCounts[$role] = $row['total'];
}
$sql = "SELECT COUNT(*) AS total_employees FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalEmployees = $row['total_employees'];

?>

    <!-- main section start -->
    <main>
      <h1>DashBoard</h1>
      <!-- Start insights -->
      <div class="insights">
        <!-- Total employees start -->
        <div class="total-employees">
          <span class="material-symbols-outlined">supervisor_account</span>
          <div class="middle"></div>
          <div class="left"></div>
          <h3>Total Employees</h3>
          <h1><?php echo $totalEmployees;?></h1>
          <small>Last 24 hours</small>
        </div>
        <!-- Total employees end -->

        <!-- New employees start -->
        <div class="new-employees">
          <span class="material-symbols-outlined">recent_patient</span>
          <div class="middle"></div>
          <div class="left"></div>
          <h3>Past Projects</h3>
          <h1>5</h1>
          <small>Last year</small>
        </div>
        <!-- Total employees end -->

        <!-- working projects start -->
        <div class="working-projects">
          <span class="material-symbols-outlined">workspaces</span>
          <div class="middle"></div>
          <div class="left"></div>
          <h3>Recent Projects</h3>
          <h1>3</h1>
          <small>Current Year</small>
        </div>
        <!-- working projects end -->
      </div>
    <!--  End Insights -->


    <!-- Start recent projects -->
    <div class="recent_projects">
      <h1>Recent Projects</h1>
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Link</th>
            <th>source code</th>
          </tr>
        </thead>
      
      <tbody>
        <tr>
          <td>01.</td>
          <td>BookHive</td>
          <td>Link</td>
          <td>
            <a href="https://github.com/Shail-26/BookHive">src</a>
          </td>
        </tr>

        <tr>
          <td>02.</td>
          <td>GaadiDekho.com</td>
          <td>Link</td>
          <td>
          <a href="https://github.com/DarshPatel4/SGP-SEM3">src</a>
          </td>
        </tr>

        <tr>
          <td>03.</td>
          <td>Employee Management System</td>
          <td>Link</td>
          <td>
          <a href="https://github.com/22CS053DHRUVI">src</a>
          </td>
        </tr>
       
      </tbody>
      </table>
    </div>
    <!-- End recent Projects -->
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
          
            <p>Admin</p>
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

      <!-- Review section started -->

      <div class="recent_reviews">
        <h2>Reviews</h2>
        <div class="reviews">
          <div class="review">
            <div class="message">
              <p><b>Nice Company</b></p>
            </div>
          </div>

          <div class="review">
            <div class="message">
              <p><b>Nice Enviroment in Comapany</b></p>
            </div>
          </div>

          <div class="review">
            <div class="message">
              <p><b>Employees are so Hard Working</b></p>
            </div>
          </div>

          <div class="review">
            <div class="message">
              <p><b>All are fresher's Friendly</b></p>
            </div>
          </div>

          <div class="review">
            <div class="message">
              <p><b>Nice Company</b></p>
            </div>
          </div>

        </div>
      </div>

      <!-- Review section end -->

      <!-- Start Employee analytics -->
      <div class="emp-analytics">
        <h2>Employee analytics</h2>
        <!-- <div class="item online">
        </div> -->
        <div class="pie-div" id="piechart" style="width: 400px; height: 300px;"></div>
      </div>
      <!-- End employee analytics -->
    </div>
    <!-- Right section end -->
  </div>

  <!-- <script src="script.js"></script> -->
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  
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
    document.querySelector('.messages-close').addEventListener('click', function() {
      document.querySelector('.messages-section').classList.remov

    // Call the drawChart function to draw the pie chart
    drawChart();
  });

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Role', 'Number Of Employees'],
      <?php
      foreach ($roleCounts as $role => $count) {
        echo "['$role', $count],";
      }
      ?>
    ]);

    var options = {
      title: 'Employee by Role'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }

  document.addEventListener('DOMContentLoaded', function () {
    const closeMenuBtn = document.getElementById('close-menu');
    const asideMenu = document.querySelector('aside');

    closeMenuBtn.addEventListener('click', function () {
        asideMenu.classList.toggle('closed');
    });
});
</script>

  <!--End of Tawk.to Script-->

</body>

</html>