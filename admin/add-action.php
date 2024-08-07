<?php
session_start();
    include('connection.php');
    if (isset($_POST['save'])) {

 $fname=mysqli_real_escape_string($conn,$_REQUEST['fname']); 
 $lname=mysqli_real_escape_string($conn,$_REQUEST['lname']); 
 $usern=mysqli_real_escape_string($conn,$_REQUEST['user']); 
 $pass=mysqli_real_escape_string($conn,$_REQUEST['password']); 
 $user_role=mysqli_real_escape_string($conn,$_REQUEST['role']); 

 $sql="SELECT  `username` FROM `user` WHERE username='$usern'";
 $query=mysqli_query($conn,$sql)or die("connection failed");
 if(mysqli_num_rows($query)>0){
   $_SESSION['error'] = "User Name is already Exists";
   header('Location: add-user.php')
;
 }
 else{
  if (isset($_POST['pass'])){
    
  }
    $sql1="INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES ('','$fname','$lname','$usern','$pass','$user_role')";
    $query1=mysqli_query($conn,$sql1) ;

    
    if ($query1) {
      // Retrieve the last inserted ID
      $last_id = mysqli_insert_id($conn);
      $_SESSION['success'] = "User added successfully. ID: " . $last_id;
      header("Location: submition.php?id=" . $last_id); // Redirect to another page with the ID as a parameter
  } else {
      $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("Location: add-user.php"); // Redirect back to the form page in case of error
  }



    
 }
}
 
?>