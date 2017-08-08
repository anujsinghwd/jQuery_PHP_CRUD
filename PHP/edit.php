<?php 
require 'connection.php';
$name = $_POST['name'];

$sql = "SELECT *FROM user_data WHERE name='$name' ";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$rows[] = $row;
}

print_r(json_encode($rows));

?>