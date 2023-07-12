<?php
session_start();
require_once 'db_conn.php';

if (!isset($_SESSION['companyname'])) {
    header('Location: index.php');
    exit();
}

$companyname = $_SESSION['companyname'];

$sql = "SELECT companyname FROM company_signup WHERE companyname = '$companyname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['companyname'];
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
      <h2>Welcome To <?php echo $name ?></h2>
      <div class="button-container">
        <a href="uploadinformationcompany.php" class="upload-button">Register for taking placement</a>
        <a href="showinformationcompany.php" class="show-button">Show Information</a>
        <a href="logout.php" class="logout-button">Logout</a>
        <a href="eligiblestudents.php?companyname=<?php echo $companyname ?>" class="eligible-button">eligiblestudentsforcompany</a>
        
      </div>
    </div>
  </body>
</html>
