<!DOCTYPE html>
<html>
<head>
    <title>Show Company Information</title>
    <link rel="stylesheet" type="text/css" href="showinformationalumini.css">
</head>
<body>
    <div class="container">
        <?php
        // Start session
        session_start();

        // Check if user is logged in, if not redirect to login page
        if (!isset($_SESSION["companyname"])) {
            header("Location: logincompany.php");
            exit;
        }

        // Database connection
        $conn = new mysqli("localhost", "root", "", "tpc");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve information for current user
        $companyname = $_SESSION["companyname"];

        $sql = "SELECT * FROM company WHERE companyname = '$companyname'";
        $result = $conn->query($sql);

        // Display information if available, else display null
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
			echo "<p>CompanyName: " . $row["companyname"] . "</p>";
            echo "<p>Required Details: " . $row["required_details"] . "</p>";
            echo "<p>Minimum Qualification: " . $row["minimum_qualification"] . "</p>";
            echo "<p>Marks Criteria: " . $row["marks_criteria"] . "</p>";
            echo "<p>Salary Package: " . $row["salary_package"] . "</p>";
            echo "<p>Interview Mode: " . $row["interview_mode"] . "</p>";
            echo "<p>Recruitment Start Year: " . $row["recruitment_start_year"] . "</p>";
        } else {
            echo "<p>Null</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
