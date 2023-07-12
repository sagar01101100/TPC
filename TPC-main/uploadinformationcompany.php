<!DOCTYPE html>
<html>
<head>
	<title>Upload Company Information</title>
    <link rel="stylesheet" type="text/css" href="showinformation.css">
</head>
<body>
	<?php
	// Create a connection to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tpc";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Check if the form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    // Retrieve the company information from the form data
	    $companyname = $_POST['companyname'];
	    $required_details = $_POST['required_details'];
	    $minimum_qualification = $_POST['minimum_qualification'];
	    $marks_criteria = $_POST['marks_criteria'];
	    $salary_package = $_POST['salary_package'];
	    $interview_mode = $_POST['interview_mode'];
	    $recruitment_start_year = $_POST['recruitment_start_year'];

	    // Insert the company information into the "company" table
	    $sql = "INSERT INTO company (companyname, required_details, minimum_qualification, marks_criteria, salary_package, interview_mode, recruitment_start_year)
	    VALUES ('$companyname', '$required_details', '$minimum_qualification', '$marks_criteria', '$salary_package', '$interview_mode', $recruitment_start_year)";

	    if ($conn->query($sql) === TRUE) {
	        echo "Company information uploaded successfully";
	    } else {
	        echo "Error: " . $sql . "<br>" . $conn->error;
	    }
	}

	// Close the database connection
	$conn->close();
	?>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="companyname">Company Name:</label>
		<input type="text" id="companyname" name="companyname" required><br>

		<label for="required_details">Required Details:</label>
		<input type="text" id="required_details" name="required_details" required><br>

		<label for="minimum_qualification">Minimum Qualification:</label>
		<input type="text" id="minimum_qualification" name="minimum_qualification" required><br>

		<label for="marks_criteria">Marks Criteria(Minimumcpi):</label>
		<input type="text" id="marks_criteria" name="marks_criteria" required><br>

		<label for="salary_package">Salary Package:</label>
		<input type="text" id="salary_package" name="salary_package" required><br>

		<label for="interview_mode">Interview Mode:</label>
		<input type="text" id="interview_mode" name="interview_mode" required><br>

		<label for="recruitment_start_year">Recruitment Start Year:</label>
		<input type="number" id="recruitment_start_year" name="recruitment_start_year" required><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
