<?php
require 'connection.php';
session_start();
if (isset($_REQUEST)) {
    $vehicle = $_POST['vehicle'];
    $city = $_POST['city'];
    $workarea = $_POST['area'];
    if($_POST['vehicle'] == ''|| $_POST['city'] == ''|| $_POST['area'] == '') {
        echo '0';
    }
else {
    $app_id=1;
    $session_email = $_SESSION['email'];
    $sql = "INSERT INTO vehicle_info(session_email,vehicle,city,area,app_id)
            VALUES ('$session_email','$vehicle','$city','$workarea','$app_id')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo '1';
    } else {
        echo '2';
    }
}
}