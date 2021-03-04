<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];

$sql = "SELECT DISTINCT itemName From items WHERE  email = '$email'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $itemName = $row['itemName'];
    
    

    $return_arr[] = array("itemName" => $itemName,
                    
                   );
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>