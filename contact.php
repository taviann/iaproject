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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
</head>

<body>
 
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/log.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right" >
                <ul>
                    <li>
                        <a href="index.php">Home</a>
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

   
    
    <section class="contact" style="background-color:blue;"> 
        
      <h1 class="text-center" style="color:white; font-size:45px;">ABOUT OUR COMPANY</h1>

        <br>

        <div class="container" style="background-color:white; width:300px;">          
         <img src="images/log.png" alt="Not Available" width="300px;" height="180px">
         <p class="text-center" style="font-family:courier; font-size:20px;" >
         WE USE COMPETITIVE MARKETS TO ARRANGE FOR DELIVERY OF OUR FOOD SUPPLY. <br> WE ENSURE TO GIVE THE MOST RELIABLE DELIVERY SERVICE ISLANDWIDE.<br><br> *ESTABLISHED IN JULY 2020*  <br><br>Contact at us:(876)450-5490 <br><br> OR <br><br>
         MESSAGE US BELOW <i class="fas fa-arrow-down"></i></p>
        </div>

        <br>

    </section>

    <br>

    <h1 class="text-center" style="color:blue; font-size:30px;">CONTACT FORM</h1>
    <section class="contact-form" style="background-color:blue;">

     <div class="container">
      <form id="formID"  action="" method="post">
           <div class="Name">
              <div class="col-md-4">
                 <label for="fullname" class="form-label text-white">Full Name</label>
                 <input type="text" name="Full_Name" class="form-control text-center" id="fullname" placeholder="Full Name" aria-label="Full_Name">
              </div>
           </div>

           <div class="Email">
             <div class="col-md-5">
                 <label for="mail" class="form-label text-white">Email Address</label>
                 <input type="email" name="Email_Address" class="form-control text-center" id="mail" placeholder="name@example.com" aria-label="Email_Address" aria-describedby="basic-addon1">
             </div>
           </div>

           <div class="Comment">
              <div class="col-md-5">
                 <label for="comment" class="form-label text-white">Comment</label>
                 <textarea class="form-control text-center " id="comment" rows="3"></textarea>
              </div>
           </div>
           <button type="button" class="btn btn-danger">Submit</button>
           <br>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>

</body>
</html>