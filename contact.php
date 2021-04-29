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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
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

    <h1 class="text-center" style="background-color:crimson;">CONTACT US</h1>
    <section class="Contact text-center"> 
     <form action="" method="post">
      <div class="container">
        <div class= "Name">
          <div class="col-md-4">
            <label for="name" class="form-label text-danger">Name</label>
            <input type="text" name = "Full_Name" class="form-control text-center" id="name" placeholder="Full Name" aria-label="Full_Name">
          </div>
        </div>
          
        <br>

        <div class= "Email">
          <div class="col-md-5">
            <label for="E-Address" class="form-label text-danger">Email Address</label>
            <input type="text" name ="Email" class="form-control text-center" id="E-Address" placeholder="Email Address" aria-label="Email">
          </div>
        </div>




     </form>
     </div>
      
    </section>
    
    <br><br>

    

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