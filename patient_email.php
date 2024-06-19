<?php 
session_start();

// $_SESSION['email'] = $email;
// $_SESSION['phone'] = $phone;
$email = $_SESSION['email'] ; 
$phone = $_SESSION['phone'] ;


include 'config.php' ;

$sql = "SELECT * from pregistration where email='bitu@gmail.com' AND phone=9877665544" ;
$result = mysqli_query($conn,$sql) ;
$presentrows = mysqli_num_rows($result);
if($presentrows>0)
{
    echo"<br>" ;
    echo "<h1 align='center'><b><u> Patient Registration Details </u></b></h1>" ;
    echo"<br>" ;

    echo "<table width='100%' style='border : 1px solid green'>" ;
    echo "<tr><th style='border : 2px solid red';>Id </th><th style='border : 2px solid red';>First Name </th> 
    <th style='border : 2px solid red';>Last Name </th>  <th style='border : 2px solid red';>Username</th>
    <th style='border : 2px solid red';>Password</th>  <th style='border : 2px solid red';>Blood Group</th>  
    <th style='border : 2px solid red';>Gender</th>  <th style='border : 2px solid red';>Age</th>  
    <th style='border : 2px solid red';>Phone</th>  <th style='border : 2px solid red';>Address</th> 
    <th style='border : 2px solid red'; align='center'>Email</th>  <th style='border : 2px solid red'; > Operation</th>
    </tr>" ; // Replace with the column names from your table
    

    // Loop through the result set and fetch data
    echo $email ;
    echo $phone;
    while ($row = mysqli_fetch_assoc($result)) 
    {
        // Output each row's data in a new table row
        echo "<tr>";
        echo "<td align='center' style='border : 1px solid black'; >" . $row['id'] . "</td>"; // Replace 'column1' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['fname'] . "</td>"; // Replace 'column2' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['lname'] . "</td>"; // Replace 'column3' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['uname'] . "</td>"; // Replace 'column4' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['pwd'] . "</td>"; // Replace 'column5' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['bgroup'] . "</td>"; // Replace 'column6' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['gender'] . "</td>"; // Replace 'column7' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['age'] . "</td>"; // Replace 'column8' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['phone'] . "</td>"; // Replace 'column9' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['address'] . "</td>"; // Replace 'column10' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black';>" . $row['email'] . "</td>"; // Replace 'column11' with the actual column name from your table
}
}

?>