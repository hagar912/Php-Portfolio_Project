<?php 
/* create new user data 
    Used in: [register.php , create.php] */
include "config.php";
error_reporting(0);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //define input types
    $username = $_POST['username'];
    $email = $_POST['email'];
    $work= $_POST['work'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    //store img to this path target = path + image
    $target = "images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    //check existance for username or email in db.
    $sql_check_username = "SELECT username from users where username='$username'";
    $sql_check_email = "SELECT email FROM users WHERE email='$email'";
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
                if($password === $cpassword){
                    $sql="INSERT INTO users (username,email,work,gender,password,image)
                            VALUES('$username','$email','$work','$gender','$password','$image')";
                    $result=mysqli_query($conn,$sql);
                    if(!$result){
                        echo "<script>alert('Insert in db Query Not Work!')</script>";
                    }else{
                        $filename ='create.php';
                        if(basename($_SERVER['PHP_SELF']) == $filename) {
                            echo "<script>alert('Registered done successfully!')</script>";
                            header("Location:profile.php");
                            $username="";
                            $email="";
                            $_POST['password']="";
                            $_POST['cpassword']="";
                            $work ="";
                            $gender="";
                        }else{
                            header("Location:login.php");
                            echo "<script>alert('Registered done successfully!')</script>";
                            $username="";
                            $email="";
                            $_POST['password']="";
                            $_POST['cpassword']="";
                            $work ="";
                            $gender="";
                        }
                    }
                }else{
                    echo "<script>alert('Password not matched')</script>";
                }
            }else{
                /* if user wanted to not upload image --> redirected to default image */
                if($work=='Developer'){
                    $image_q="SELECT image from users where(id='1011' and username='Admin' and image='admin.jpg')";
                }else{
                    $image_q="SELECT image from users where(id='1010' and username='Default' and image='default.jpg')";
                }
                $img_result= mysqli_query($conn,$image_q) or die("Error on uploading image query!");
                $row = mysqli_fetch_array($img_result);
                if(mysqli_num_rows($img_result) > 0){
                    $default_image = $row['image'];
                    if($password === $cpassword){
                        $sql="INSERT INTO users (username,email,work,gender,password,image)
                                VALUES('$username','$email','$work','$gender','$password','$default_image ')";
                        $result=mysqli_query($conn,$sql);
                        if(!$result){
                            echo "<script>alert('Insert in db Query Not Work!')</script>";
                        }else{
                            $filename ='create.php';
                            if(basename($_SERVER['PHP_SELF']) == $filename) {
                                echo "<script>alert('Registered done successfully!')</script>";
                                header("Location:profile.php");
                                $username="";
                                $email="";
                                $_POST['password']="";
                                $_POST['cpassword']="";
                                $work ="";
                                $gender="";
                            }else{
                                header("Location:login.php");
                                echo "<script>alert('Registered done successfully!')</script>";
                                $username="";
                                $email="";
                                $_POST['password']="";
                                $_POST['cpassword']="";
                                $work ="";
                                $gender="";
                            }
                        }
                    }else{
                        echo "<script>alert('Password not matched')</script>";
                    }
                }
            }
        }
    }
}
?>