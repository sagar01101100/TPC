<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
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
    <h1>Admin Panel</h1>
    <?php
       
        $dsn = 'mysql:host=localhost;dbname=tpc;charset=utf8';
        $username = 'root';
        $password = '';

        try {
            // Connect to the database
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // If a button has been clicked, show the table data
            if (isset($_POST['table'])) {
                $table = $_POST['table'];
                $stmt = $dbh->query('SELECT * FROM ' . $table);
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) > 0) {
                    echo '<h2>' . $table . '</h2>';
                    echo '<table>';
                    // Display attribute names as table header
                    echo '<tr>';
                    foreach ($rows[0] as $key => $value) {
                        echo '<th>' . $key . '</th>';
                    }
                    echo '</tr>';
                    // Display rows of the table
                    foreach ($rows as $row) {
                        echo '<tr>';
                        foreach ($row as $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<p>No data found in ' . $table . '</p>';
                }
            }
            
            // Get all table names from the database
            $stmt = $dbh->query('SHOW TABLES');
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            // Create buttons for each table
            echo '<form method="post">';
            foreach ($tables as $table) {
                echo '<input type="submit" name="table" value="' . $table . '">';
            }
            echo '<input type="submit" name="table" value="PlacementCompany">';
            echo '<input type="button" onclick="window.location.href=\'placement.php\'" value="Placementdata">';
            echo '<input type="button" onclick="window.location.href=\'toprecruiters.php\'" value="Top Recruiters">';
            echo '<input type="button" onclick="window.location.href=\'tcslast2.php\'" value="TCS IN LAST THREE YEARS">';
            echo '<input type="button" onclick="window.location.href=\'marcedes.php\'" value="Student Eligible for marcedes">';
            echo '</form>';
        } catch (PDOException $e) {
            // Display an error message if the database connection fails
            echo 'Database error: ' . $e->getMessage();
        }
    ?>
</body>
</html>
