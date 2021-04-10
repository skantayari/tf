<?php

session_start();
include("functions.php");


require 'config/db.php';

$errors = array();

if (isset($_POST['singup_btn'])){
    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconf = $_POST['passwordconf'];

    if (empty($username)) {
        $errors['user_name'] = "User name required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email address is incorrect";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }

    if ($password !== $passwordconf) {
        $errors['password'] = "Passwords doesn't match";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email already exist";
    }

    if( count($errors) === 0) { 

        //save to database
        $id = random_num(20);
        $query = "insert into users (id,username,email,password) values ('$id','$username','$email','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }
}

