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

// Fetch donor data based on user email from bdonate table
$query = "SELECT * FROM bdonate WHERE email = (SELECT email FROM dregistration WHERE id = '$user_id')";
$query_run = mysqli_query($conn, $query);

// Check if the query was successful
if ($query_run) {
    // Fetch all donor data records including the 'status' column
    $donor_data = array();
    while ($row = mysqli_fetch_assoc($query_run)) {
        $donor_data[] = $row;
    }
} else {
    // Handle the case where the query fails (you might want to redirect or show an error message)
    echo "Error fetching donor data: " . mysqli_error($conn);
    exit();
}

// Fetch user data based on user ID
$query_user = "SELECT * FROM dregistration WHERE id = '$user_id'";
$query_run_user = mysqli_query($conn, $query_user);

// Check if the query was successful
if ($query_run_user) {
    // Fetch the user data
    $row = mysqli_fetch_assoc($query_run_user);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
         body
{
    background: url('./Donation_Dashboard.png') ;
    background-repeat: no-repeat;
    background-size: 1700px 750px;
}
.sidebar-content {
    padding: 20px;
    color: white;
}

.sidebar-content img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}
        </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="./donor_dashboard.php">
                    <i class="fa-solid fa-user-secret"></i>
                    <span>Donor Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./donate_form.php">
                    <i class="fa fa-user-plus"></i>
                    <span>Donate Blood</span>
                </a>
            </li>
            <li>
                <a href="./donation_history.php">
                    <i class="fas fa-question-circle"></i>
                    <span>Donation History</span>
                </a>
            </li>
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
                
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span><a href="./index.php">Log out</a></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- <?php foreach ($donor_data as $donor) : ?>
        <div class="sidebar-content">
            <img src="<?= $donor['image']; ?>" alt="Profile Image">
            <h4>Hello, <?= $row['fname']; ?>!</h4>
            <p><strong>Name:</strong> <?= $donor['name']; ?></p>
            <p><strong>Blood Group:</strong> <?= $donor['bgroup']; ?></p>
            <p><strong>Age:</strong> <?= $donor['age']; ?></p>
            <p><strong>Disease:</strong> <?= $donor['disease']; ?></p>
            <p><strong>Units Donated:</strong> <?= $donor['units']; ?></p>
            <p><strong>Gender:</strong> <?= $donor['gender']; ?></p>
            <p><strong>Contact:</strong> <?= $donor['contact']; ?></p>
            <p><strong>Date:</strong> <?= $donor['date']; ?></p>
            <p><strong>Address:</strong> <?= $donor['address']; ?></p>
        </div>
    <?php endforeach; ?> -->

    


    <div class="table-container" style= 'width: 85%'   >
    <h1 style='text-align: center;'><u> "Hello, <?= $row['fname']; ?>."</u></h1><br>
    <table style='border-collapse: collapse; width: 100%; margin: 0 auto; background-color: #f1d5d5' border='1' >
        <tr>
            <th style='border: 2px solid red;'>Name</th>
            <th style='border: 2px solid red;'>Blood Group</th>
            <th style='border: 2px solid red;'>Email</th>
            <th style='border: 2px solid red;'>Disease</th>
            <th style='border: 2px solid red;'>Units Donated</th>
            <th style='border: 2px solid red;'>Gender</th>
            <th style='border: 2px solid red;'>Contact</th>
            <th style='border: 2px solid red;'>Date</th>
            <th style='border: 2px solid red;'>Address</th>
            <th style='border: 2px solid red;'>Status</th>
        </tr>
        <?php foreach ($donor_data as $donor) : ?>
            <tr>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['name']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['bgroup']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['email']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['disease']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['units']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['gender']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['contact']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['date']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $donor['address']; ?></td>
                <td style='border: 1px solid black; text-align: center;'>
    <?php
     if (isset($donor['status']))
     {
        if ($donor['status'] == 1) 
        {
            echo "<button class='btn btn-success' style='width: 100px; height: 40px;' disabled>Accepted</button>";
        } 
            elseif ($donor['status'] == 0)
         {
            echo "<button class='btn btn-danger' style='width: 100px; height: 40px;' disabled>Declined</button>";
         }
     } 
    else
      {
       echo "<button style='padding: 5px 10px; background-color: yellow;'>Pending</button>";
      }
    ?>
</td>
            </tr>
        <?php endforeach; 
    ?>

    </table>
</div>
</body>
</html>
