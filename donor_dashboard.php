<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle accordingly
    header("Location: donor_login.php");
    exit();
}

// Include the configuration file
include 'config.php';

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'bbms');

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Fetch user data based on user ID
$query = "SELECT * FROM dregistration WHERE id = '$user_id'";
$query_run = mysqli_query($conn, $query);

// Check if the query was successful
if ($query_run) {
    // Fetch the user data
    $row = mysqli_fetch_assoc($query_run);
} else {
    // Handle the case where the query fails (you might want to redirect or show an error message)
    echo "Error fetching user data: " . mysqli_error($conn);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <link rel="stylesheet" href="Donor_dashboard.css">
    <!--Font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
         body
{
    background: url('./Donation_Dashboard.png') ;
    background-repeat: no-repeat;
    background-size: 1700px 750px;

}
        </style>
</head>
<body>
<!-- <h1>Hello, <?php echo $row['fname']; ?>!</h1> -->
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="#">
                <i class="fa-solid fa-user-secret"></i>
                    <!-- <i class="fas fa-tachometer-alt"></i> -->
                    <span>Donor Dashboard</span>

                </a>
            </li>
            <li>
                <a href="./donate_form.php">
                <i class="fa fa-user-plus"></i>
                    <!-- <i class="fas fa-home"></i> -->
                    <span>Donate Blood</span>
                </a>
            </li>
            <li>
                
                <a href="./donation_history.php">
                <i class="fas fa-question-circle"></i>
                    <!-- <i class="fas fa-user"></i> -->
                    <span>Donation History</span>
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
            <br><br>
            <br>

            <li>
                    
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span><a href="./index.php">Log out</a></span>
                </a>
            </li>
        </ul>
    </div>
</div>


<marquee bgcolor="#f1d5d5" scrollamount="12" size="50px" height="50px" style='margin: top 0px'; width="85%"> 
        <i><font color="red" font size="5">Greetings ! Welcome To Blood Bank Management System. &nbsp;&nbsp;Here you can request to donate blood.
        </font></i> <br>
 </marquee>

</body>
</html>
