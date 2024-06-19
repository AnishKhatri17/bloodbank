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

    if ($stmt->num_rows == 1) {
        // Fetch the user's id
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Start the session and store user id
        session_start();
        $_SESSION['id'] = $user_id;

        header("location: patient_dashboard.php");
        exit();
    } else {
        header("Location: Registration.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
