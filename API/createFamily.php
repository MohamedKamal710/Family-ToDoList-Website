<?php
require_once('db_connection.php');

$conn = OpenCon();

$email = $_POST['email'];
$familyName = $_POST['familyName'];

$sql = "INSERT INTO family (familyName,managerEmail) values('$familyName','$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>