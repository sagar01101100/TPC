<?php 
session_start(); 
include"db_conn.php";

if (isset($_POST['companyname']) 
    && isset($_POST['password']) && isset($_POST['confirm-password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $companyname = validate($_POST['companyname']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm-password']);

    $user_data = 'company-name='. $companyname;

    if (empty($companyname)) {
        header("Location: companysignup.php?error=Username is required&$user_data");
        exit();
    }elseif (empty($password)) {
        header("Location: companysignup.php?error=Password is required&$user_data");
        exit();
    } elseif (empty($confirm_password)) {
        header("Location: companysignup.php?error=Confirm password is required&$user_data");
        exit();
    } elseif ($password !== $confirm_password) {
        header("Location: companysignup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
         //hashing the password
        // $password = md5($password);

        $sql = "SELECT * FROM company_signup WHERE companyname='$companyname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: companysignup.php?error=The companyname is already taken, please try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO company_signup(companyname, password) VALUES('$companyname', '$password')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: companysignup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: companysignup.php?error=Unknown error occurred while creating your account, please try again later&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: companysignup.php");
    exit();
}
