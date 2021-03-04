<?php
require_once('db_connection.php');

$conn = OpenCon();

$manager = $_POST['manager'];
$familyName = $_POST['family'];
$email = $_POST['email'];

$sql = "INSERT INTO memberin (userEmail,familyName,managerEmail,ApproveStatus)
values('$email','$familyName','$manager','N')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



?>