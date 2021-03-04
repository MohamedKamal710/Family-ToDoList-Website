<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$email = $_POST['email'];
$sql = "SELECT * From memberIn WHERE userEmail ='$email' AND ApproveStatus = 'N'";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $fname = $row['familyName'];
    $manager =$row['managerEmail'];
    $email = $row['userEmail'];
    
    $return_arr[] = array("familyName" => $fname,
                    "userEmail" => $email,
                    "manager" => $manager
                   );
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>