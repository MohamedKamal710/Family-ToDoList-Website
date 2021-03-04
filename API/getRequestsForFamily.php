<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$familyName = $_POST['fname'];
$email = $_POST['email'];

$sql = "SELECT userEmail From memberIn WHERE managerEmail = '$email' AND  familyName = '$familyName' AND ApproveStatus = 'N'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $user = $row['userEmail'];


    $return_arr[] = array("user" => $user);
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>