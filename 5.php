<?php
$servername = "127.0.0.1:3000";
$username = "root";
$password = "";
$dbname = "financia_Mileage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = isset($_POST['name']) ? $_POST['name'] : '';

$sql = "DELETE FROM tablename WHERE name = '$name'";
$result = $conn->query($sql);

if ($result === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
