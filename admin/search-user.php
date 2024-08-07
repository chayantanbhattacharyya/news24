<?php include "header.php"; 
include 'connection.php';
session_start();
if (isset($_SESSION['error'])) {
    echo '<h1 style="color:red;text-align:center;margin: 10px 0;">' . $_SESSION['error'] . '</h1>';
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo '<h1 style="color:green;text-align:center;margin: 10px 0;">' . $_SESSION['success'] . '</h1>';
    unset($_SESSION['success']);
}
?>

<style>
        #btn{
            float: right;
            height: 34px;
            border-right: hidden;
            
            border-color: #D9534f;
        }
        #se{
            height: 100%;
            
        }
    </style>
     <form class="search-post" action="search-user.php" method ="post">
            <div class="input-group">
                <input type="number" name="search"  id="btn" placeholder="Search ....." required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger" id="se" value="search" required>Search</button>
                    
                </span>
            </div>
        </form>


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
                  if (isset($_POST['search'])){
                    include('connection.php');

                    
                  
                  $number=$_REQUEST['search'];
                  $sql= "SELECT * FROM `user` WHERE user_id ='$number'";
                  $query= mysqli_query($conn,$sql);
                 
                  if(mysqli_num_rows($query)>0){  
                    while($row1=mysqli_fetch_assoc($query)){
                  
                  ?>
                  <tbody>
                          <tr >
                              <td class='id'><?php echo $row1['user_id'];?></td>
                              <td><?php echo $row1['first_name'], " ", $row1['last_name'] ;?></td>
                              <td><?php echo $row1['username'];?></td>
                              <td><?php
                              if($row1['role']==1){
                                echo'ADMIN';
                              }
                              else{
                                echo'NORMAL_USER';
                              }
                              ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row1["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row1["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                         
                      </tbody>
                       <?php
                      }
                      }
                      else{
                        echo"<tbody>";
                        echo'<tr >';
                        echo"<td >";
                        echo"<h1 style='text-align: center;'>$number.Given id has no recod.";
                        echo"</td>";
                        echo"<td>";
                        echo"<h4 style='text-align: center;'>NULL";
                        echo"</td>";
                        echo"<td>";
                        echo"<h4 style='text-align: center;'>NULL";
                        echo"</td>";
                        echo"<td>";
                        echo"<h4 style='text-align: center;'>NULL";
                        echo"</td>";
                        echo"<td>";
                        echo"<h4 style='text-align: center;'>NULL";
                        echo"</td>";
                        echo"<td>";
                        echo"<h4 style='text-align: center;'>NULL";
                        echo"</td>";
                        echo"</tr>";
                        echo"</tbody>";
                      }
                    }
                  ?>
                  </table>
                  

                  
              </div>
          </div>
      </div>
  </div>
  <?php include "footer.php"; ?>