<!DOCTYPE html>
<html>
<head>
    <title>Show Alumni Information</title>
    <link rel="stylesheet" type="text/css" href="showinformationalumini.css">
</head>
<body>
    <div class="container">
        <?php
        // Start session
        session_start();

        // Check if user is logged in, if not redirect to login page
        if (!isset($_SESSION["rollno"])) {
            header("Location: loginalumini.php");
            exit;
        }

        // Database connection
        $conn = new mysqli("localhost", "root", "", "tpc");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve information for current user
        $rollno = $_SESSION["rollno"];

        $sql = "SELECT * FROM alumini WHERE rollno = '$rollno'";
        $result = $conn->query($sql);
        // Display information if available, else display null
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>Student Name: " . $row["st_name"] . "</p>";
            echo "<p>CPI: " . $row["cpi"] . "</p>";
            echo "<p>Company Name: " . $row["company_name"] . "</p>";
            echo "<p>CTC: " . $row["ctc"] . "</p>";
            echo "<p>Area: " . $row["area"] . "</p>";
            echo "<p>Position: " . $row["position"] . "</p>";
            echo "<p>Location: " . $row["location"] . "</p>";
            echo "<p>Working Tenure: " . $row["working_tenure"] . "</p>";
            echo "<p>Placedyear: " . $row["placedyear"] . "</p>";
        } else {
            echo "<p>Null</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

