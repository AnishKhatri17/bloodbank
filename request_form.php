<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit();
}

// Include the configuration file
include 'config.php';

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'bbms');

// Get the user ID from the session
$user_id = $_SESSION['id'];

// Fetch user data based on user ID
$query = "SELECT * FROM pregistration WHERE id = '$user_id'";
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
<html>
<head>
  <title> Blood Request Form </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: white;
      background-image: url('request.png');
      background-repeat: no-repeat;
      background-size: 100% 95%;
    }

    h2 {
      text-align: center;
      color: black;
      padding-top: 10px;
      font-weight: bold;
      font-size: 40px;
    }

    form {
      width: 400px;
      margin: 0 auto;
      background-color: rgb(210, 210, 232);
      padding: 25px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-top: 10px;
      color: #000000;
    }

    input[type="text"],
    input[type="number"],
    input[type="tel"],
    input[type="email"],
    input[type="date"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 4px;
      margin-bottom: 12px;
    }

    input[type="submit"] {
      background-color: #143aa0;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #7e190b;
    }
  </style>
</head>
<body>

<h2>Blood Request Form</h2>
<form action="./request_form_database.php" method="POST" enctype="multipart/form-data">

    <label for="patient_name"><b>Patient Name:</b></label>
    <input type="text" name="fname" value="<?= $row['fname']; ?>" readonly>

    <label for="blood_type"><b>Blood Group:</b></label>
    <select id="blood_type" name="bgroup" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>

    <label for="Reason"><b>Reason:</b></label>
    <select id="Reason" name="reason" required>
        <option value="Accident">Accident</option>
        <option value="Disease">Disease</option>
        <option value="Injuries">Injuries</option>
        <option value="Other">Other Reason</option>
    </select>

    <label for="units_required"><b>Units Required (in 'ml'):</b></label>
    <input type="number" name="units" id="units" placeholder="Enter Required Blood Amount (in ml.)" required>

    <label for="age"><b>Age:</b></label>
    <input type="number" name="age" id="age" placeholder="Enter Your Age" required>

    <label for="gender"><b>Gender:</b></label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <label for="email"><b>Email:</b></label>
    <input type="text" name="email" value="<?= $row['email']; ?>" readonly>

    <label for="image"><b>Upload Image:</b></label>
    <input type="file" name="image" id="image" placeholder="Upload your photo or citizenship photo" required>

    <label for="contact_number"><b>Contact Number:</b></label>
    <input type="text" name="phone" value="<?= $row['phone']; ?>" readonly>

    <label for="date"><b>Date Of Form Submission:</b></label>
    <input type="date" name="date" id="date" placeholder="(dd-mm-yyyy)" required>

    <label for="address"><b>Address:</b></label>
    <input type="text" name="address" id="address" placeholder="Enter Your Address">

    <input type="submit" name="submit" value="REQUEST">
</form>

</body>
</html>
