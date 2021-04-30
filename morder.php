<?php
// Initialize the session
session_start();
//$restaurantID = $_SESSION['id_restaurant'];
//$restaurantID = $_GET['id_restaurant'];
$restaurantID = $_REQUEST['id_restaurant'];

// Include config file
require_once "config.php";
require_once "food_class.php";

 
// Define variables and initialize with empty values
$name = $description = "";
$name_err = $description_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_name = trim($_POST["full-name"]);
    $name = $name = $input_name;

    $input_address = trim($_POST["address"]);
    $address = $address = $input_address;

    //echo $restaurantID . " " . $name . $address;

    
	
    //generate id lol
    $orderid = (int)date("ymhms");//had to cast to int.. guess the date didnt return a pure int type...
    
    // Check input errors before inserting in database
    //if(empty($name_err) && empty($address_err) ){
        // Prepare an insert statement
        $sql = "INSERT INTO orders (id_order, id_customer, id_restaurant, delivery_name, delivery_address) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iiiss", $orderid, $param_id_customer, $restaurantID, $param_delivery_name, $param_delivery_address);
               
            // Set parameters
            $param_id_customer = $_SESSION["id"];
            //$param_id_restaurant = 46435;
            $param_delivery_name = $name;
            $param_delivery_address = $address;
           


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                //header("location: index.php");
                //exit();
            } else{
                echo "Something went wrong. Please try again later...";
            }
        }

        
        $itemsOrdered = json_decode($_POST['json']);

        

        //echo $itemsOrdered;
        //echo "<script> alert(\"sigh\") </script>";

        //$sql = "INSERT INTO items_ordered (id, id_order, id_food) VALUES (?, ?, ?)";
        $sql = "INSERT INTO items_ordered (id_order, id_food) VALUES ";

        $counta = 0;
        foreach ($itemsOrdered as $value) {
            if($counta == 0){
                $sql .= " (" . $orderid . ", " . $value->id . ")";
            } else {
                $sql .= ", (" . $orderid . ", " . $value->id . ")";
            }
            $counta = $counta + 1;
            //echo "$value <br>";
        }
          //echo "\n" . $sql;
        //$sql = "INSERT INTO items_ordered (id, id_order, id_food) VALUES (";


        


         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "i", $id);
            //mysqli_stmt_bind_param($stmt, "iii", $mid, $orderid,  $param_id_food);
               
            // Set parameters
            //generate id lol
            //$mid = (int)date("ymhms");//had to cast to int.. guess the date didnt return a pure int type...
            //$param_id_food = 321412431;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                //echo $itemsOrdered;
                //echo implode(", ", $itemsOrdered);
                //header("location: index.php");
                echo $orderid;;
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

         
        // Close statement
        mysqli_stmt_close($stmt);
    //}
    
    // Close connection
    mysqli_close($link);
}
?>


