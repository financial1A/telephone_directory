<?php
    // Database connection
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

    // Get data from the Fetch API
    $data = json_decode(file_get_contents('php://input'), true);
    $ref = $data['ref'];
$No = $data['ref5'];


    // Update query
    $sql = "UPDATE tablename SET mobile='$No' WHERE ID1='$ref'";

    // Execute query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
?>
