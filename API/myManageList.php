<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$email = $_POST['email'];

$sql = "SELECT familyName From family WHERE managerEmail = '$email' ";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $fname = $row['familyName'];
    $return_arr[] = array("fname" => $fname);
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>