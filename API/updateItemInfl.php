<?php
require_once('db_connection.php');

$conn = OpenCon();

$family = $_POST['fname'];
$item = $_POST['item'];
$quan = $_POST['quan'];

$sql = "UPDATE itemsInFamilyList SET states= 'bought',quantity='$quan' WHERE familyName= '$family' AND itemName='$item'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>