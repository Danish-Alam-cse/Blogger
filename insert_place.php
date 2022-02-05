<?php include "config/db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel = "stylesheet" href="./css/Sign_style.css">
</head>
<body>
   <div class="container">
       <div class="title">Registration</div>
       <form action="" method="post">
           <div class="user-details">
               <div class="input-box">
                   <span class="details">Place Name</span>
                   <input type="text" name="place_name" placeholder="Enter your place" required>
               </div>
              
           <div class="button">
               <input type="Submit"  name="send" value="Register">
           </div>
       </form>
   </div> 
</body>
</html>

<?php
    if(isset($_POST['send'])):
        $place_name = $_POST['place_name'];
        
    
        $query = mysqli_query($con,
        "INSERT INTO place (place_name) value ('$place_name')");

        echo $place_name;
    
        if($query):
            redirect('explore');
        else:
            echo "Fail";
        endif;
    
    endif;
    ?>