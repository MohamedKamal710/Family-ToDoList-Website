<?php
require_once('db_connection.php');

$conn = OpenCon();

$familyName = $_POST['fname'];
$memail = $_POST['memail'];
$uemail = $_POST['uemail'];

$sql = "UPDATE memberIn SET ApproveStatus = 'Y' 
WHERE managerEmail = '$memail' AND userEmail = '$uemail' AND familyName = '$familyName'";
$result = $conn->query($sql);


if ($result === TRUE) {
    echo "record updated successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>