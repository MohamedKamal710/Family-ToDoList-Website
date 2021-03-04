<?php
require_once('db_connection.php');

$conn = OpenCon();


$email = $_POST['email'];
$cookie = $_POST['cookie'];


$sql = "UPDATE users SET cookie = '$cookie' WHERE email = '$email'";
$result = $conn->query($sql);


if ($result === TRUE) {
    echo "record updated successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>