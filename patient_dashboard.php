<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['id'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="patient_dashboard.css">
    <!--Font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

         <style>
    body
{
    background: url('./Patient_Dashboard.png') ;
    background-repeat: no-repeat;
    background-size: 1600px 100vh;

}
        </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="#">
                <i class="fa-solid fa-user-secret"></i>
                    <!-- <i class="fas fa-tachometer-alt"></i> -->
                    <span>Patient Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./request_form.php">
                <i class="fa-solid fa-user-injured"></i>
                    <!-- <i class="fas fa-home"></i> -->
                    <span>Request Blood</span>
                </a>
            </li>
            <li>
                
                <a href="request_history.php">
                <i class="fas fa-question-circle"></i>
                    <span>Request History</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <i class="fas fa-credit-card"></i>
                    <span>Blood Request</span>    
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-calendar-check"></i>
                    <span>Request History</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="#">
                    <i class="fas fa-question-circle"></i>
                    <span>Blood Stock</span>
                </a>
            </li> -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li>
                    
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="Logout"><a href="./index.php">Log out</a></span>
                </a>
            </li>
        </ul>
    </div>
    
</div>

<marquee bgcolor="#f1d5d5" scrollamount="12" size="50px" height="50px" style='margin: top 0px'; width="85%"> 
        <i><font color="red" font size="5">Greetings ! Welcome To Blood Bank Management System. &nbsp;&nbsp;Here you can request for blood.
        </font></i> <br>
    </marquee>


</body>
</html>




