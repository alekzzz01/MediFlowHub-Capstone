<?php 


require 'db.php';



$token = $_REQUEST['token'];

$sql = "SELECT Activated FROM users where Token = '$token'";
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
 
$sql2 = "UPDATE users SET Activated='1' WHERE Token = '$token'";
if ($conn->query($sql2) === TRUE) {
    echo "Account Activated Successfully, Proceed to login";
  } else {
    echo "Error While Activating : " . $conn->error;
  }

} else {
  echo "0 results";
}











?>