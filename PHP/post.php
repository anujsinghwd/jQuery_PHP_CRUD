<?php 
require 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
if (!empty($name)) {
$sql = "SELECT *FROM user_data WHERE name='$name' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo 'User already Exists';
}
else{
$sql = "INSERT INTO user_data(name, email, mobile) VALUES('$name', '$email', '$mobile')";
if ($conn->query($sql) === TRUE) {
	echo 'User Added SuccessFully';
}
}
}
?>