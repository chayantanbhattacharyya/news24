<?php
session_start();
include ('connection.php');
$get_delete_id =$_GET['id'];
$sql="DELETE FROM `user` WHERE 	user_id ='$get_delete_id '";
$query=mysqli_query($conn,$sql) or die('connection is failed');
$_SESSION['error'] = " $get_delete_id(S.No.).This row is deleted successfully.";
   header('Location: users.php');
?>