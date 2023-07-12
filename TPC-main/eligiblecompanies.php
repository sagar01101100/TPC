<!DOCTYPE html>
<html>
<head>
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: skyblue;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #444;
            color: white;
        }
    </style>
</head>
</html>











<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpc";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['rollno'])) {
  $rollno = $_GET['rollno'];
} else {
  echo "rollno not specified.";
  exit();
}




$sql = "SELECT companyname,salary_package,interview_mode,recruitment_start_year
        FROM st_users 
        JOIN company 
        ON st_users.cpi >= company.marks_criteria 
        AND st_users.placedpackage <= company.salary_package AND st_users.rollno='$rollno'";
        

$result = $conn->query($sql);

// Display the data in a table format

echo "<table>
        <tr>
            <th>CompanyName</th>
            <th>salary_package</th>
            <th>Interview_mode</th>
            <th>Recruitmentyear</th>
          
            
        </tr>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["companyname"]."</td>
            <td>".$row["salary_package"]."</td>
            <td>".$row["interview_mode"]."</td>
            <td>".$row["recruitment_start_year"]."</td>
            
            
          </tr>";
  }
} else {
  echo "<tr><td colspan='19'>No companies found</td></tr>";
}
echo "</table>";

// Close database connection
$conn->close();
?>
