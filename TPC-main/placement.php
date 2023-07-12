<!DOCTYPE html>
<html>
<head>
    <title>Placed Alumni Details</title>
    
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
    <h1>Placed Alumni Details</h1>
    <form method="post">
        <label for="company">Enter Company Name:</label>
        <input type="text" id="company" name="company" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Replace 'your_db_username' and 'your_db_password' with your actual database username and password
            $dsn = 'mysql:host=localhost;dbname=tpc;charset=utf8';
            $username = 'root';
            $password = '';

            try {
                $company = $_POST['company'];
                // Connect to the database
                $dbh = new PDO($dsn, $username, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $dbh->prepare('SELECT st_name, rollno, ctc, company_name, position, placedyear FROM company INNER JOIN alumini ON company.companyname = alumini.company_name WHERE company.companyname = :company');
                $stmt->bindParam(':company', $company);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    echo '<h2>Placed Alumni Details for ' . $company . '</h2>';
                    echo '<table>';
                    // Display attribute names as table header
                    echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Rollno</th>';
                    echo '<th>ctc</th>';
                    echo '<th>company</th>';
                    echo '<th>position</th>';
                    echo '<th>placedyear</th>';
                    echo '</tr>';
                    // Display rows of the table
                    $ctc_total = 0;
                    foreach ($rows as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['st_name'] . '</td>';
                        echo '<td>' . $row['rollno'] . '</td>';
                        echo '<td>' . $row['ctc'] . '</td>';
                        echo '<td>' . $row['company_name'] . '</td>';
                        echo '<td>' . $row['position'] . '</td>';
                        echo '<td>' . $row['placedyear'] . '</td>';
                        echo '</tr>';
                        $ctc_total += $row['ctc'];
                    }
                    echo '</table>';
                    // Display average ctc
                    $ctc_avg = $ctc_total / count($rows);
                    echo '<p>Average CTC(in Lakhs) for ' . $company . ' is: ' . $ctc_avg . '</p>';
                } else {
                    echo '<p>No data found for ' . $company . '</p>';
                }
            } catch (PDOException $e) {
                // Display an error message if the database connection fails
                echo 'Database error: ' . $e->getMessage();
           
            }
        }
    ?>
</body>
</html>