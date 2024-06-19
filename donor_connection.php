<?php
include 'config.php';
if(isset($_POST['donorlogin']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT * FROM dregistration WHERE uname='$username' AND pwd='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1){
            header("location:donor_dashboard.php");
            
        }
        else
        {
            header("Location:DonorRegistration.php");
        }
    }
?>