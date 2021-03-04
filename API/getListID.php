<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];

$sql = "SELECT listID FROM lists WHERE `email` = '$email'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $listi = $row['listID'];
    
    

    $return_arr[] = array("listID" => $listi);
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>