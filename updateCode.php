<?php 
include "config.php";
include 'viewCode.php';
error_reporting(0);
if (isset($_POST['submit'])){
    //define input types
    $username = $_POST['username'];
    $email = $_POST['email'];
    $work= $_POST['work'];
    $gender = $_POST['gender'];
    $target = "images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    //For E-mail Validation
    //check existance for username or email in db.
    $sql_check_username = "SELECT username from users where username='$username' AND id!='$id' ";
    $sql_check_email = "SELECT email FROM users WHERE email='$email' AND id!='$id' " ;
    $result_check_username = mysqli_query($conn,$sql_check_username) or die("ERROR on the Username check query".mysqli_error());
    $result_check_email = mysqli_query($conn,$sql_check_email) or die("ERROR on the email check query".mysqli_error());
    if(mysqli_num_rows($result_check_username) >= 1){
        $name_error= "Username already exists!";     
    }elseif(mysqli_num_rows($result_check_email) > 0){
        $email_error= "Email already exists!";
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }else{
        //check if saved in the file or not= "<img src='images/".$row['image']."'>";
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                //check unique of username or pass
                $sql_update="UPDATE users SET username='$username' ,email='$email' ,work='$work' ,gender='$gender' ,image='$image' where id='$id'";
                $result_update=mysqli_query($conn,$sql_update) or die("Error in the updated query");
            }else{
                //if user not upload the image --> it will redirected to the deafult image for original image for the user ..
                $image_q="SELECT image from users where id='$id'";
                $img_result= mysqli_query($conn,$image_q) or die("Error on uploading image query!");
                $row = mysqli_fetch_array($img_result);
                if(mysqli_num_rows($img_result) > 0){
                    $image = $row['image'];
                    $sql_update="UPDATE users SET username='$username' ,email='$email' ,work='$work' ,gender='$gender' ,image='$image' where id='$id'";
                    $result_update=mysqli_query($conn,$sql_update) or die("Error in the updated query");
                    //header("Location:profile.php");
                }else{
                    echo "<script>alert('Choosing actual image error!')</script>";
                }
            }
            //fatech rsult from db to session.
            $u_row= "SELECT * from users where id='$id'";
            $result_view=mysqli_query($conn,$u_row) or die("Error in session desplay query");
            $updated_row= mysqli_fetch_array($result_view);
            if($result_view){
                session_unset();
                session_start();
                $_SESSION['id']=$updated_row['id'];
                $_SESSION['username']=$updated_row['username'];
                $_SESSION['email']=$updated_row['email'];
                $_SESSION['work']=$updated_row['work'];
                $_SESSION['gender']=$updated_row['gender'];
                $_SESSION['image']=$updated_row['image'];
                echo "<script>alert('Updated done successfully!')</script>";
            }
        }
    }
}
?>