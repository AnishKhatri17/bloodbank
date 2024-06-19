<?php 

include 'config.php';

if(isset($_POST['submit']))
{
    $Dname=$_POST['name'];
    $Bgroup=$_POST['bgroup'];
    $Age=$_POST['age'];
    $Disease=$_POST['disease'];
    $Units=$_POST['units'];
    $Gender=$_POST['gender'];
    $Email=$_POST['email'];
    $Contact=$_POST['contact'];
    $Date=$_POST['date'];
    $Address=$_POST['address'];

     // For Storing the image in the database.....
     $file_name = $_FILES['image']['name'] ;
     $file_size = $_FILES['image']['size'] ;
     $file_tmp = $_FILES['image']['tmp_name'] ;
     $file_type = $_FILES['image']['type'] ;
     $target_dir = "./DonationImages/" ; // Make sure the Images directory exists
 
     $target_file = $target_dir . basename($file_name); // Move the uploaded file to the target directory
     
     if (move_uploaded_file($file_tmp, $target_file)) {
        $imageData = file_get_contents($target_file); // Read the image file as binary data
        $Images = base64_encode($imageData); // Store the base64-encoded image data in the $Images variable
    
        // Now, you can insert $Images into the 'image' column of your database
        // Make sure to use appropriate SQL to insert the data into the database
        // $Images = $target_file; 
 
 
      $sql = "INSERT INTO bdonate (name, bgroup,age,disease,units,gender,email,image,contact,date,address) VALUES ('$Dname','$Bgroup','$Age','$Disease','$Units','$Gender','$Email','$Images','$Contact','$Date','$Address')";

      $result=mysqli_query($conn,$sql);

      if($result) 
      {
        //   echo "Image location stored in the database successfully.";
          header("location:donor_dashboard.php");
      } 
      else 
      {
          echo "Error: " . mysqli_error($conn);
      }
  }         else
        {
             echo "Error uploading the file.";
        }
        
}


?>
