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
    $stmt = $conn->prepare("SELECT * FROM token WHERE token = ?");
    $stmt->bind_param("s", $pass);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check the credentials
    if ($result->num_rows > 0) {
 	$stmt = $conn->prepare("SELECT * FROM messages WHERE date >= NOW() - INTERVAL 7 DAY");


        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
             echo '<span>'.$row['date'].' - </span><p style="background-color:rgb(26, 255, 26,0.5);width:700px;">'.htmlspecialchars($row['messages']) . '</p>';

            }
        }
    } else {
        echo 'PLEASE LOGIN';
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
?>
