

<!DOCTYPE html>
<html>
    <head>
        <title> Document </title>
        <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>"/>
        <link rel = "stylesheet"  href="button.css">
        <link rel="stylesheet" href="success_style.css?v=<?php echo time(); ?>">
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
    </div>

    <div class="container">
            <div class="header-div">
            <h1>Add User</h1>
            </div>
            <br>
            <form class="form" action="/Project/success.php" method="POST">
                <div class="name-box">
                    <label>Full Name</label>
                    <input required="" placeholder="Enter full name" type="text" name="name"/>
                </div>
               
                <div class="mail-box">
                    <label>E-mail</label>
                    <input required="" placeholder="Enter e-mail address" type="text" name="email">
                </div>
                <div class="username-column">
                    <div class="username-box">
                    <label>username</label>
                    <input required="" placeholder="username" type="username" name="username">
                </div>
                <div class="password-column">
                    <div class="password-box">
                    <label>Password</label>
                    <input required="" placeholder="password" type="password" name="password">
                </div>
                <div class="phone-column">
                    <div class="phone-box">
                    <label>Phone Number</label>
                    <input required="" placeholder="Enter phone number" type="telephone" name="phone">
                    </div>
                
                    <div class="dob-box">
                        <label>Joining Date</label>
                        <input required="" placeholder="Enter birth date" type="date" name="joinDate">
                    </div>
                </div>
                <div class="gender-box">
                    <label>Gender</label>
                    <div class="gender-option">
                    <div class="gender">
                        <input checked="" name="gender" id="check-male" type="radio">
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input name="gender" id="check-female" type="radio">
                        <label for="check-female">Female</label>
                    </div>
                </div>
                </div>
                <div class="age-column">
                    <div class="age-box">
                    <label>Age</label>
                    <input required="" placeholder="Enter Age" type="Age" name="age">
                    </div>
                    <div class="role-box">
                        <label>role</label>
                        <input required="" placeholder="Enter Role" type="role" name="role">
                    </div>
                </div>
                <div class="salary-box">
                    <label>salary</label>
                    <input required="" placeholder="Enter salary" type="salary" name="salary">
                    </div>
                <div class="add-box address">
                    <label>Address</label>
                    <input required=""  placeholder="Enter street address" type="text" name="Address">
                </div>
                <div class="column">
                        <div class="country-box">
                            <select name="country">
                            <option hidden="" name="country">Country</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Germany</option>
                            <option>Japan</option>
                            <option>India</option>
                            <option>China</option>
                            <option>Afghanistan</option>
                            </select>
                        </div>
                </div>
                <div class="btn-div" >
                    <button type='submit'>Submit</button>
                </div>
            </form>
    </div>

    </body>
</html>