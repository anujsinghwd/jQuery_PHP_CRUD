<?php 
require 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$id = $_POST['id'];

$sql = "UPDATE user_data SET name='$name', email='$email',mobile='$mobile' WHERE id='$id' ";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
}
?>