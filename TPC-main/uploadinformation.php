<?php
session_start();
require_once 'db_conn.php';

if (!isset($_SESSION['rollno'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $rollno = $_SESSION['rollno'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $specialization = $_POST['specialization'];
    $areaofinterest = $_POST['areaofinterest'];
    $batchyear = $_POST['batchyear'];
    $isplaced = $_POST['isplaced'];
    $placedpackage = $_POST['placedpackage'];
    $currentpackage = $_POST['currentpackage'];
    $class10marks = $_POST['class10marks'];
    $class12marks = $_POST['class12marks'];
    $cpi = $_POST['cpi'];
    
    // Check if information already exists
    $sql_check = "SELECT * FROM st_users WHERE rollno='$rollno'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        $error_message = "Information for this roll no. already exists and cannot be uploaded again.";
    } else {
        $sql = "INSERT INTO st_users(rollno,st_name, st_age, specialization, areaofinterest, batchyear, isplaced, placedpackage, currentpackage, class10marks, class12marks, cpi) VALUES ('$rollno', '$name', '$age', '$specialization', '$areaofinterest', '$batchyear', '$isplaced', '$placedpackage', '$currentpackage', '$class10marks', '$class12marks', '$cpi')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: upload.php');
            exit();
        } else {
            $error_message = "Failed to upload information. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Upload Information</title>
    <link rel="stylesheet" type="text/css" href="stylesignup.css">
  </head>
  <body>
    <div class="container">
      <h2>Upload Information</h2>
      <?php if(isset($error_message)) { ?>
        <p class="error"><?php echo $error_message ?></p>
      <?php } ?>
      <form method="post">
        <div class="input-container">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="input-container">
          <label for="age">Age:</label>
          <input type="text" id="age" name="age" required>
        </div>
        <div class="input-container">
          <label for="specialization">Specialization:</label>
          <input type="text" id="specialization" name="specialization" required>
        </div>
        <div class="input-container">
          <label for="areaofinterest">Area of Interest:</label>
          <input type="text" id="areaofinterest" name="areaofinterest" required>
        </div>
         <div class="input-container">
          <label for="batchyear">Batch Year:</label>
          <input type="text" id="batchyear" name="batchyear" required>
        </div>
        <div class="input-container">
          <label for="isplaced">Placed:</label>
          <select id="isplaced" name="isplaced" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div class="input-container">
          <label for="placedpackage">Placed Package:</label>
          <input type="text" id="placedpackage" name="placedpackage" required>
      </div>

 <div class="input-container">
          <label for="currentpackage">Placed Package:</label>
          <input type="text" id="currentpackage" name="currentpackage" required>
      </div>

      <div class="input-container">
          <label for="class10marks">class10 marks:</label>
          <input type="number" id="class10marks" name="class10marks" required>
      </div>

      <div class="input-container">
          <label for="class12marks">class12marks:</label>
          <input type="number" id="class12marks" name="class12marks" required>
      </div>

      <div class="input-container">
          <label for="cpi">CPI:</label>
          <input type="text" id="cpi" name="cpi" required>
      </div>

      <button type="submit" name="submit">Upload</button>
      </form>
    </div>
  </body>
</html>