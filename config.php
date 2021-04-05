<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'project';

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', $servername);
define('DB_USERNAME', $username);
define('DB_PASSWORD', $password);
define('DB_NAME', $db);
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    echo("ERROR: Could not connect 😪 siiigh. " . mysqli_connect_error() . "\n\n");

    //todo: check if anything doesnt exist then create one buuut for now just attempt to create both table and database on any error to keep things smooth 😀😀😀😁
    // sql to create table

    // Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "\n\n");
    }

    
}

?>