<?php
require_once('db_connection.php');

$conn = OpenCon();

$list = $_POST['listID'];
$email = $_POST['email'];
$item = $_POST['itemName'];

$sql = "DELETE FROM items WHERE itemName ='$item' AND email ='$email' AND listID='$list'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

  } else {

    echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>