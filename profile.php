<?php include "nav.php";
if(!isset($_SESSION['user_login'])){
    redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>
    
    
        <div class="container mt-5">
            <div class="row">
    
                <div class="col-lg-9 mx-auto">
                     <?php 
                    $log = $_SESSION['user_login'];
                    $calling_user = mysqli_query($con,"SELECT  * FROM user where user_name='$log'");
                    $u = mysqli_fetch_array($calling_user);
                    ?>
                    <div class="card">
                        <div class="card-header"><h3 class="lead float-left">Your Profile Details</h3>
                        <a href="edit_profile.php" class="btn btn-success float-right ">Edit Your Profile</a>
                       <hr class="mt-5 mb-0 border border-secondary">
                    </div>

                    <div class="card-body card-shadow">
                    <table class="table mt-0">
                         <tr>
                             <th>User Name</th>
                             <td><?= $u['user_name'];?></td>
                         </tr>
                         <tr>
                             <th>Full Name</th>
                             <td><?= $u['full_name'];?></td>
                         </tr>
                         <tr>
                             <th>Email</th>
                             <td><?= $u['email'];?></td>
                         </tr>
                         <tr>
                             <th>Password</th>
                             <td><?= $u['password'];?></td>
                         </tr>
                       
                         <tr>
                             <th>Gender</th>
                             <td><?= $u['gender'];?></td>
                         </tr>
                        
                     </table>
                    </div>
                    
                     
              </div>
            </div>
        </div>
    
</body>
</html>