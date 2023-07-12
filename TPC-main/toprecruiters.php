<!DOCTYPE html>
<html>
<head>
    <title>Top Three Recruiting Companies</title>
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
    <h1>Top Recruiting Companies</h1>
    <?php
        
        $dsn = 'mysql:host=localhost;dbname=tpc;charset=utf8';
        $username = 'root';
        $password = '';

        try {
            // Connect to the database
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $dbh->query('SELECT company_name, AVG(ctc) AS avg_ctc, MAX(ctc) AS max_ctc FROM alumini GROUP BY company_name ORDER BY avg_ctc DESC LIMIT 3');
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                echo '<table>';
                // Display attribute names as table header
                echo '<tr>';
                echo '<th>Company</th>';
                echo '<th>Average CTC</th>';
                echo '<th>Highest CTC</th>';
                echo '</tr>';
                // Display rows of the table
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['company_name'] . '</td>';
                    echo '<td>' . number_format($row['avg_ctc'], 2) . '</td>';
                    echo '<td>' . $row['max_ctc'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No data found</p>';
            }
        } catch (PDOException $e) {
            // Display an error message if the database connection fails
            echo 'Database error: ' . $e->getMessage();
        }
    ?>
</body>
</html>
