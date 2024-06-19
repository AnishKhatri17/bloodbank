<?php
include 'config.php';
if(isset($_POST['adminlogin']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT * FROM admin WHERE uname='$username' AND pwd='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1){
            header("location:admin_dashboard.php");
            
        }
        else
        {
            echo("<br>");
            echo("Due to invalid username and password you cannot go to admin dashboard....");
            header("location: admin_login.php");
             //echo("<a href='./index.php'> Click here to go to homepage</a>") ;
            // header("Location:DonorRegistration.php");
        }
    }
?>