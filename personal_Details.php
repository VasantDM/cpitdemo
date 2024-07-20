<?php
require 'connection.php';
session_start();
if (isset($_REQUEST)) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    if($_POST['name'] == ''|| $_POST['dob'] == '') {
        echo '0';
    }
else {
    $app_id = 1;
    $session_email = $_SESSION['email'];
    $sql = "INSERT INTO personal_details(session_email,name,dob,app_id)
            VALUES ('$session_email','$name','$dob','$app_id')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
       
        echo '1';
    } else {
        echo '2';
    }
}
}