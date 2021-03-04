<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();


$email = $_POST['email'];

$sql = "SELECT  * From users WHERE  email = '$email'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $userName = $row['email'];
    
    

    $return_arr[] = array('email' => $userName
                    
                   );
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>