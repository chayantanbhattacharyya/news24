<?php include "header.php"; 
include 'connection.php';
session_start();
if (isset($_SESSION['error'])) {
    echo '<h1 style="color:red;text-align:center;margin: 10px 0;">' . $_SESSION['error'] . '</h1>';
    unset($_SESSION['error']);
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
             
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer to prevent SQL injection


                      $sql="SELECT * FROM `user` where user_id =$id ";
                      $query=mysqli_query($conn,$sql) or die("connection failed");
                      if(mysqli_num_rows($query)>0){ 
                      
                      while($row=mysqli_fetch_assoc($query)){

                      
                      ?>
                      <tbody>
                          <tr>
                              <td class='id'><?php echo $row['user_id'];?></td>
                              <td><?php echo $row['first_name'], " ", $row['last_name'] ;?></td>
                              <td><?php echo $row['username'];?></td>
                              <td><?php
                              if($row['role']==1){
                                echo'ADMIN';
                              }
                              else{
                                echo'NORMAL_USER';
                              }
                              ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                         
                      </tbody>
                       <?php
                      }
                      }
                      else {
                        echo "No results found";
                    }
                    }
                    echo '<h1>User added successfully. User ID: ' . $id . '</h1>';
                  ?>
                  </table>
                  
                 
              
              </div>
          </div>
      </div>
  </div>

  <?php include "footer.php"; ?>