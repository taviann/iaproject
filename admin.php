<?php
// Initialize the session
session_start();
 
// Check if the customer is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


// Include config file
require_once "config.php";
require_once "provider_class.php";

//read the food
// Attempt select query execution
//$sql = "SELECT * FROM foods";//where restaurant = 
$sql = "SELECT * FROM restaurants";// WHERE id_restaurant = " . $restaurantID;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

            $listOfProviders = array();
            while($row = mysqli_fetch_array($result)){
                $listOfProviders[] = new ServiceProviders($row['id_restaurants'], $row['name']);
            }
            
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lynks</title>

   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

    <link rel="stylesheet" href="css/style.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
	
	
	
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <!--<a class="navbar-brand" href="#">Peepers</a>-->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="register.php">Create Customer</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>-->
    </ul>
  </div>
</nav>

</head>
<body>
   


   <div>
<?php
            
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    //echo "<th>Amount</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                                        //todo check the size
                                        foreach ($listOfProviders as &$value) {
                                            //$value = $value * 2;
                                            echo "<tr>";
                                            echo "<td>" . $value->id . "</td>";
                                            echo "<td>" . $value->name . "</td>";
                                            //echo "<td>" . "amnt here" . "</td>";
                                            echo "<td>";
                                            echo "<a href=\"admin_view.php?id_provider=" . $value->id . "\" title='View queue' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                            
                                        }
            
            echo "</tbody>";                            
            echo "</table>";
            
                                    ?>




<!--<script>

const url='https://localhost/lynks/check.php';

const data = {
    id_customer: "1"
}

$.get(url, data, function(data, status){
    console.log('${data} and status is  ${status}');
});

</script>-->

</div>

</body>
</html>