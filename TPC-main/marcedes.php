<!DOCTYPE html>
<html>
<head>
    <title>ELIGIBLE STUDENTS</title>
    
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
<body>












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






$sql = "SELECT rollno, st_name, st_age,areaofinterest, batchyear, class10marks, class12marks, cpi
        FROM st_users 
        JOIN company 
        ON st_users.cpi >= 8 
        AND st_users.placedpackage <= 40 AND company.companyname='marcedesbenz'";
        

$result = $conn->query($sql);

// Display the data in a table format

echo "<table>
        <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Batch Year</th>
           <th>Class 10 Marks</th>
            <th>Class 12 Marks</th>
            <th>CPI</th>
            
        </tr>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["rollno"]."</td>
            <td>".$row["st_name"]."</td>
            <td>".$row["st_age"]."</td>
            
            <td>".$row["batchyear"]."</td>
            <td>".$row["class10marks"]."</td>
            <td>".$row["class12marks"]."</td>
            <td>".$row["cpi"]."</td>
            
          </tr>";
  }
} else {
  echo "<tr><td colspan='19'>No records found</td></tr>";
}
echo "</table>";

// Close database connection
$conn->close();
?>
