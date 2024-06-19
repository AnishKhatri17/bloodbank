<?php
    session_start();
    $message='';
    if(isset($_SESSION['alert_message']))
    {
        $message = 'Username and Password Already Exists !!!' ;
    }


    if (isset($_POST['submit'])) {
        // Your existing code
    
        // After successful registration
        if ($result) {
            // Set session variables
            // $_SESSION['email'] = $email;
            // $_SESSION['contact'] = $phone;

            $email = $_SESSION['email'] ; 
            $phone = $_SESSION['phone'] ;
    
            // Redirect to the request form page
            header("location:request_form.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form </title>
    <link rel="stylesheet" href="./registration.css">
</head>
<body> 
           <h3 align="center"> <?php echo "$message" ; ?> </h5><br>
           <div class="registrationbox">
           <h1 align="center"> Patient Registration Form </h1><br>
           
           <form action="regcode.php" method="post" enctype="multipart/form-data">
            <div class="names">
                <label for="fname"><b>First Name</b>&emsp;&ensp; :&emsp;</label>
                <input type="text" name="fname" id="fname" required="required" placeholder="Enter First Name"><br>
                <div class="name">
                <label for="lname"><b>Last Name</b>&emsp;&ensp;&nbsp; :&emsp; </label>
                <input type="lname" name="lname" id="lname" required="required" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="log">
                <label for="Username"><b>Username</b>&emsp;&emsp; :&emsp; </label>
                <input type="text" name="uname" id="Username" required="required" placeholder="Enter your username">
            </div>

            <div class="log">
                <label for="Password"> <b>Password</b>&emsp;&emsp;&nbsp; :&emsp; </label>
                <input type="password" name="pwd" id="Password" required="required" placeholder="*****************">
            </div>
            <div class="group">
                <label for="Group"><b>Blood Group</b>&ensp;&nbsp;&nbsp;&nbsp;:&emsp; </label>
                <select name="group" id="Group">
                    <option value="#" selected="selected">Select</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="A+">B+</option>
                    <option value="A+">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="group">
                <label for="male"><b>Gender</b>&emsp;&emsp;&emsp;&nbsp; :&emsp; </label>
                <input type="radio" name="gender" id="male" checked="checked" value="Male"> Male
                <input type="radio" name="gender" id="female" value="Female"> female
                <input type="radio" name="gender" id="others" value="Other"> Other
            </div>
            <div class="group">
                <label name="age"><b>Age </b>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; :&emsp;  </label>
                <input type="text" name="age" id="age" required="required" placeholder="Enter age(Minimum 18)">

            </div>

            <div class="group">
                <label name="phone"><b>Phone no</b>&emsp;&emsp;&nbsp;  :&emsp;</label>
                    <input type="number" name="phone" id="Phone" required="required" placeholder="Enter Phone Number">
            </div>

            <div class="group">
                <label for="address"><b>Address</b>&emsp;&emsp;&emsp; :&emsp; </label>
                <input type="text" name="address" id="address" required="required" placeholder="Enter Your Address">
            </div><br>

            <div class="group">
                <label for="email"><b>Email</b>&emsp;&emsp;&emsp; :&emsp; </label>
                <input type="text" name="email" id="email" required="required" placeholder="Enter Your Email">
            </div><br>

            <button type="submit" name="submit"><b>REGISTER</b></button><br>
            <a>already have an account?</a><br>
            <a href="patient_login.php"> Login</a>
           </form>
        </div>

        <?php 
        unset($_SESSION['alert_message']);
        ?>

</body>
</html>