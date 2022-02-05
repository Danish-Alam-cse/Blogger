<?php  include("config/db.php");
    if(!isset($_SESSION['user_login'])){
        redirect('login');
    } ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .nav-link{
                text-decoration:none;
                color:black;
            }
            </Style>
        <link rel="stylesheet" href="./css/all.css">

<!-----------Owl Carousel----------->
<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">


<!----------AOS Library-------------->
<link rel="stylesheet" href="./css/aos.css">


<!--Custom Style-->

<link rel = "stylesheet" href="./css/style.css">
    </head>
    <body>

     

<nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" class="text-gray" style="text-decoration:none">Blooger</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars">
                        
                    </i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    
                <form action="explore.php" method="get" class="d-flex mx-auto">
              <input type="search" name="search" class="form-control form-control-sm" style="border:1px solid black;height:20px;margin-top:20px;" size="40" placeholder="Search here">
              <input type="submit" value="Search" name="find" style="margin-left:1px;background-color:black;color:white;border-radius:10%;height:30px;margin-top:20px;">
          </form>
          
          
          
               <li class="nav-item"><a href="index.php" class="nav-link" style="color:black">Home</a></li>
               <?php if(isset($_SESSION['user_login'])):
                $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($con,"SELECT  * FROM user where user_name='$log'");
                    $u = mysqli_fetch_array($calling_user);
               
               ?>
                    <li class="nav-item"><a href="explore.php" class="nav-link" style="color:black">Explore</a></li>

                   <li class="nav-item"><a href="profile.php" class="nav-link" style="color:black">hi, <?= $u['user_name'];?></a></li>
                   <li class="nav-item"><a href="create_post.php" class="nav-link" style="color:black">Create Post</a></li>
                   <li class="nav-item"><a href="insert_place.php" class="nav-link" style="color:black">Add Place</a></li>

                   <li class="nav-item"><a href="logout.php" class="nav-link" style="color:red">Logout</a></li>

               <?php else: ?>
                    <li class="nav-item"><a href="login.php" class="nav-link" style="color:black">Sign In</a></li>
                   <li class="nav-item"><a href="signup.php" class="nav-link" style="color:black">Sign Up</a></li>
               <?php endif; ?>
           </ul>

            </div>
            <div class="social text-gray" style="margin-top:5px;">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>


               </body>
               </html>