<?php
include 'config.php';

$sql = "SELECT * FROM brequest"; // Replace 'your_table' with the name of your table

$result = mysqli_query($conn, $sql);

// Check if there are any records in the table
if (mysqli_num_rows($result) > 0) 
{
    // Start creating the HTML table

    echo "<br>";
    echo "<h1 align='center'><b><u> Blood Request Forms </u></b></h1>";

    echo "<table width='100%' style='border : 1px solid green' >";
    echo "<tr><th style='border : 2px solid red';>Id </th><th style='border : 2px solid red';>Name </th>  
    <th style='border : 2px solid red';>Blood Group </th>  <th style='border : 2px solid red';>Reason</th>
    <th style='border : 2px solid red';> Units </th>  <th style='border : 2px solid red';> Age</th> 
    <th style='border : 2px solid red';>Gender</th>  <th style='border : 2px solid red';>Email</th> 
    <th style='border : 2px solid red';>Image</th>  <th style='border : 2px solid red';>Contact</th> 
    <th style='border : 2px solid red';>Date</th> <th style='border : 2px solid red';>Address</th>
    <th style='border : 2px solid red';>Action</th>
    </tr>";

    // Loop through the result set and fetch data
    while ($row = mysqli_fetch_assoc($result)) 
    {
        // Output each row's data in a new table row
        echo "<tr>";
        echo "<td align='center' style='border : 1px solid black'; >" . $row['id'] . "</td>"; // Replace 'column1' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['name'] . "</td>"; // Replace 'column2' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['bgroup'] . "</td>"; // Replace 'column3' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['reason'] . "</td>"; // Replace 'column4' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['units'] . "</td>"; // Replace 'column5' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['age'] . "</td>"; // Replace 'column6' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['gender'] . "</td>"; // Replace 'column7' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['email'] . "</td>"; // Replace 'column8' with the actual column name from your table
        echo "<td align='center' style='border: 1px solid black;'><img class='table-image' src='data:image/jpeg;base64," . $row['image'] . "' alt='Image'></td>"; // Replace 'column9' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['contact'] . "</td>"; // Replace 'column10' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['date'] . "</td>"; // Replace 'column10' with the actual column name from your table
        echo "<td align='center' style='border : 1px solid black'; >" . $row['address'] . "</td>"; // Replace 'column10' with the actual column name from your table
        

        
        // echo "<td>";
        // if (is_null($row['status']) || $row['status'] == 2) {
        //     echo "<form class='action-form' action='process_attendance.php' method='post'>";
        //     echo "<input type='hidden' name='userId' value='" . $row['id'] . "'>";
        //     echo "<button type='submit' name='accept' class='btn btn-primary'>Accept</button>";
        //     echo "<button type='submit' name='decline' class='btn btn-danger'>Decline</button>";
        //     echo "</form>";
        // } else {
        //     echo "Request already processed.";
        // }
        // echo "</td>";

        // Add more columns as needed based on your table structure
        echo "</tr>";

        // Update donation_request table
        $donationStatus = is_null($row['status']) ? 1 : ($row['status'] == 2 ? 1 : 0);
        $donationSql = "INSERT INTO donation_request (request_id, status) VALUES ('" . $row['id'] . "', '" . $donationStatus . "')";
        mysqli_query($conn, $donationSql);
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
