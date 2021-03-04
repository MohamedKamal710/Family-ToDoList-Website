<?php
require_once('db_connection.php');

$conn = OpenCon();

$list = $_POST['listID'];
$email = $_POST['email'];
$item = $_POST['item'];
$states = $_POST['states'];
$quan = $_POST['quantity'];

$sql = "UPDATE items SET states = '$states',quantity = '$quan' 
WHERE itemName = '$item' AND email = '$email' AND listID = '$list'";
$result = $conn->query($sql);


if ($result === TRUE) {
    echo "record updated successfully";
   
  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }





?>