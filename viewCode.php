<?php
/*View the data to the user using unique ID  
    Used in: [view.php , update.php]*/
include "config.php";
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql_view = "SELECT id,username,email,work,gender,image FROM users where id='$id' ";
    $result=mysqli_query($conn,$sql_view);
    if(!$result){
        echo "<script>alert('Query Not Work!')</script>";
    }
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $username=$row['username'];
            $email=$row['email'];
            $work=$row['work'];
            $gender=$row['gender'];
            $image=$row['image'];
        }
    }
}
?>