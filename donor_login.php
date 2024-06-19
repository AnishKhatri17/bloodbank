<?php
include 'config.php';

// Check if the login form for donor is submitted
if(isset($_POST['donorlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id FROM dregistration WHERE uname=? AND pwd=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Fetch the user's id
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Start the session and store user id
        session_start();
        $_SESSION['id'] = $user_id;

        header("location: donor_dashboard.php");
        exit();
    } else {
        // Redirect back to the login form with an error message
        header("Location: DonorRegistration.php?error=1");
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
    <link rel="stylesheet" href="./donorlogin.css">
</head>
<body>
    <div class="loginbox">
        <h1 align="center">Login Here</h1>
        <div class="form">
            <form action="#" method="POST">
                <p>Username : </p>
                <input type="text" name="username" placeholder="Enter your username">

                <p>Password : </p>
                <input type="password" name="password" placeholder="Enter your password">
                <input type="submit" name="donorlogin" value="login">
                <a href="#">forget password ? </a><br>
                <a href="DonorRegistration.php">Doesn't have an account? Click here to register</a>
            </form>
        </div>
    </div>
</body>
</html>
