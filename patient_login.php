<?php
include 'config.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id FROM pregistration WHERE uname=? AND pwd=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) 
    {
        // Fetch the user's id
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Start the session and store user id
        session_start();
        $_SESSION['id'] = $user_id;

        header("location: patient_dashboard.php");
        exit();
    } 
    
    else 
    {
        // Redirect back to the login form with an error message
        header("Location: login.php?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./patientlogin.css">
</head>
<body>
        <div class="loginbox">
            <h1 align="center">Login Here</h1>
            <div class="form">
                <form action="patient_connection.php" method="POST">
                    <p>Username : </p>
                    <input type="text" name="username" placeholder="Enter your username">

                    <p>Password : </p>
                    <input type="password" name="password" placeholder="Enter your password">
                    <input type="submit" name="login" value="login">
                    <a href="#">forget password ? </a><br>
                    <a href="Registration.php">Doesn't have an account? Click here to register</a>
                </form>
            </div>
        </div>
</body>
</html>