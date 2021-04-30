<?php
// Initialize the session
session_start();
 
// Check if the customer is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


//echo $_POST["id_foods"];
//$id_food = $_GET["id_food"];
$id_food_list = json_decode($_POST["id_foods"]);
//echo $id_food_list;



$sql = "SELECT * FROM foods WHERE id_food = ";


$counta = 0;
        foreach ($id_food_list as $value) {
            if($counta == 0){
                //$sql .= $value->id;
                $sql .= $value;
            } else {
                //$sql .= " AND " . $value->id;
                $sql .= " OR id_food = " . $value;
            }
            $counta = $counta + 1;
            //echo "$value <br>";
        }

        //echo $sql;


require_once "food_class.php";
require_once "config.php";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

            $listOfFood = array();
            while($row = mysqli_fetch_array($result)){
                $listOfFood[] = new Food($row['id_food'], $row['name'], $row['description'], $row['price']);
                //$listOfFood[] = {$row['id_food'], $row['name'], $row['description'], $row['price']};
                //echo "soo " . $row['id_food'];
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