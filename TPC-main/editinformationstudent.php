<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form
    $rollno = $_POST["rollno"];
    $st_name = $_POST["st_name"];
    $st_age = $_POST["st_age"];
    $specialization = $_POST["specialization"];
    $areaofinterest = $_POST["areaofinterest"];
    $batchyear=$_POST["batchyear"];
   $cpi = $_POST["cpi"];

    // Prepare the SQL query
    $sql = "UPDATE st_users SET st_name=?, st_age=?, specialization=?, areaofinterest=?, cpi=? WHERE rollno=$rollno";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("ssssdi", $st_name, $st_age, $specialization, $areaofinterest, $cpi, $rollno);

    // Execute the statement
    $stmt->execute();

    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Information updated successfully";
    } else {
        echo "No rows were updated";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Information</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Edit Student Information</h2>
	<form action="editinformation.php" method="post">
		<label for="rollno">Roll Number:</label><br>
		<input type="text" id="rollno" name="rollno"><br>

		<label for="st_name">Name:</label><br>
		<input type="text" id="st_name" name="st_name"><br>

		<label for="st_age">Age:</label><br>
		<input type="number" id="st_age" name="st_age"><br>

		<label for="specialization">Specialization:</label><br>
		<input type="text" id="specialization" name="specialization"><br>

		<label for="areaofinterest">Area of Interest:</label><br>
		<input type="text" id="areaofinterest" name="areaofinterest" required><br>

		<label for="cpi">CPI:</label><br>
		<input type="number" step="0.01" id="cpi" name="cpi" required><br>
       

		<input type="submit" value="Update Information">
	</form>
</body>
</html>
