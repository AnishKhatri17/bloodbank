<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./admin_dashboard.css">
    <!--Font Awesome Cdn Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            margin-left: 300px;
            padding: 10;
            background-color: #f1d5d5;
            width: 80%; 
            height: 100vh;
            display: block;
        }
        header {
            /* background-color: rgb(44, 206, 198); */
            background-color: #6d0e0e;
            color: #000000;
            text-align: center;
            padding: 10px;
        }
        h1 {
      text-align: center;
      color: #c4c56e;
      padding-top: 2px;
    }
        .container {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-around; */
            justify-content: space-between;
            padding: 20px;
            /* border: 2px solid black; */
            /* margin-top: 20px; */
        }
        
         .container2 
         {
            display: flex;
            flex-wrap: wrap;
            /* border: 2px solid black; */
            justify-content: space-between;
            padding: 20px;
            margin-top: 70px;
            height: 230px; 
         }
        
        .card {
            background-color: whitesmoke;
            border: 2px solid black;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            width: 260px;
            text-align: center;
            cursor: pointer;
            height: 170px;
        }
       
        
        .card h2 {
            margin-top: 0;
            align-content: center;
            /* text-align: justify; */
        }
        p{
            margin-top: auto;
            text-align: right;
        }

</style>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="./dashboard_redirect/admin_dashboard_copy.php">
                <i class="fa-solid fa-user-secret"></i>
                    <!-- <i class="fas fa-tachometer-alt"></i> -->
                    <span>Admin Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./dashboard_redirect/patient_reg_fetch.php">
                <i class="fa-solid fa-bed"></i>
                    <!-- <i class="fas fa-home"></i> -->
                    <span>Patient Management</span>
                </a>
            </li>
            <li>
                
                <a href="./dashboard_redirect/donor_reg_fetch.php">
                <i class="fa-solid fa-users"></i>
                    <!-- <i class="fas fa-user"></i> -->
                    <span>Donor Management</span>
                </a>
            </li>
            <li>
                <a href="./dashboard_redirect/blood_request_fetch.php">
                <i class="fa-solid fa-user-injured"></i>
                    <!-- <i class="fas fa-credit-card"></i> -->
                    <span>Blood Patient</span>    
                </a>
            </li>
            <li>
                <a href="./dashboard_redirect/blood_request_fetch.php">
                <i class="fa fa-user-plus"></i>
                    <!-- <i class="fas fa-calendar-check"></i> -->
                    <span>Blood Donor</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-question-circle"></i>
                    <span>Blood Stock</span>
                </a>
            </li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        
            <li>
                    
                <a href="./index.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container">
        <!-- Blood Group: A+ -->
        <div class="card" onclick="showDetails('A+')">
            <h2>A+ &nbsp;&nbsp;&nbsp;</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>20 </p> -->
        </div>
        <!-- Blood Group: A- -->
        <div class="card" onclick="showDetails('A-')">
            <h2>A-</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>15</p> -->
        </div>

        <!-- Blood Group: B+ -->
        <div class="card" onclick="showDetails('B+')">
            <h2>B+</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)" style="align-items: right;"></i>
            <!-- <p>25</p> -->
        </div>

        <!-- Blood Group: B- -->
        <div class="card" onclick="showDetails('B-')">
            <h2>B-</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>20</p> -->
        </div>

            <!-- Blood Group: AB+ -->
         <div class="card" onclick="showDetails('AB+')">
            <h2>AB+</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>20</p> -->
        </div>

        <!-- Blood Group: AB- -->
        <div class="card" onclick="showDetails('AB-')">
            <h2>AB-</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>20</p> -->
        </div>

        <!-- Blood Group: O+ -->
        <div class="card" onclick="showDetails('O+')">
            <h2>O+</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p>20</p> -->
        </div>

        <!-- Blood Group: O- -->
        <div class="card" onclick="showDetails('O-')">
            <h2>O-</h2>
            <i class="fa fa-tint" style="font-size:65px;color:rgb(201, 54, 54)"></i>
            <!-- <p> 20 </p> -->
        </div>
        
    </div>
   
   <div class="container2">
    <div class="card add" onclick="showDetails('Total Donors')">
        <h3>Total Donars</h3><br>
        <i class="fa fa-hand-holding-medical" style="font-size:60px;"></i>
        <p> 25</p>
    </div>
   
    <div class="card add" onclick="showDetails('Total Requests')">
        <h3>Total Requests</h3><br>
        <i class="fa-solid fa-spinner" style="font-size:60px;"></i>
        <p> 25</p>
    </div>
 
    <div class="card add" onclick="showDetails('Approved Rquests')">
        <h3>Approved Requests</h3><br>
        <i class="fa-solid fa-check" style="font-size:60px;"></i>
        <p> 25</p>
   </div>
   
   <div class="card add" onclick="showDetails('Total Blood Units')">
    <h3>Total Blood Unit</h3><br>
    <i class="fa-solid fa-sack-xmark" style="font-size:60px;" ></i>
    <p> 25</p>
   </div>
</div>

</body>
</html>




