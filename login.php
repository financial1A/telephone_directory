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

    $random = rand(1, 100000);
    // Get POST data
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM teleuseradmin WHERE user = ? AND pass = ?");
    $stmt->bind_param("ss", $user, $pass);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check the credentials
    if ($result->num_rows > 0) {
        // Prepare an INSERT statement
        $stmt = $conn->prepare("INSERT INTO token (token) VALUES (?)");
        $stmt->bind_param("i", $random);

        // Execute the INSERT statement
        $stmt->execute();

       	echo json_encode(array('status' => 'success', 'message' => 'Login successful', 'token' => $random));
		} else {
    	echo json_encode(array('status' => 'error', 'message' => 'Login unsuccessful'));
	}
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
?>
