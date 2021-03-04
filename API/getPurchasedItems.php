<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];

$sql = "SELECT itemName,listID,quantity as quan From items WHERE  email = '$email' AND states = 'bought'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $itemName = $row['itemName'];
    $listi = $row['listID'];
    $quan = $row['quan'];
    
    

    $return_arr[] = array("itemName" => $itemName,"listID" => $listi ,"quantity" => $quan);
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>