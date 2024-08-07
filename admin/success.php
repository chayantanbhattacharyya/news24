<style>
    .hi{
        text-align: center;
        color: blue;
    }
    .i{
        color: green;
    }
</style>

<?php include "header.php"; ?>
<?php
session_start();
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer to prevent SQL injection
    echo '<h1 class=hi>User added successfully.  <br> <i class=i>THANK YOU</i>  </h1>';

} else {
    echo '<h1>Error: ID not found.</h1>';
}
?>


