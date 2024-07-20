<?php
require 'connection.php';
session_start();
if (isset($_REQUEST)) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $app_id = 1;
    if($_POST['name'] == ''|| $_POST['mobile'] == ''|| $_POST['dob'] == ''|| $_POST['email'] == ''|| $_POST['password'] == '') {
        echo '0';
    }
else {
    $sql = "INSERT INTO signup (name,mobile,dob,email,password,app_id)
            VALUES ('$name','$mobile','$dob','$email','$password','$app_id')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $_SESSION["email"] = $email;
        // print_r($_SESSION["email"]);exit;
        echo '1';
    } else {
        echo '2';
    }
}
}