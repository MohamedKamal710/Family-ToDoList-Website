<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$familyName = $_POST['fname'];
$email = $_POST['email'];
$userEmail = $_POST['userEmail'];

$sql = "UPDATE  memberIn  SET ApproveStatus = 'Y'  WHERE managerEmail = '$email' AND  familyName = '$familyName' AND userEmail = '$userEmail'";

$result = $conn->query($sql);

 
if ($result === TRUE) {
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>