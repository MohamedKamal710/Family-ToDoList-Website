<?php
require_once('db_connection.php');

$conn = OpenCon();

$list = $_POST['listID'];
$email = $_POST['email'];
$item = $_POST['item'];

$sql = "INSERT INTO items (email,listID,itemName) values('$email','$list','$item')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>