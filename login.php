<?php include "config/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = "stylesheet" href="./css/login_style.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">Login Form</div>
        <form action="" method="post">
            <div class="field">
                <input type="text" name="user_name">
                <label for>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label for>Password</label>
            </div>
            <div class="pass-link"><a href="#">Forgot Password</a></div>
            <div class="field">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="signup-link">
                Not a member?<a href="sign.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['login'])){

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        
        $check = mysqli_query($con,"SELECT * from user where user_name ='$user_name' AND password='$password'");
        
        $count = mysqli_num_rows($check);
        
        if($count > 0){
            $_SESSION['user_login'] = $user_name;
            redirect('profile');
        }
        else{
            alert('username and password is incorrect please try again');
        }
    }
    
    
    ?>
    