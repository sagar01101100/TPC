<?php
session_start();
require_once 'db_conn.php';

if (isset($_POST['submit'])) {
    $companyname = $_POST['companyname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM company_signup WHERE companyname = '$companyname' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['companyname'] = $companyname;
        header('Location: uploadcompany.php');
        exit();
    } else {
        $error_message = "Invalid login credentials. Please try again.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Check</title>
</head>
<body>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>