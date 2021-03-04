<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$list = $_POST['listID'];
$email = $_POST['email'];

$sql = "SELECT * From items WHERE listID = '$list' AND  email = '$email' ORDER BY itemName";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $itemName = $row['itemName'];
    $state = $row['states'];
    $quan = $row['quantity'];
    

    $return_arr[] = array("itemName" => $itemName,
                    "states" => $state,"quan" => $quan
                   );
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>