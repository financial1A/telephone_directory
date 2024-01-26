<?php
$servername = "127.0.0.1:3000";
$username = "root";
$password = "";
$dbname = "financia_Mileage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$date = new DateTime();
$date->modify('+6 hours');
$date1 = $date->format('Y-m-d H:i:s');


$sql = "INSERT INTO Messages (messages,ip,date) VALUES ('$message','$ip','$date1')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

