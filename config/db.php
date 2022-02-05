<?php

$con = mysqli_connect('localhost','root','','blog');

session_start();

// if($con){
//     echo "db connected";
// }

function redirect($page){
    
    echo "<script>window.open('$page.php','_self')</script>";

}

function alert($msg){
    echo "<script>alert('$msg')</script>";
}
         



?>