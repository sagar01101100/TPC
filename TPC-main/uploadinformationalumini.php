<!DOCTYPE html>
<html>
<head>
	<title>Alumini Information</title>
	<link rel="stylesheet" type="text/css" href="stylesignup.css">
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
		<h2>Alumini Information</h2>
		<div class="input-group">
        <label>rollno</label>
			<input type="text" name="rollno">
		</div>
			<label>Student Name</label>
			<input type="text" name="st_name">
		</div>
		<div class="input-group">
			<label>CPI</label>
			<input type="text" name="cpi">
		</div>
		<div class="input-group">
			<label>Company Name</label>
			<input type="text" name="company_name">
		</div>
		<div class="input-group">
			<label>CTC</label>
			<input type="text" name="ctc">
		</div>
		<div class="input-group">
			<label>Area</label>
			<input type="text" name="area">
		</div>
		<div class="input-group">
			<label>Position</label>
			<input type="text" name="position">
		</div>
		<div class="input-group">
			<label>Location</label>
			<input type="text" name="location">
		</div>
		<div class="input-group">
			<label>Working Tenure</label>
			<input type="text" name="working_tenure">
		</div>
		<div class="input-group">
			<label>PlacedYear</label>
			<input type="text" name="placedyear">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Submit</button>
		</div>
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tpc";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    
    $rollno=$_POST['rollno'];
	$st_name = $_POST['st_name'];
	$cpi = $_POST['cpi'];
	$company_name = $_POST['company_name'];
	$ctc = $_POST['ctc'];
	$area = $_POST['area'];
	$position = $_POST['position'];
	$location = $_POST['location'];
	$working_tenure = $_POST['working_tenure'];
	$placedyear=$_POST['placedyear'];

	$sql = "INSERT INTO alumini (st_name,rollno, cpi, company_name, ctc, area, position, location, working_tenure,placedyear)
	VALUES ('$st_name','$rollno', '$cpi', '$company_name', '$ctc', '$area', '$position', '$location', '$working_tenure','$placedyear')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>
