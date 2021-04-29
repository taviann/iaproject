<?php

// Include config file
require_once "config.php";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET"){

    $input_id_customer = trim($_GET["id_customer"]);
    $id_customer = $id_customer = $input_id_customer;


    $input_id_provider = trim($_GET["id_provider"]);
    $id_provider = $id_provider = $input_id_provider;



// Check input errors before inserting in database
//if(empty($name_err) && empty($address_err) ){
    // Prepare an insert statement
    //$sql = "INSERT INTO orders (id_order) VALUES (?)";
    $sql = "INSERT INTO queue (id_customer, time_joined, id_provider) VALUES (?, NOW(), ?)";
     
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        //mysqli_stmt_bind_param($stmt, "i", $id);

        //$restaurantID = 100;
        
        mysqli_stmt_bind_param($stmt, "ii", $param_id_customer, $param_id_provider);
           
        // Set parameters
        $param_id_customer = $id_customer;
        $param_id_provider = $id_provider;
        //$param_time_joined = now();
       


        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records created successfully. Redirect to landing page
            //header("location: index.php");
            //exit();
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