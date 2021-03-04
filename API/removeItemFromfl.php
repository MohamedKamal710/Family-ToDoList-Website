<?php
require_once('db_connection.php');

$conn = OpenCon();

$family = $_POST['fname'];
$item = $_POST['itemName'];

$sql = "DELETE FROM itemsInFamilyList WHERE familyName= '$family' AND itemName='$item'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>