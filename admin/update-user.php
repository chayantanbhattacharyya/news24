<?php 
include "header.php"; 
include('connection.php'); 
session_start();
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <?php
                if (isset($_GET['id'])) {
                    $user_get_id = $_GET['id'];
                    $sql = "SELECT * FROM `user` WHERE user_id = {$user_get_id}";
                    $query = mysqli_query($conn, $sql) or die('Connection failed');

                    if (mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_assoc($query);
                    } else {
                        echo "User not found!";
                        exit();
                    }
                } else {
                    echo "User ID is missing!";
                    exit();
                }

                if (isset($_SESSION['error'])) {
                    echo '<h1 style="color:red;text-align:center;margin: 10px 0;">' . $_SESSION['error'] . '</h1>';
                    unset($_SESSION['error']);
                }

           
                ?>
 <!-- Form Start -->
                <form action="config.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="1" <?php echo $row['role'] == 1 ? 'selected' : ''; ?>>Admin</option>
                            <option value="0" <?php echo $row['role'] == 0 ? 'selected' : ''; ?>>Normal User</option>
                        </select>
                    </div>
                    <input type="submit" name="update" class="btn btn-success" value="Update" />
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
