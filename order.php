<?php
// Initialize the session
session_start();
//$restaurantID = $_SESSION['id_restaurant'];
//$restaurantID = $_GET['id_restaurant'];
$restaurantID = $_REQUEST['id_restaurant'];

// Include config file
require_once "config.php";
require_once "food_class.php";

//read the food
// Attempt select query execution
//$sql = "SELECT * FROM foods";//where restaurant = 
$sql = "SELECT * FROM foods WHERE id_restaurant = " . $restaurantID;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

            $listOfFood = array();
            while($row = mysqli_fetch_array($result)){
                $listOfFood[] = new Food($row['id_food'], $row['name'], $row['description'], $row['price']);
            }
            
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

// Close connection
//cant close yetmysqli_close($link);
//read from table restaurants
//$sql = "SELECT * FROM restaurants WHERE id_restaurants = " . $restaurantID;

$sql = "SELECT * FROM restaurants WHERE id_restaurants = " . $restaurantID;
if($result = mysqli_query($link, $sql)){

    $row = mysqli_fetch_array($result);
    //$result=mysqli_fetch_array($sth);

    $pic = $row['image'];
    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
    // Free result set
        mysqli_free_result($result);
}

 
// Define variables and initialize with empty values
$name = $description = "";
$name_err = $description_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_name = trim($_POST["full-name"]);
    $name = $name = $input_name;

    $input_address = trim($_POST["address"]);
    $address = $address = $input_address;

    

    /*// Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $name = $input_name;
    }
    
     // Validate description
     $input_description = trim($_POST["description"]);
     if(empty($input_description)){
         $description_err = "Please enter a description.";
     }else{
         $description = $description = $input_description;
     }

    
    // Validate value
    $input_value = trim($_POST["value"]);
    if(empty($input_value)){
        $value_err = "Please enter the value";     
    } elseif(!ctype_digit($input_value)){
        $value_err = "Please enter a positive integer value.";
    } else{
        $value = $input_value;
    }*/
	
    //generate id lol
    $orderid = (int)date("ymhms");//had to cast to int.. guess the date didnt return a pure int type...
            
    
    // Check input errors before inserting in database
    //if(empty($name_err) && empty($address_err) ){
        // Prepare an insert statement
        //$sql = "INSERT INTO orders (id_order) VALUES (?)";
        $sql = "INSERT INTO orders (id_order, id_customer, id_restaurant, delivery_name, delivery_address) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "i", $id);

            //$restaurantID = 100;
            
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
                echo "Something went wrong. Please try again later.";
            }
        }

        

        $sql = "INSERT INTO items_ordered (id, id_order, id_food) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            //mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_bind_param($stmt, "iii", $mid, $orderid,  $param_id_food);
               
            // Set parameters
            //generate id lol
            $mid = (int)date("ymhms");//had to cast to int.. guess the date didnt return a pure int type...
            $param_id_food = 321412431;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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



<script>

class foo{

}

    let myItems = [];

    function addToOrder(id, name, price){
        let item = {
            'id' : id,
            'name' : name,
            'price' : price,
        }
        myItems.push(item);
        loadTableData(myItems);
    }

    function removeFromOrder(id){
        
    }

    function loadTableData(items) {
    const table = document.getElementById("testBody");
    table.innerHTML = "";
    items.forEach( item => {
      let row = table.insertRow();
      let name = row.insertCell(0);
      name.innerHTML = item.name;
      let price = row.insertCell(1);
      price.innerHTML = item.price;
    });
  }
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

   
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
   
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/log.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div id="restaurant_menu" class="restaurant_menu">



            <?php
            
echo "<table class='table table-bordered table-striped'>";
echo "<thead>";
    echo "<tr>";
        //echo "<th>ID</th>";
        echo "<th>Name</th>";
        //echo "<th>Description</th>";
        echo "<th>Value</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
                            if(isset($listOfFood))
                            foreach ($listOfFood as &$value) {
                                //$value = $value * 2;
                                //echo '<input type="submit" name="rowButton'. $row['id'] .'" value="Delete"/>';

                                echo "<tr>";
                                //echo "<td>" . $value->id . "</td>";
                                echo "<td>" . $value->name . "</td>";
                                //echo "<td>" . $value->description . "</td>";
                                echo "<td>" . '$' . $value->price . "</td>";
                                echo "<td>";
                                //echo "<a href='read.php?id=". $value->id ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a onclick=\"addToOrder('$value->id', '$value->name', '$value->price')\" title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>";
                                //echo "<a href='update.php?id=". $value->id ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                //echo "<a href='delete.php?id=". $value->id ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                                /*echo "<tr>";
                                echo "<td>" . $row['id_food'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . '$' . $row['price'] . "</td>";
                                echo "<td>";
                                echo "<a href='read.php?id=". $row['id_food'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='update.php?id=". $row['id_food'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id=". $row['id_food'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";*/
                            }

echo "</tbody>";                            
echo "</table>";

                        ?>
            </div>



            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="Delivery Services.php">Delivery Services </a> 
                    </li>
                    <li>
                        <a href="Contact.php">Contact</a>
                    </li>
					<li>
						<a href="profile.php"><?php echo htmlspecialchars($_SESSION["firstname"]. " " . $_SESSION["lastname"]); ?></a>
					</li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    

    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-img">
                        <!--<img src="images/JP.jpg" alt="" class="img-responsive img-curve">-->
                        <?php echo '<img class="img-responsive img-curve" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>' ?>;
                    </div>
    
                    <div class="food-desc">
                        <h3>Juici Patties</h3>
                        

                        <!--<div class="order-label">Quantity</div>
                        <input type="text" name="qty" class="input-responsive" value="" required>-->

                        <table id="myOrderTable" class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                <th>Item</th>
                                <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="testBody"></tbody>
                        </table>


                       
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="hidden" name="id_restaurant" value="<?php echo $restaurantID?>" /><!--DO NOT REMOVE!.. by Jermaine-->

                    <input type="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
   

    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    

    <section class="footer">
        <div class="container text-center">
            <p> Designed By <a href="#">Group</a></p>
        </div>
    </section>
   
</body>
</html>