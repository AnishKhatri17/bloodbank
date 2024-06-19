<?php
session_start();


// Check if user is logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['contact'])) {
  // Redirect to login page or handle accordingly
  header("Location: patient_login.php");
  exit();
}

include 'config.php';

if(isset($_POST['submit']))
{

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $pwd=$_POST['pwd'];
    $group=$_POST['group'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $email=$_POST['email'];

    //Check if username and password already exixt .....
    $sql = "SELECT * FROM pregistration WHERE uname='$uname' AND pwd='$pwd' ";

    $result = mysqli_query($conn,$sql) ;
    $presentrows = mysqli_num_rows($result);
      if($presentrows>0)
      {
        $_SESSION['alert_message']='1' ;
        header("location:Registration.php") ;
      }

        else
        {
        
    $sql= "INSERT INTO pregistration(fname,lname,uname,pwd,bgroup,gender,age,phone,address,email) VALUES('$fname','$lname'
    ,'$uname','$pwd','$group','$gender','$age','$phone','$address','$email')" ;

     $result=mysqli_query($conn,$sql);
     if($result)

       {

            header("location:patient_login.php");
            // echo("Record inserted successfully");
       }

          }
}


?>


