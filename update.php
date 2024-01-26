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
        echo '<br><br><input name="ref" id="ref" placeholder="Reference" oninput="this.value=this.value.toUpperCase();">
	<input name="ref1" id="ref1" placeholder="Name" oninput="this.value=this.value.toUpperCase();">
	<input name="ref2" id="ref2" placeholder="Ext" oninput="this.value=this.value.toUpperCase();">
	<input name="ref5" id="ref5" placeholder="Mobile" oninput="this.value=this.value.toUpperCase();">
	<input name="ref3" id="ref3" placeholder="Dep" oninput="this.value=this.value.toUpperCase();">
	<input name="ref4" id="ref4" placeholder="Location" oninput="this.value=this.value.toUpperCase();">
	<button  onclick="updatet()" value="Update" style="border-radius:5px;color:white;font-size:15px;background-color:#0099ff;border-color:white;">Update</button>';
	}else{
	 echo 'PLEASE LOGIN';
	}
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
?>
