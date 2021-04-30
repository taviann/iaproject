<?php
// Initialize the session
session_start();
 
// Check if the customer is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$id_customer = $_GET["id_customer"];

$sql = "SELECT * FROM orders WHERE id_customer = " . $id_customer;
//echo $sql ;

require_once "config.php";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

            $listOfFood = array();
            while($row = mysqli_fetch_array($result)){
                //$listOfFood[] = new Food($row['id_food'], $row['name'], $row['description'], $row['price']);
                $listOfFood[] = $row['id_order'];
            }
            //echo $listOfFood;
            
            echo json_encode($listOfFood);
            
            
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}


?>