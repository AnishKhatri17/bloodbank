<?php
include 'config.php';

$sql = "SELECT * FROM pregistration"; // Replace 'your_table' with the name of your table

$result = mysqli_query($conn, $sql);

// Check if there are any records in the table
if (mysqli_num_rows($result) > 0) 
{
    // Start creating the HTML table

    echo"<br>" ;
    echo "<h1 align='center'><b><u> Patient Registration Details </u></b></h1>" ;
    
    echo "<table width='90%' border='1' align='center' style='border-collapse: collapse'; >" ;
    echo "<tr><th>Id </th><th>First Name </th>  <th>Last Name </th>  <th>Username</th>
    <th>Password</th>  <th>Blood Group</th>  <th>Gender</th>  <th>Age</th>  <th>Phone</th>  <th>Address</th> <th>Email</th> <th>Operation</th>
    </tr>" ; // Replace with the column names from your table
    

    // Loop through the result set and fetch data
    while ($row = mysqli_fetch_assoc($result)) 
    {
        // Output each row's data in a new table row
        echo "<tr>";
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['id'] . "</td>"; // Replace 'column1' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['fname'] . "</td>"; // Replace 'column2' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['lname'] . "</td>"; // Replace 'column3' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['uname'] . "</td>"; // Replace 'column4' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['pwd'] . "</td>"; // Replace 'column5' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['bgroup'] . "</td>"; // Replace 'column6' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['gender'] . "</td>"; // Replace 'column7' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['age'] . "</td>"; // Replace 'column8' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['phone'] . "</td>"; // Replace 'column9' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['address'] . "</td>"; // Replace 'column10' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['email'] . "</td>"; // Replace 'column10' with the actual column name from your table
        
        
        // echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['status'] . "</td>";

        // Add more columns as needed based on your table structure
        echo "</tr>";
    }

    // Close the HTML table
    echo "</table>";
} 
else

 {
    echo "No records found.";
 }

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<body>
<button type="button" name="status" class="btn btn-primary">  Accept </button>
</body>
</html>