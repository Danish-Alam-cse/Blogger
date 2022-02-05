

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        </Style>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

<link rel="stylesheet" href="./css/all.css">

<!-- ---------Owl Carousel--------- -->
<link rel="stylesheet" href="./css/owl.carousel.min.css">
<link rel="stylesheet" href="./css/owl.theme.default.min.css">

<!-- 
--------AOS Library------------ -->
<link rel="stylesheet" href="./css/aos.css">


<!-- Custom Style -->

<link rel = "stylesheet" href="./css/style.css">
        <style>
            .nav-link{
                text-decoration:none;
                color:black;
            }
  

</style>



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
            <div class="col-lg-9">
               <div class="row">
                <?php 
                   if(isset($_GET['find'])){
                    $queried = mysqli_real_escape_string($con, 
                    preg_replace('/\s+/', ' ',trim($_GET['search'])));
       
                    if(strpos($queried,", ")){
                        $query = str_replace(", "," ",$queried);
                        $keys = explode(" ",$query);
                    } else if(strpos($queried,",")){
                        $query = str_replace(","," ",$queried);
                        $keys = explode(" ",$query);	
                    } else {
                        $keys = explode(" ",$queried);
                    }
                    $sql = "SELECT * FROM post Join place ON post.post_place = place.place_id WHERE post_content  LIKE '%$queried%' ";
                    foreach($keys as $k){
                        $sql .= " OR post_content LIKE '%$k%' ";
                    }
                    
                    
                       
                    $call = mysqli_query($con, $sql);
                   }
                else{
                  $call = mysqli_query($con,"SELECT * FROM post Join place ON post.post_place = place.place_id");    
                  // "SELECT * FROM products JOIN category ON products.pro_category=category.cat_id where pro_id='$item'"
                }
                
                 while($row = mysqli_fetch_array($call)):?>

                
<div class="col-lg-10 mb-3">
                   
                   <div class="card shadow card-deck ms-5">
                      <img src="image/<?= $row['image'];?>" alt="" width="100%" height="250px">
                       <div class="card-body">
                           <h2 class="lead text-truncate mb-0"><?= $row['post_title'];?></h2>
                           <p><span class="badge bg-success float-right fs-12"><?= $row['place_name'];?></span></p>

                           <p class="small p-0 m-0 mb-1">Rs. <?= $row['post_content'];?>/-</p>
                           <a href="posts.php?post=<?= $row['post_id']?>" class="btn btn-success btn-sm">Read More</a>
                       </div>
                   </div>
               </div>
               
               <?php endwhile;
                  
                  ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

     
