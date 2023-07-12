<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
    <link rel="stylesheet" href="homePage.css">
</head>
<body>
	<!-- <h1>Welcome to the Homepage</h1>
	
	<ul>
		<li><a href="index.php">Index</a></li>
		
	</ul> -->
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="homePage.css">
	<title>Homepage</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Homepage</h1>
        <a href="index.php">Index</a>
        <!-- <ul>
            <li><a href="index.php">Index</a></li>
            
        </ul> -->
        <h1>Admin Panel</h1>
        <?php
            if(isset($_POST['password'])) {
                if($_POST['password'] === 'admin') {
                    header('Location: admin.php');
                    exit();
                }
                else {
                    echo '<p>Incorrect password.</p>';
                }
            }
        ?>
        <form method="post">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password">
            <!-- <br><br> -->
        </form>
        <input type="submit" value="Submit" class="btn">
    </div>
</body>
</html>