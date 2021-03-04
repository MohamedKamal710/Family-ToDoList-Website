<?php
require_once('db_connection.php');

$conn = OpenCon();

$list = $_POST['listID'];
$email = $_POST['email'];

$sql = "INSERT INTO lists (email,listID)
values('$email','$list')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



?>