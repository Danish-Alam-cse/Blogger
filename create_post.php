

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <link rel = "stylesheet" href="./css/login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

</head>

<body>
<?php include "nav.php";?>
 
   


    <div class="container mt-5">
        <div class="row">
         
            </div>
            <div class="col-lg-9 mx-auto">
                <div class="row">
                    <?php 
               
                    if(isset($_SESSION['user_login'])):
                    $log = $_SESSION['user_login'];
                    $get_user = mysqli_query($con,"SELECT * FROM user where user_name='$log'");
                    $col = mysqli_fetch_array($get_user);
                    
                    ?>
                    <div class="wrapper">
                            <div class="title">Post Form</div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="field">
                                
                                <input type="text" name="user_id" value="<?= $col['user_id'];?>" hidden>
                                    
                                </div>
                                <div class="field">
                                <label>Post Title</label>
                                    <input type="text" name="post_title" required>
                                </div>
                                <div class="field">
                                    <input type="file" name="image">
                                </div>
                              <div class="field">
                                <label>Post Place</label>
                                <select class="form-control" name="post_place">
                                    <option></option>
                                    <?php 
                                    $calling_place = mysqli_query($con,"SELECT * FROM place");
                                    while($place = mysqli_fetch_array($calling_place)):
                                    ?>
                                    <option value="<?= $place['place_id'];?>"><?= $place['place_name'];?></option>
                                    <?php endwhile;?>
                                </select>
                            </div>
                            <div class="field">
                                <label>Post Content</label>
                                <textarea rows="5" cols="50" class="form-control" name="post_content"></textarea>
                            </div>
                            
            <div class="field">
                <input type="submit" name="post_send" value="Post" style="margin-top:65px;">
            </div>
    
        </form>
        <?php endif;?>
    </div>


</body>

</html>

<?php 
                    if(isset($_POST['post_send'])){
                        $user_id = $_POST['user_id'];
                        $post_place = $_POST['post_place'];
                        $post_title = $_POST['post_title'];
                        $post_content = $_POST['post_content'];

                        // $img = $_FILES['img']['name'];
                        // $tmp_img = $_FILES['img']['tmp_name'];
    
                        // move_uploaded_file($tmp_img,"image/$img");

                        $image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        move_uploaded_file($tmp_name,"image/$image");
                        $query = mysqli_query($con,"INSERT INTO post (user_id,post_place,post_title,post_content,image) value ('$user_id','$post_place','$post_title','$post_content','$image')");
                        if($query):
                            redirect('explore');
                        else:
                            // alert('fail');
                            echo "error";
                        endif;
                    }
                    
                   ?>
