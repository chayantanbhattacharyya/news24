<?php
include "connection.php";
session_start();

if (isset($_POST['update'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['l_name']);
    $usern = mysqli_real_escape_string($conn, $_POST['username']);
    $user_role = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if the username already exists for a different user
    $sql = "SELECT `username` FROM `user` WHERE `username` = '$usern' AND `user_id` != '$user_id'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['error'] = "Username already exists.";
        header("Location: update-user.php?id=$user_id");
        exit();
    } else {
        // Update the user information
        $sql1 = "UPDATE `user` SET `first_name` = '$fname', `last_name` = '$lname', `username` = '$usern', `role` = '$user_role' WHERE `user_id` = '$user_id'";
        if (mysqli_query($conn, $sql1)) {
            $_SESSION['success'] = "User updated successfully.";
            header("Location: users.php");
            exit();
        } else {
            $_SESSION['error'] = "Update failed: " . mysqli_error($conn);
            header("Location: update-user.php?id=$user_id");
            exit();
        }
    }
}
?>
