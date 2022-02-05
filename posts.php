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
                   if(isset($_GET['post'])){
                       $post = $_GET['post'];
                     $calling_place = mysqli_query($con,"SELECT * FROM post where post_id='$post'"); 
                                               
                    $row = mysqli_fetch_array($calling_place);
                   }
                ?>
                
                <div class="col-lg-12 mb-3">
                   
                    <div class="card shadow card-deck ms-5">
                       <img src="image/<?= $row['image'];?>" alt="" width="100%" height="400px" class="card-img-top">
                        <div class="card-body">
                            <h2 class="lead  mb-0"><?= $row['post_title'];?></h2>
                            <p class="small p-0 m-0 mb-1"><?= $row['post_content'];?></p>
                            <a href="explore.php" class="btn btn-primary btn-sm float-right">Back</a>
                        </div>
                    </div>
                </div>
                
               
                </div>
            </div>
        </div>
    </div>
</body>
</html>