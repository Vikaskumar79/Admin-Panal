<?php
// $servername = "localhost:3308"; // default
$servername = "localhost:3303"; // Make sure the port is correct
$username = "root"; // Your database username
$password = "Vikas@961656"; // Your database password 
$dbname = "clgadmin"; // Your database name
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Error -->". $conn->connect_error);
}
else{
    // echo"connection SuccessFull";
}
?>