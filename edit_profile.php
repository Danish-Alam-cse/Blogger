<?php include "nav.php";
if(!isset($_SESSION['user_login'])){
    redirect('login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>


</head>
<body>
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
                        <a href="my_blog.php" class="list-group-item list-group-item-action">My Blog</a>
                        <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                    </div>
                </div>
                <div class="col-lg-9">
                     <?php 
                    $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($con,"SELECT  * FROM user where user_name='$log'");
                    $u = mysqli_fetch_array($calling_user);
                    ?>
                    
                     <form action="edit_profile.php" method="post">
                                <div class="form-group">
                                    <label class="m-0 p-0">Full Name</label>
                                    <input type="text" name="full_name" class="form-control" value="<?= $u['full_name'];?>">
                                </div>
                               
                                <div class="form-group">
                                    <label class="m-0 p-0">User Name</label>
                                    <input type="text" name="user_name" class="form-control" value="<?= $u['user_name'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">User Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $u['email'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="m-0 p-0">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?= $u['password'];?>">
                                </div>
                               
                               
                                <div class="form-group">
                                    <label class="m-0 p-0">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary mt-2 btn-block">
                                </div>
                            </form>
                
            </div>
        </div>
    </div>
    
    <?php 
 if(isset($_POST['update'])){
    $user_name = $_POST['user_name'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
$query = mysqli_query($con,"update user set full_name = '$full_name', user_name='$user_name',email='$email',gender='$gender' where user_name ='".$_SESSION['user_login']."'");
        if($query){
    redirect('profile');
}
else{
    alert('not created');
}
    
    }
    ?>
    
    

</body>
</html>