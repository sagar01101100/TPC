<?php 
session_start(); 
include"db_conn.php";

if (isset($_POST['username']) && isset($_POST['rollno'])
    && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $rollno = validate($_POST['rollno']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    $user_data = 'username='. $username. '&rollno='. $rollno;

    if (empty($username)) {
        header("Location: aluminisignup.php?error=Username is required&$user_data");
        exit();
    } elseif (empty($rollno)) {
        header("Location: aluminisignup.php?error=Roll number is required&$user_data");
        exit();
    }  elseif (empty($password)) {
        header("Location: aluminisignup.php?error=Password is required&$user_data");
        exit();
    } elseif (empty($confirm_password)) {
        header("Location: aluminisignup.php?error=Confirm password is required&$user_data");
        exit();
    } elseif ($password !== $confirm_password) {
        header("Location: aluminisignup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
         //hashing the password
        //$password = md5($password);

        $sql = "SELECT * FROM alumini_signup WHERE Rollno='$rollno' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: aluminisignup.php?error=The roll number is already taken, please try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO alumini_signup(username, Rollno, password) VALUES('$username', '$rollno', '$password')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: aluminisignup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: aluminisignup.php?error=Unknown error occurred while creating your account, please try again later&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}
