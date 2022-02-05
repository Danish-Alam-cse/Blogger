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
   
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                   <?php 
                    $calling = mysqli_query($con,"select * from place");
                    while($row = mysqli_fetch_array($calling)):
                    ?>
                    <a href="place.php?place=<?= $row['place_id'];?>" class="list-group-item list-group-item-action"><?= $row['place_name'];?> <span class="float-right font-weight-bold">&raquo;</span></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-lg-9 ml-3">
               <div class="row">
                <?php 
                   if(isset($_GET['place'])){
                       $place = $_GET['place'];
                     $calling_place = mysqli_query($con,"SELECT * FROM post where post_place='$place'"); 
                    $count = mysqli_num_rows($calling_place);
                       if($count < 1):
                       ?>
                           <h2 class="lead text-danger font-weight-bold">Not Found Any post in this place</h2>
                   
                           <?php else:                          
                    while($row = mysqli_fetch_array($calling_place)):
                ?>
                
                <div class="col-lg-10 mb-3">
                   
                    <div class="card shadow card-deck ms-5">
                       <img src="image/<?= $row['image'];?>" alt="" width="100%" height="250px">
                        <div class="card-body">
                            <h2 class="lead text-truncate mb-0"><?= $row['post_title'];?></h2>
                            <p class="small p-0 m-0 mb-1">Rs. <?= $row['post_content'];?></p>
                            <a href="posts.php?post=<?= $row['post_id']?>" class="btn btn-success btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                
                <?php endwhile;  
                   endif;
                   } 
                   
                   ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>