<?php

session_start();

//initialize variables

$username = "";
$email = "";

$errors =array();

//conncet to the database

$db = mysqli_connect('localhost','root','','practice') or die("could not connect to database");

//register user

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$designdetails = mysqli_real_escape_string($db, $_POST['designdetails']);

//form validation
if(empty($username)){ array_push($errors, "Username is required") };
if(empty($email)){ array_push($errors, "email Id is required") };
if(empty($phone)){ array_push($errors, "phone Number Id is required") };
if(empty($designdetails)){ array_push($errors, "Design Details Id is required") };

//check db for existing user with same username

$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

$results = mysql_query($db, $user_check_query);
$user = mysql_fetch_assoc($results);

if($user){
    if($user['username'] === $username){array_push($errors, "Username already exists");
    if($user['email'] === $username){array_push($errors, "email Id already exists");
}

//register user if no error

    if(count($errors) == 0){
        $query = "INSERT INTO users (username, email, phone, designdetails) VALUES ('$username', '$email', '$phone', '$designdetails')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now Register";

        header('location: index.php');
































?>