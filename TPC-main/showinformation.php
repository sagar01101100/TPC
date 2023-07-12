<?php
session_start();
require_once 'db_conn.php';

if (!isset($_SESSION['rollno'])) {
    header('Location: login.php');
    exit();
}

$rollno = $_SESSION['rollno'];

$sql = "SELECT * FROM st_users WHERE rollno = '$rollno'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $rollno=$row['rollno'];
    $name = $row['st_name'];
    
    $age = $row['st_age'];
    $specialization = $row['specialization'];
    $areaofinterest = $row['areaofinterest'];
    $batchyear = $row['batchyear'];
    $isplaced = $row['isplaced'];
    $placedpackage = $row['placedpackage'];
    $currentpackage = $row['currentpackage'];
    $class10marks = $row['class10marks'];
    $class12marks = $row['class12marks'];
    $cpi = $row['cpi'];
} else {
    $rollno="null";
    $name = "null";
    $age = "null";
    $specialization = "null";
    $areaofinterest = "null";
    $batchyear = "null";
    $isplaced = "null";
    $placedpackage = "null";
    $currentpackage = "null";
    $class10marks = "null";
    $class12marks = "null";
    $cpi = "null";
    $message = "Please upload your information.";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Show Information</title>
    <link rel="stylesheet" type="text/css" href="showinformation.css">
  </head>
  <body>
    <h2 class="main-heading" >Information</h2>
    <div class="info-container">
        <div class="left">
            <div class="container">
              <?php if(isset($message)) { ?>
                <p class="error"><?php echo $message ?></p>
              <?php } ?>
              <div class="input-container">
                <label for="rollno">Rollno:</label>
                <p><?php echo $rollno ?></p>
              </div>
              <div class="input-container">
                <label for="name">Name:</label>
                <p><?php echo $name ?></p>
              </div>
              <div class="input-container">
                <label for="age">Age:</label>
                <p><?php echo $age ?></p>
              </div>
              <div class="input-container">
                <label for="specialization">Specialization:</label>
                <p><?php echo $specialization ?></p>
              </div>
              <div class="input-container">
                <label for="areaofinterest">Area of Interest:</label>
                <p><?php echo $areaofinterest ?></p>
              </div>
              <div class="input-container">
                <label for="batchyear">Batch Year:</label>
                <p><?php echo $batchyear ?></p>
              </div>
              <div class="input-container">
                <label for="isplaced">Placed:</label>
                <p><?php echo $isplaced ?></p>
              </div>
            </div>
        </div>
        <div class="right">
            <div class="container">
            <div class="input-container">
                <div class="input-container">
                    <label for="isplaced">Placed:</label>
                    <p><?php echo $isplaced ?></p>
                </div>
                <label for="placedpackage">Placed Package(in lakhs):</label>
                <p><?php echo $placedpackage ?></p>
                </div>
                <div class="input-container">
                <label for="currentpackage">Current Package(in lakhs):</label>
                <p><?php echo $currentpackage ?></p>
                </div>
                <div class="input-container">
                <label for="class10marks">Class 10 Marks(in Percent):</label>
                <p><?php echo $class10marks ?></p>
                </div>
        
                <div class="input-container">
                    <label for="class12marks">class12marks(in Percent):</label>
                    <p><?php echo $class12marks ?></p>
                </div>
        
                <div class="input-container">
                    <label for="cpi">CPI:</label>
                    <p><?php echo $cpi ?></p>
                </div>
            </div>
        </div>
    </div>
    <button class="btn" onclick="location.href='upload.php'">Back</button>
      
  </body>
</html>