<?php
//$servername = "tfopl.cpqgsxatobno.ap-south-1.rds.amazonaws.com:9239";
//$username = "tastyfingers";
//$database = "tfodb";
//$password = "tastyfingers";
//  Create a new connection to the MySQL database using PDO
//$conn = new mysqli($servername, $username, $password);
// Check connection
//if ($conn->connect_error) {
  //  die("Connection failed: " . $conn->connect_error);
//} 
//echo "Connected successfully";

$servername = "tfopl.cpqgsxatobno.ap-south-1.rds.amazonaws.com:9239";
$username = "tastyfingers";
$password = "tastyfingers";
$database = "tfodb";
 
 
//creating a new connection object using mysqli 
$conn = new mysqli($servername, $username, $password, $database);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>