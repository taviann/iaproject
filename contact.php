<?php
// Initialize the session
session_start();
 
// Check if the customer is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    
 
</head>

<body>
 
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/log.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Order</a>
                    </li>
                    <li>
                        <a href="Delivery Services.php">Delivery Services</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
					    <a href="profile.php"><?php echo htmlspecialchars($_SESSION["firstname"]. " " . $_SESSION["lastname"]); ?></a>
					</li>
                </ul>
            </div>

            <div class="clearfix"></div>
            
        </div>
    </section>

    <br>
    
    <section class="contact"> 
      <h1 class="text-center" style="color:white; font-size:45px;">ABOUT OUR COMPANY</h1>
      <div class="container" style="background-color:white; width:200px;">
         <img src="images/log.png" alt="Not Available" width="200px;" height="180px">
         <p class="text-center" style="font-family:courier;">WE USE COMPETITIVE MARKETS TO ARRANGE FOR DELIVERY OF OUR FOOD SUPPLY.</p>
         <br>
        </div>
      
    </section>
    
    <br>
    <br>
    <br>
    <br>

    

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>