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

if (isset($_GET['companyname'])) {
  $companyname = $_GET['companyname'];
} else {
  echo "Company name not specified.";
  exit();
}




$sql = "SELECT st_name,rollno,company_name,ctc,placedyear FROM  alumini
JOIN company 
ON  
company.companyname='$companyname' AND alumini.placedyear>=2019";
	
	
	
        
        

$result = $conn->query($sql);

// Display the data in a table format

echo "<table>
        <tr>
            <th>ST_NAME</th>
            <th>ROLLNO</th>
            <th>COMPANY_NAME</th>
            <th>CTC</th>
           <th>PLACEDYEAR</th>
            
            
        </tr>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["st_name"]."</td>
            <td>".$row["rollno"]."</td>
            <td>".$row["company_name"]."</td>
            <td>".$row["ctc"]."</td>
            <td>".$row["placedyear"]."</td>
           </tr>";
  }
} else {
  echo "<tr><td colspan='19'>No records found</td></tr>";
}
echo "</table>";

// Close database connection
$conn->close();
?>
