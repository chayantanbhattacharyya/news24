<?php
session_start();
include('connection.php');

function validatePassword($password) {
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must contain at least one uppercase letter.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must contain at least one lowercase letter.";
    }
    if (!preg_match('/\d/', $password)) {
        return "Password must contain at least one number.";
    }
    if (!preg_match('/[@$!%*?&]/', $password)) {
        return "Password must contain at least one special character.";
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store the form data in session variables
    $_SESSION['form_data'] = $_POST;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['user'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate password
    $validationResult = validatePassword($password);
    if ($validationResult !== true) {
        $_SESSION['error'] = $validationResult;
        header('Location: add-user.php');
        exit();
    }
} else {
    // Redirect back to form if not coming from POST
    header("Location: add-user.php");
    exit;
}
?>

<?php include "header1.php"; ?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Confirm User Data</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Display Form Data for Review -->
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($fname); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lname); ?></p>
                <p><strong>User Name:</strong> <?php echo htmlspecialchars($username); ?></p>
                <p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>
                <p><strong>Role:</strong> <?php echo $role == 1 ? 'Admin' : 'Normal User'; ?></p>

                <form action="save-user.php" method="POST">
                    <input type="submit" name="confirm" class="btn btn-success" value="Confirm" />
                    <a href="add-user.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
