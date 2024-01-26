<?php
$servername = "127.0.0.1:3000";
$username = "root";
$password = "";
$dbname = "financia_Mileage";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO other (Name, No, company)
VALUES ('".$_POST["name"]."', '".$_POST["no"]."', '".$_POST["company"]."')";

if ($conn->query($sql) === TRUE) {
  echo "<p style='color:green'>New record created successfully</p><script>
    setTimeout(function(){
        history.go(-2);
    }, 1000);
</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
