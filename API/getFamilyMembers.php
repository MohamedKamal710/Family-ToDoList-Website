<?php
require_once('db_connection.php');

$conn = OpenCon();

$return_arr = array();

$familyName = $_POST['fname'];

$sql = "SELECT M.userEmail,U.nickName,U.phonenumber From memberIn as M inner join users as U on U.email = M.userEmail WHERE  familyName = '$familyName' AND ApproveStatus = 'Y' ";

$result = $conn->query($sql);

 
while($row = mysqli_fetch_array($result)){
    $user = $row['userEmail'];
    $phone = $row['phonenumber'];
    $nick = $row['nickName'];

    $return_arr[] = array("email" => $user,
                            "nickname" => $nick,
                            "phone" => $phone);
}

// Encoding array in JSON format
echo json_encode($return_arr);

?>