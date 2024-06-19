<?php
session_start();

include 'config.php';
if(isset($_POST['submit']))
{

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$group=$_POST['group'];
// $gender=$_POST['gender'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$email=$_POST['email'];

$sql = "SELECT * FROM dregistration WHERE uname='$uname' AND pwd='$pwd' ";

    $result = mysqli_query($conn,$sql) ;
    $presentrows = mysqli_num_rows($result);
      if($presentrows>0)
      {
        $_SESSION['alert_message']='1' ;
        header("location:DonorRegistration.php") ;
      }

      else
      {

$sql= "INSERT INTO dregistration(fname,lname,uname,pwd,bgroup,age,phone,address,email) VALUES('$fname','$lname'
,'$uname','$pwd','$group','$age','$phone','$address','$email')";

$result=mysqli_query($conn,$sql);
if($result)

{
    header("location:donor_login.php");
    // echo("Record inserted successfully");
}
      }

}

?>