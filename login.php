<?php
include "config.php";
error_reporting(0);
session_start();

if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $username =$_POST['username'];
    $sql="SELECT * FROM users WHERE (email='$email' OR username='$email') AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo "<script>alert('Query Not Work!')</script>";
    }
    if($result ->num_rows > 0 ){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['work']=$row['work'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['image']=$row['image'];

        echo "<script> alert('successfully!!!!') </script>";
        $email="";
        header("Location:profile.php");
    }else{
        echo "<script> alert('Please! Check your Username or password.') </script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Form | Full-background</title>
        <link rel="shortcut icon" href="images/bg-02.jpg">
        <link rel="stylesheet" type="text/css" href="css/login-3.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    </head>
    <body>
        <div id="container-login" class="container overflow-hidden" style="">

            <div id="login-form" style="padding: 4% 1%;" class="row gx-5">
                <!--for img container class-->
                <!-- for input type class-->
                <div class="col form-group">
                    <form method="POST" action="">

                        <label><h1 class="sigin-word"> Sign In</h1></label>
                        <br><br>

                        <!-- username text input -->
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="email" placeholder="Email or UserName" class="form-controll input-box" value="<?php echo $email; ?>">
                        <br>

                        <!-- password with its icon as a text input -->
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="password" placeholder="Password" class="form-controll input-box">
                        <br>

                        <a href="forget_password.php"><p class="forget-pass">Forget Password?</p></a>
                        <br>

                        <!-- button for sigin -->
                        <button name="submit" class="form-controll input-box btn-signin">SIGN IN</button>
                        <br>

                        <!-- for social sinin-->
                        <h4 style="opacity:.7;font-size: 15px">Or Sign in with</h4>
                        <a class="fa fa-facebook social" onclick='alert("Facebook login is Comming Soon!")'></a>
                        <a class="fa fa-linkedin social" onclick='alert("Linkedin login is Comming Soon!")'></a>

                        <br><br>
                        <p class="create-acc" style="font-size: 12px;opacity: .7">Don't have an Account <a href="register.php">Create Now!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>