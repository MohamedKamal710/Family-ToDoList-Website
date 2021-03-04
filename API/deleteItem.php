<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];
$itemN = $_POST['item'];
$list = $_POST['list'];

$sql = "DELETE FROM items WHERE email = '$email' AND itemName = '$itemN' AND listID = '$list'";

$result = $conn->query($sql);



?>