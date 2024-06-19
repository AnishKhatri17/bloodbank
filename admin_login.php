<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./adminlogin.css">
</head>
<body>
        <div class="loginbox">
            <h1 align="center">Login Here</h1>
            <div class="form">
                <form action="admin_connection.php" method="POST">
                    <p>Username : </p>
                    <input type="text" name="username" placeholder="Enter your username">

                    <p>Password : </p>
                    <input type="password" name="password" placeholder="Enter your password">
                    <input type="submit" name="adminlogin" value="login">
                    <!-- <a href="#">forget password ? </a><br>
                    <a href="DonorRegistration.php">Doesn't have an account? Click here to register</a> -->
                </form>
            </div>
        </div>
</body>
</html>