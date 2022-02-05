<?php 
 include("config/db.php");
if(!isset($_SESSION['user_login'])){
    redirect('login');
} 
 


if(isset($_GET['del'])){
	$id = $_GET['del'];

	$query = mysqli_query($con,"DELETE FROM post where post_id = '$id'");

	if($query){
		redirect('my_blog');
        
	}
	else{
		echo "not deleted";
	}
}

?>