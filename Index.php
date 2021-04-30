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
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

   
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

            <div class="menu text-right">
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
  

    
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
             <input type="search" name="search" placeholder="Search for Food.." required>
             <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    

    
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <a href="category-foods.php">
            <div class="box-3 float-container">
                <img src="images/PH.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza Hut</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/BKK.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger King</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/KFC.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">KFC</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    

    
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Restaurants</h2>
            
            <div class="food-box">
                <div class="food-img">
                    <img src="images/JP.jpg" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Juici Pattties</h4>

                    <p class="food-detail">
                        You can visit there page to see there Menu.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=100"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/M.jpg" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Mothers Patty</h4>
                
                    <p class="food-detail">
                        The menu can be found on the website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=200"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/Blogo.png" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Burger King</h4>
                   
                    <p class="food-detail">
                       The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=300"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/Dlogo.png" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Dominoes</h4>
                   
                    <p class="food-detail">
                       The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=600"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/LLlogo.png" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Pizza Hut</h4>
                   
                    <p class="food-detail">
                       The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=400"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/KlogoT.png" alt="" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>KFC</h4>
                   
                    <p class="food-detail">
                       The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=500"><div class="button">Order Now</div></a>
                </div>
            </div>

            <!--<div class="food-box">
                <div class="food-img" >
                    <img src="images/Dlogo.jpg" alt="Chicken Hawain Momo" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Dominoes</h4>
                   
                    <p class="food-detail">
                          The Menu Can be found on there website.
                    <br>
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=600"><div class="button">Order Now</div></a>
                </div>
            </div>

            
            
            <div class="food-box">
                <div class="food-img">
                
                    <img src="images/Plogo.png" alt="" height="90px" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>Pizza Hut</h4>
                  
                    <p class="food-detail">
                        The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=400"><div class="button">Order Now</div></a>
                </div>
            </div>

            <div class="food-box">
                <div class="food-img">
                    <img src="images/Klogo.png" alt="" height="90px" class="img-responsive img-curve" style=" box-shadow: 1px 1px 10px black">
                </div>

                <div class="food-desc">
                    <h4>KFC</h4>
                    
                    <p class="food-detail">
                        The Menu Can be found on there website.
                    </p>
                    <br>

                    <a href="order.php?id_restaurant=500"><div class="button">Order Now</div></a>
                </div>
            </div>-->

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="Delivery Services.php">See All Delivery Services</a>
        </p>
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