<?php 
require 'connection.php';
$id = $_POST['id'];

$sql = "DELETE FROM user_data WHERE id='$id' ";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    //echo "Error deleting record: " . $conn->error;
}


?>