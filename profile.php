<!-- User session updated if user change its
--> 
<?php 
include "config.php";
include "updateCode.php";

if(isset($_GET['delete'])){
    $deleted_id =$_GET['delete'];
    $sql="DELETE FROM users WHERE id='$deleted_id'";
    $result = mysqli_query($conn,$sql) or die("Error in delete Query!");
};

if(isset($_POST['delete-action'])){
    if($id =='1010'){
        echo "<script>alert('not allowed')</script>";
    }else{
        $all_deleted_id = $_POST['check'];
        $excuted_id=implode(',', $all_deleted_id);
        $sql = "DELETE FROM users WHERE id IN($excuted_id)";
        $result = mysqli_query($conn,$sql);    
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile Form | Full-background</title>
        <link rel="shortcut icon" href="images/bg-02.jpg">
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="js/jquery-3.6.0.min.js"></script>

    </head>
    <body>

        <!-- navbar icon with texts -->
        <div class="container">
            <div class="row" id="header">
                <div class="col-sm-6">
                    <img src="images/logo.png" alt="flowery logo" width="75px" height="75px">
                    <span class="logo-word"><a href="update.php?id=<?php echo $_SESSION['id']; ?>" style="color: #7F4591;text-decoration: underline;"><?php echo $_SESSION['username'] ?></a></span>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm user-info">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a  href="update.php?id=<?php echo $_SESSION['id']; ?>" class="nav-link" style="color: #7F4591;"><img src="images/<?php echo $_SESSION['image']?>" style="height: 76px;width: 76px;border-radius: 50%;"> </a>
                                </li>  
                                <li class="nav-item">     
                                    <a href="update.php?id=<?php echo $_SESSION['id']; ?>" target="_blank" class="nav-link" style="color: #7F4591;"><?php echo $_SESSION['username']?> </a>
                                </li>
                                <li class="nav-item">     
                                    <a class="nav-link" href="profile.php" style="color: #7F4591;text-decoration: underline;">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #7F4591;" href="logout.php">Logout</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST">

        <!-- table users -->
        <div class="tbl-users table-responsive-m">
            <label class="logo-word decore">Users' Information:</label>            

            <!------------------------------------ button: create-user -------------------------------->
             <!----------------------------------------- delete multible user ------------------------->
                <!-- if login with developer then it can create --> 
                   <?php
                    if($_SESSION['work'] == 'Developer'){

                        echo "<input type='submit' value='Delete' name='delete-action' class='btn-danger btn-signin updated-btn'
                        onclick=\"return confirm('Are you sure you want to delete this records ?')\"
                        style='float: right;background-image: none;margin-bottom: 20px; margin-left:20px !important;'>";
                        
                        $Developer = "
                            <button class='btn-signin updated-btn'
                            style='background-color: #7F4591 !important ;background-image: none;opacity: .8;margin-bottom: 20px;float: right;width: 300px !important'>
                            <a href='create.php' style='text-decoration: none;color:white;' target='_blank'>
                            Create New User
                            </a>
                            </button>";
                        echo $Developer; 
                    }else{
                        echo "<a href='profile.php?'
                                onclick=\"return confirm('Oh! Not Allowed to delete any user')\">
                                <input type='submit' value='Delete' class='btn-danger btn-signin updated-btn'
                                style='float: right;background-image: none;margin-bottom: 20px; margin-left:20px !important;'>
                            </a>";
                        
                        $user= "
                            <button class='btn-signin updated-btn'
                            style='background-color: #7F4591 !important ;background-image: none;opacity: .8;margin-bottom: 20px;float: right;width: 300px !important'>
                            <a href='profile.php?' style='text-decoration: none;color:white;' data-toggle=\"tooltip\"title=\"Create\"
                            onclick=\"return confirm('Sorry! Create User operation is Only allowed for Developers')\">
                            Create New User
                            </a>
                            </button>";
                        echo $user;
                    }
                ?>
            <br>      
            <table class="table table-responsive table-hover">
                <thead>
                    <tr class="th1">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <!--order by id -->
                        <th scope="col">
                            <button type="submit" name="order_id_asc" class="order_icon">
                                <i class='fas fa-sort-amount-down-alt'  data-toggle="tooltip" title= "Sort by ID ASC" ></i>
                            </button>
                        </th>
                        <th scope="col">
                            <button type="submit" name="order_id" class="order_icon">
                                <i class='fas fa-sort-amount-up-alt' data-toggle="tooltip" title= "Sort by ID DESC"></i>
                            </button>
                        </th>

                        <!-- order by username -->
                        <th scope="col">
                            <button type="submit" name="order_name_asc" class="order_icon">
                                <i class='fas fa-sort-alpha-down' data-toggle="tooltip" title= "Sort by UserName [A-Z]" ></i>
                            </button>
                        </th>  
                        <th scope="col">
                            <button type="submit" name="order_name" class="order_icon">
                                <i class='fas fa-sort-alpha-up' data-toggle="tooltip" title= "Sort by UserName [Z-A]"></i>
                            </button>
                        </th>
                                              
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    <!-- col name row-->
                    <tr class="th1">
                        <th scope="col">Check</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Department</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Image</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($_SESSION['work'] == 'Developer' ){
                        /* order by id and username*/
                        if(isset($_POST['order_id'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by id desc";
                        }elseif(isset($_POST['order_id_asc'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by id asc";
                        }elseif(isset($_POST['order_name'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by username desc";
                        }elseif(isset($_POST['order_name_asc'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by username asc";
                        }else{
                            $sql = "SELECT id,username,email,work,gender,image FROM users";
                        }
                        $result=mysqli_query($conn,$sql) or die("<script>alert('Query Not Work!')</script>");
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>  
                                    <td><input type='checkbox' name='check[]' style='width:16px;height:16px' value=".$row['id']."></td>                                                     
                                    <td>".$row['id']."</td>
                                    <td>".$row["username"]."</td>
                                    <td>".$row["email"]."</td>
                                    <td>".$row["work"]."</td>
                                    <td>".$row["gender"]."</td>
                                    <td><img src='images/".$row['image']."' style='height: 76px;width: 76px;border-radius:10px;'></td>
                                    <td>
                                        <a href='update.php?id=".$row['id']."' target='_blank' data-toggle=\"tooltip\" title='Update User!'>
                                        <i class='fa fa-edit'></i>
                                        </a\>
                                        <a>|</a>
                                            
                                        <a href='view.php?id=".$row['id']."' target='_blank' data-toggle=\"tooltip\" title=\"View ".$row['username']."'s Details!\">
                                        <i class='fa fa-eye '></i>
                                        </a>
                                        <a>|</a>
                                        
                                        <a href='profile.php?delete=".$row['id']."' data-toggle=\"tooltip\"title=\"Delete ".$row['username']."'s Record!\"
                                        onclick=\"return confirm('Are you sure to delete ".$row['username']."\'\s Record ?')\">
                                        <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                    </tr>";
                            }
                        }
                    
                        mysqli_free_result($result);
                    }else{
                         /* order by id and username*/
                        if(isset($_POST['order_id'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by id desc";
                        }elseif(isset($_POST['order_id_asc'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by id asc";
                        }elseif(isset($_POST['order_name'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by username desc";
                        }elseif(isset($_POST['order_name_asc'])){
                            $sql = "SELECT id,username,email,work,gender,image FROM users order by username asc";
                        }else{
                            $sql = "SELECT id,username,email,work,gender,image FROM users";
                        }
                        $result=mysqli_query($conn,$sql);
                        if(!$result){
                           echo "<script>alert('Query Not Work!')</script>";
                        }
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>
                                    <td><input type='checkbox' name='check[]' value=".$row['id']."></td>                                                     
                                    <td>".$row['id']."</td>
                                    <td>".$row["username"]."</td>
                                    <td>".$row["email"]."</td>
                                    <td>".$row["work"]."</td>
                                    <td>".$row["gender"]."</td>
                                    <td><img src='images/".$row['image']."' style='height: 76px;width: 76px;border-radius:10px;'></td>
                                    <td>
                                        <a href='profile.php?' data-toggle=\"tooltip\"title=\"Update ".$row['username']."'s Record!\"
                                        onclick=\"return confirm('Oh! Not Allowed to Update ".$row['username']."\'\s Record !\
                                        This action allowed Only for Developer')\">
                                        <i class='fa fa-edit'></i>
                                        </a>
                                        <a>|</a>
                                        
                                        <a href='view.php?id=".$row['id']."' target='_blank' data-toggle=\"tooltip\" title=\"View ".$row['username']."'s Details!\">
                                        <i class='fa fa-eye '></i>
                                        </a>
                                        <a>|</a>
                                        
                                        <a href='profile.php?' data-toggle=\"tooltip\"title=\"Delete ".$row['username']."'s Record!\"
                                        onclick=\"return confirm('Not Allowed to delete ".$row['username']."\'\s Record !')\">
                                        <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                    </tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
        <script>
            $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>
</html>