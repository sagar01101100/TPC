<?php
session_start();
require_once 'db_conn.php';

if (!isset($_SESSION['rollno'])) {
    header('Location: login.php');
    exit();
}

$rollno = $_SESSION['rollno'];

$sql = "SELECT username FROM student_signup WHERE st_rollno = '$rollno'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
} else {
    $name = '';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="upload.css">
  </head>
  <body>
    <div class="container">
      <h2>Welcome  <?php echo $name ?></h2>
      <div class="button-container">
        <a href="uploadinformation.php" class="upload-button">Upload Information</a>
        <a href="showinformation.php" class="show-button">Show Information</a>
        <a href="eligiblecompanies.php?rollno=<?php echo $rollno ?>" class="eligible-button">eligiblecompany</a>
        
        <a href="logout.php" class="logout-button">Logout</a>
      </div>
    </div>
  </body>
</html>
