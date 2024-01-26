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

    $pass = $_POST['token'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM tablename WHERE ID1 = ?");
    $stmt->bind_param("i", $pass);

    // Execute the statement
    $stmt->execute();


    // Close the statement and the connection
    $stmt->close();
    $conn->close();
?>
