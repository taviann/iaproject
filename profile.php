<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
	
	
	
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">Home</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      
    </ul>
  </div>
</nav>



</head>
<body>


<script>

function loadTableData(items) {
    const table = document.getElementById("testBody");
    table.innerHTML = "";
    items.forEach( item => {
      let row = table.insertRow();
      let name = row.insertCell(0);
      name.innerHTML = item.name;
      let price = row.insertCell(1);
      price.innerHTML = "$"+item.price;
    });
  }

  function loadOrdersTableData(items) {
    const table = document.getElementById("testBody1");
    table.innerHTML = "";
    items.forEach( item => {
      let row = table.insertRow();
      let name = row.insertCell(0);
      //name.innerHTML = item;
      name.innerHTML = "<a onclick=\"getFoodIds('" + item +"')\" style=\"cursor:pointer\"title='Update Record' >"+ item +"</a>";
      //let price = row.insertCell(1);
      //price.innerHTML = "<a onclick=\"getFoodIds('" + item +"')\" title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'>a</span></a>";//"$"+item.price;
    });
  }




function getFoodIds(order_id){
    $.ajax({
    type: 'GET',
    url: 'specific_order_details.php',
    data: {
        id_order: order_id
        },
    dataType: 'json',
    success : function(returnData) {
        //console.log("Success:\n" + JSON.stringify(returnData));
        //getFoodFromFoodTable(returnData);
        getFoodFromFoodTable(JSON.stringify(returnData));
    },
      error: function (returnData) {
        console.log("Error" + JSON.stringify(returnData));
      },
      complete: function () {
        // Handle the complete event
        console.log("Completed")

        
      }
    });
}

function getMyOrders(){
    $.ajax({
    type: 'GET',
    url: 'getMyOrderIDs.php',
    data: {
        id_customer: <?php echo htmlspecialchars($_SESSION["id"])?>
        },
    dataType: 'json',
    success : function(returnData) {
        //console.log("Success:\n" + JSON.stringify(returnData));
        //getFoodFromFoodTable(returnData);
        //getFoodFromFoodTable(JSON.stringify(returnData));
        loadOrdersTableData(returnData);
    },
      error: function (returnData) {
        console.log("Error" + JSON.stringify(returnData));
      },
      complete: function () {
        // Handle the complete event
        console.log("Completed")

        
      }
    });
}


function getFoodFromFoodTable(array_of_ids){
  $.ajax({
    type: 'POST',
    url: 'getFoodJSON.php',
    data: {
        id_foods: array_of_ids
        },
    dataType: 'json',
    success : function(returnData) {
        console.log("Success:\n" + JSON.stringify(returnData));
        loadTableData(returnData);

    },
      error: function (returnData) {
        console.log("Error" + JSON.stringify(returnData));
      },
      complete: function () {
        // Handle the complete event
        console.log("Completed")

        
      }
    });
}

</script>






    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["firstname"]. " " . $_SESSION["lastname"]); ?></b><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></h1>


        <section class="food-search text-center">
        <div class="container">
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
    </section>



    

    
	
    <div class = "other_table">
  <!--<table id="stuffWeGot" class=" table table-borderless table-striped table-earning">-->
  <table id="stuffWeGot" >
                            <thead>
                                <tr>
                                <th>Check Orders Here</th>
                                </tr>
                            </thead>
                            <tbody id="testBody1"></tbody>
                        </table>
</div>

    <script>



//getFoodIds();
getMyOrders();

//loadTableData(items);

//let ar = "{{65}, {67}}";
let ar = "[\"65\",\"67\"]";
//let ar = "[\"65\"]";
//getFoodFromFoodTable(ar);
    </script>
	
</body>
</html>