<!DOCTYPE html>
<html>
<head>
    <title>TCS Placement Trends</title>
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
    <h1>TCS Placement Trends</h1>
    <?php
        $dsn = 'mysql:host=localhost;dbname=tpc;charset=utf8';
        $username = 'root';
        $password = '';
        
        try {
            // Connect to the database
            $dbh = new PDO($dsn, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Query the database to get placement data for TCS for the last three years
            $sql_2019 = 'SELECT COUNT(DISTINCT rollno) AS num_students, AVG(ctc) AS avg_ctc
                         FROM alumini
                         JOIN company ON alumini.company_name = company.companyname
                         WHERE company.companyname = "tcs" AND alumini.placedyear = 2019';
            $sql_2020 = 'SELECT COUNT(DISTINCT rollno) AS num_students, AVG(ctc) AS avg_ctc
                         FROM alumini
                         JOIN company ON alumini.company_name = company.companyname
                         WHERE company.companyname = "tcs" AND alumini.placedyear = 2020';
            $sql_2021 = 'SELECT COUNT(DISTINCT rollno) AS num_students, AVG(ctc) AS avg_ctc
                         FROM alumini
                         JOIN company ON alumini.company_name = company.companyname
                         WHERE company.companyname = "tcs" AND alumini.placedyear = 2021';
            $stmt_2019 = $dbh->query($sql_2019);
            $stmt_2020 = $dbh->query($sql_2020);
            $stmt_2021 = $dbh->query($sql_2021);
            $result_2019 = $stmt_2019->fetch(PDO::FETCH_ASSOC);
            $result_2020 = $stmt_2020->fetch(PDO::FETCH_ASSOC);
            $result_2021 = $stmt_2021->fetch(PDO::FETCH_ASSOC);

            
            echo '<table>';
            echo '<tr><th>Year</th><th>Number of students placed</th><th>Average CTC</th></tr>';
            echo '<tr><td>2019</td><td>' . $result_2019['num_students'] . '</td><td>' . $result_2019['avg_ctc'] . '</td></tr>';
            echo '<tr><td>2020</td><td>' . $result_2020['num_students'] . '</td><td>' . $result_2020['avg_ctc'] . '</td></tr>';
            echo '<tr><td>2021</td><td>' . $result_2021['num_students'] . '</td><td>' . $result_2021['avg_ctc'] . '</td></tr>';
            echo '</table>';

        } catch (PDOException $e) {
            
            echo 'Database error: ' . $e->getMessage();
        }
    ?>
</body>
</html>