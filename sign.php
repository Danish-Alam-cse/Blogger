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
       <form action="#" method="post">
           <div class="user-details">
               <div class="input-box">
                   <span class="details">Full Name</span>
                   <input type="text" name="full_name" placeholder="Enter your name" required>
               </div>
               <div class="input-box">
                   <span class="details">Username</span>
                   <input type="text" name="user_name" placeholder="Enter your Username" required>
               </div>
               <div class="input-box">
                   <span class="details">Email</span>
                   <input type="email" name="email" placeholder="Enter your email" required>
               </div>
               <div class="input-box">
                   <span class="details">Phone Number</span>
                   <input type="text" name="" placeholder="Enter your number" required>
               </div>
               <div class="input-box">
                   <span class="details">Password</span>
                   <input type="text" name="password" placeholder="Enter your password" required>
               </div>
               <div class="input-box">
                   <span class="details">Confirm Password</span>
                   <input type="text" name="cpassword" placeholder="Confirm your password" required>
               </div>
           </div>
           <div class="input-box">
                                    <label class="m-0 p-0">user_gender</label>
                                    <select name="user_gender" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
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
        $user_name = $_POST['user_name'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $gender = $_POST['gender'];
    
        $query = mysqli_query($con,
        "INSERT INTO user (user_name,full_name,email,password,cpassword,gender) value ('$user_name','$full_name','$email','$password','$cpassword','$gender')");
    
        if($query):
            redirect('index');
        else:
            echo "Fail";
        endif;
    
    endif;
    ?>