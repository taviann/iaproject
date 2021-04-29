<?php
// Initialize the session
session_start();
 
// Check if the customer is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$input_id_provider = trim($_GET["id_provider"]);
$id_provider = $id_provider = $input_id_provider;

// Include config file
require_once "config.php";
require_once "user_class.php";

//read the food
// Attempt select query execution
$sql = "SELECT * FROM queue WHERE id_provider = " . $id_provider . " ORDER BY time_joined ASC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

            $queueOfCustomers = array();
            while($row = mysqli_fetch_array($result)){
                $queueOfCustomers[] = new QueueCustomer($row['id_queue'], $row['id_customer'], $row['time_joined']);
            }
            
        // Free result set
        mysqli_free_result($result);
    } else{
        //echo "<p class='lead'><em>No records were found.</em></p>";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}


//get provider name
$sql = "SELECT * FROM service_providers WHERE id_provider = " . $id_provider . " ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        if(mysqli_num_rows($result) > 0)
            $provider_name = $result;
            
            
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
    
    
</head>
<body>

<div>
    <h1> </h1>
</div>
   
<?php
            
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Position</th>";
                    echo "<th>ID</th>";
                    //echo "<th>Description</th>";
                    echo "<th>Time Joined</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

                                        //if($queueOfCustomers != null)
                                        $countaa = 1;
                                        if(isset($queueOfCustomers))
                                        foreach ($queueOfCustomers as &$value) {

                                            //$value = $value * 2;
                                            //echo '<input type="submit" name="rowButton'. $row['id'] .'" value="Delete"/>';
            
                                            echo "<tr>";
                                            echo "<td>" . $countaa . "</td>";
                                            echo "<td>" . $value->id_customer . "</td>";
                                            //echo "<td>" . $value->description . "</td>";
                                            echo "<td>" . $value->time_joined . "</td>";
                                            echo "<td>";
                                            echo "<a href='viewer.php?id_customer=". $value->id_customer ."' title='View Customer' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            //echo "<a href='remover.php?id_customer=". $value->id_customer ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
                                            echo "</td>";
                                            echo "</tr>";*/

                                            $countaa = $countaa + 1;
                                        }
            
            echo "</tbody>";                            
            echo "</table>";
            
                                    ?>




<script>

const url='https://localhost/lynks/check.php';
//const url='https://192.168.1.7/lynks/check.php';
//const Http = new XMLHttpRequest();
/*Http.open("GET", url);
Http.send();

Http.onreadystatechange = (e) => {
  console.log(Http.responseText)
}*/
const data = {
    id_customer: "1"
}

$.get(url, data, function(data, status){
    console.log('${data} and status is  ${status}');
});

</script>


    <div>
            <!--<form action="adder.php" method="get" class="order">
                
                <fieldset>
                    <legend>Add To Queue</legend>

                    <input type="input" name="id_customer" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
                    <input type="hidden" name="id_provider" value="<?php echo htmlspecialchars($id_provider)?>" />

                    <input type="submit" value="Add" class="btn btn-primary">
                </fieldset>
            </form>-->


            <form action="remover.php" method="get" class="order">
                
                <fieldset>
                    

                    <?php
                    if(isset($queueOfCustomers)){
                        echo "<legend>Remove From Queue</legend>";
                        echo "<input type=\"hidden\" name=\"id_customer\" value=\" " . htmlspecialchars($queueOfCustomers[0]->id_customer) ."\" />";
                        echo "<input type=\"hidden\" name=\"id_provider\" value=\" " . htmlspecialchars($id_provider) ."\" />";
                        echo "<input type=\"hidden\" name=\"id_queue\" value=\" " . htmlspecialchars($queueOfCustomers[0]->id) ."\" />";
                        echo "<input type=\"submit\" value=\"Served\" class=\"btn btn-primary\">";
                    }
                    

                    ?>

                </fieldset>

            </form>

            <button style="position" onclick="window.location='index.php'">Home</button>
            <!--<form action="check.php" method="get" class="order">
                
                <fieldset>
                    <legend>Check if exists in queue</legend>


                    <input type="input" name="id_customer" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
                    <input type="hidden" name="id_provider" value="<?php echo htmlspecialchars($id_provider)?>" />

                    <input type="submit" value="Check" class="btn btn-primary">
                </fieldset>

            </form>-->

            
    </div>

</body>
</html>