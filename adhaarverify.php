<?php
require 'connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idType = $_POST['id_type'];
    $idNumber = $_POST['id_number'];
    $session_email = $_SESSION['email'];
    if ($idType == 'aadhaar') {
        $session_email = $_SESSION['email'];
        $sql = "INSERT INTO verification (session_email,aadhar_no) VALUES ('$session_email','$idNumber')";
    } else if ($idType == 'pan') {
       
        $sql = "INSERT INTO verification (session_email,pan_no) VALUES ('$session_email','$idNumber')";
    } else {
        
        echo json_encode(['success' => false, 'message' => 'Invalid ID type.']);
        exit;
    }

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
    }
} else {
    echo 'Invalid request method.';
}
?>