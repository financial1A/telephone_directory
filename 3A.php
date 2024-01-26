
<?php
header('Content-Type: application/json');

// Database configuration
$dbHost = '127.0.0.1:3000';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'financia_mileage';

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the q and d parameters from the GET request
$q = $_GET['q'];
$d = $_GET['d'];
$l = $_GET['l'];

// Prepare the SQL query
$stmt = $conn->prepare("SELECT Name,ext,mobile,Dept,location FROM tablename WHERE (Name LIKE ? AND Dept LIKE ?)");
$searchQ ='%'.$q . '%';
$searchD = '%'.$d . '%';
$searchL = '%'.$l . '%';
$stmt->bind_param('ss', $searchQ, $searchD);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch all rows as an associative array
$suggestions = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement and the connection
$stmt->close();
$conn->close();

// Return the suggestions as a JSON object
echo json_encode($suggestions);
?>
