<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

</head>
<body>
   <?php include "nav.php";?>
    <!--- banner -->
   
    
    <div class="container mt-3">
        <div class="row mx-auto">
           <h1 class="badge bg-secondary mb-2">My Blogs</h1>
         
   
               <div class="row">
               <?php if(isset($_SESSION['user_login'])){
                $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($con,"SELECT  * FROM user where user_name='$log'");
                   
                    // "SELECT * FROM post Join place ON post.post_place = place.place_id"
                    $u = mysqli_fetch_array($calling_user);

                    $user_id = $u['user_id'];
                    $calling_post = mysqli_query($con,"SELECT * FROM post JOIN user ON post.user_id = user.user_id WHERE user_name='$log'");
                    while($row = mysqli_fetch_array($calling_post)):
                    
               
               ?>
                
                <div class="col-lg-12 mb-3">
                   
                    <div class="card shadow card-deck ms-5">
                       <img src="image/<?= $row['image'];?>" alt="" width="100%" height="250px">
                        <div class="card-body">
                            <h2 class="lead text-truncate mb-0"><?= $row['post_title'];?></h2>
                            <p class="small p-0 m-0 mb-1"><?= $row['post_content'];?>/</p>
                            <a href="posts.php?post=<?= $row['post_id']?>" class="btn btn-success btn-sm">Read More</a>
                            <a href="blog_delete.php?del=<?= $row['post_id']?>" class="btn btn-danger btn-sm">Delete</a>

                        </div>
                    </div>
                </div>
                <?php endwhile;  
                   } 
                   
                   ?>
                
               
                   
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>