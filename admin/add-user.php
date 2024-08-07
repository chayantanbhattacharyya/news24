<?php include "header.php"; ?>
<?php
session_start();
include('connection.php');
?>
<?php
if (isset($_SESSION['error'])) {
    echo '<h1 style="color:red;text-align:center;margin: 10px 0;">' . $_SESSION['error'] . '</h1>';
    unset($_SESSION['error']);
}
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <form action="review.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="pass" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="SUBMIT" class="btn btn-primary" value="SUBMIT" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
