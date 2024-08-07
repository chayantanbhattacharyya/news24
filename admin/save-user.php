<?php
session_start();
include('connection.php');

if (isset($_POST['confirm']) && isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];
    $fname = mysqli_real_escape_string($conn, $form_data['fname']);
    $lname = mysqli_real_escape_string($conn, $form_data['lname']);
    $username = mysqli_real_escape_string($conn, $form_data['user']);
    $password = mysqli_real_escape_string($conn, $form_data['password']);
    $role = mysqli_real_escape_string($conn, $form_data['role']);

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT `username` FROM `user` WHERE username='$username'";
    $query = mysqli_query($conn, $sql) or die("Connection failed");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['error'] = "User Name already exists";
        header('Location: add-user.php');
    } else {
        $sql1 = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) 
                 VALUES ('','$fname','$lname','$username','$hashed_password','$role')";
        $query1 = mysqli_query($conn, $sql1);

        if ($query1) {
            $last_id = mysqli_insert_id($conn);
            $_SESSION['success'] = "User added successfully. ID: " . $last_id;
            header("Location: submition.php?id=" . $last_id);
        } else {
            $_SESSION['error'] = "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            header("Location: add-user.php");
        }
    }
} else {
    // Redirect back to form if accessed incorrectly
    header("Location: add-user.php");
    exit;
}
?>
