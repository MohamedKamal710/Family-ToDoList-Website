<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];
$itemN = $_POST['item'];
$new = $_POST['new'];
$list = $_POST['list'];

$sql = "UPDATE items SET itemName = '$new' WHERE email = '$email' AND itemName = '$itemN' AND listID = '$list'";

$result = $conn->query($sql);



?>