<?php 
$conn = new mysqli('localhost', 'root', '', 'software');
if ($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT name FROM apple");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['name'] . '<br>';
	}
}
?>
