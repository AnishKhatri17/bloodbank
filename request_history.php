<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle accordingly
    header("Location: patient_login.php");
    exit();
}

// Include the configuration file
include 'config.php';

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'bbms');

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Fetch request data based on user email from brequest table
$query = "SELECT * FROM brequest WHERE email = (SELECT email FROM pregistration WHERE id = '$user_id')";
$query_run = mysqli_query($conn, $query);

// Check if the query was successful
if ($query_run) {
    // Fetch all request data records
    $request_data = array();
    while ($row = mysqli_fetch_assoc($query_run)) {
        $request_data[] = $row;
    }
} else {
    // Handle the case where the query fails (you might want to redirect or show an error message)
    echo "Error fetching request data: " . mysqli_error($conn);
    exit();
}

// Fetch user data based on user ID
$query_user = "SELECT * FROM pregistration WHERE id = '$user_id'";
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
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="patient_dashboard.css">
    <!--Font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
         body
{
    background: url('./Patient_Dashboard.png') ;
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
                <a href="./patient_dashboard.php">
                    <i class="fa-solid fa-user-secret"></i>
                    <span>Patient Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./request_form.php">
                    <i class="fa fa-user-plus"></i>
                    <span>Request Blood</span>
                </a>
            </li>
            <li>
                <a href="request_history.php">
                    <i class="fas fa-question-circle"></i>
                    <span>Request History</span>
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
    <!-- <?php foreach ($request_data as $request) : ?>
        <div class="sidebar-content">
            <img src="<?= $request['image']; ?>" alt="Profile Image">
            <h4>Hello, <?= $row['fname']; ?>!</h4>
            <p><strong>Name:</strong> <?= $request['name']; ?></p>
            <p><strong>Blood Group:</strong> <?= $request['bgroup']; ?></p>
            <p><strong>Reason:</strong> <?= $request['reason']; ?></p>
            <p><strong>Units Requested:</strong> <?= $request['units']; ?></p>
            <p><strong>Age:</strong> <?= $request['age']; ?></p>
            <p><strong>Gender:</strong> <?= $request['gender']; ?></p>
            <p><strong>Contact:</strong> <?= $request['contact']; ?></p>
            <p><strong>Date:</strong> <?= $request['date']; ?></p>
            <p><strong>Address:</strong> <?= $request['address']; ?></p>
        </div>
    <?php endforeach; ?> -->



    <div class="table-container" style= 'width: 85%'   >
    <h1 style='text-align: center;'><u> "Hello, <?= $row['fname']; ?>."</u></h1><br>
    <table style='border-collapse: collapse; width: 100%; margin: 0 auto; background-color: #f1d5d5' border='1' >
        <tr>
            <th style='border: 2px solid red;'>Name</th>
            <th style='border: 2px solid red;'>Blood Group</th>
            <th style='border: 2px solid red;'>Reason</th>
            <th style='border: 2px solid red;'>Units Required</th>
            <th style='border: 2px solid red;'>Gender</th>
            <th style='border: 2px solid red;'>Email</th>
            <th style='border: 2px solid red;'>Contact</th>
            <th style='border: 2px solid red;'>Date</th>
            <th style='border: 2px solid red;'>Address</th>
            <th style='border: 2px solid red;'>Status</th>
        </tr>
        <?php foreach ($request_data as $request) : ?>
            <tr>
                <td style='border: 1px solid black; text-align: center;'><?= $request['name']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['bgroup']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['reason']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['units']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['gender']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['email']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['contact']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['date']; ?></td>
                <td style='border: 1px solid black; text-align: center;'><?= $request['address']; ?></td>
                <td style='border: 1px solid black; text-align: center; '>

                <?php
                 if(isset($request['status']))
                 {
                    if($request['status'] == 1)
                    {
                        echo "<button class='btn btn-success' style='width: 100px; height: 40px;' disabled>Accepted</button>";
                    }
                        else if($request['status'] == 0)
                        {
                            echo "<button class='btn btn-danger' style='width: 100px; height: 40px;' disabled>Declined</button>";
                        }
                 }

                 else 
                 {
                    echo "<button style='padding: 5px 10px; background-color: yellow; '>Pending</button>";
                 }
                    
                 ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
