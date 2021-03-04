<?php
require_once('db_connection.php');

$conn = OpenCon();

$family = $_POST['fname'];
$item = $_POST['item'];

$sql = "INSERT INTO itemsInFamilyList (familyName,itemName) values('$family','$item')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>