<?php
include 'config.php';

$sql = "SELECT * FROM dregistration"; // Replace 'your_table' with the name of your table

$result = mysqli_query($conn, $sql);

// Check if there are any records in the table
if (mysqli_num_rows($result) > 0) 
{
    // Start creating the HTML table
    echo"<br>" ;
    echo "<h1 align='center'><b><u> Donor Registration Details </u></b></h1>" ;
    
    echo "<table width='90%' border='1' align='center' style='border-collapse: collapse'; >" ;
    echo "<tr><th>Id </th><th>First Name </th>  <th>Last Name </th>  <th>Username</th>
    <th>Password</th>  <th>Blood Group</th>  <th>Age</th>  <th>Phone</th>  <th>Address</th> <th>Operation</th>
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
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['age'] . "</td>"; // Replace 'column7' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['phone'] . "</td>"; // Replace 'column8' with the actual column name from your table
        echo "<td align='center' style='background-color: rgb(210, 210, 232)';>" . $row['address'] . "</td>"; // Replace 'column9' with the actual column name from your table
        
        // echo "<td align='center'>" . $row['status'] . "</td>";

        // Add more columns as needed based on your table structure
        echo "</tr>";
    }

    // Close the HTML table
    echo "</table>";
} 
else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>