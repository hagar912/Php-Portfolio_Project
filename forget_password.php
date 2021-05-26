<?php
include "config.php";
error_reporting(0);
if(isset($POST['email_submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $username =$_POST['username'];
    $select_id = "SELECT id FROM users where email='$email'";
    $id_result=mysqli_query($conn,$select_id);
    print_r($select_id);
}
/*if(isset($_Post['submit'])){
    $password=$_POST['newpassword']
    $update_query="UPDATE users SET password='$password'";
}
*/
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

                        <label><h1 class="sigin-word">Forget Password</h1></label>
                        <br><br>


                        <i class="fa fa-user icon"></i>
                        <input type="text" name="email" placeholder="Email or UserName" class="form-controll input-box" value="<?php echo $email; ?>">
                        <br>
                        <?php 
                            $get_id_query="SELECT id FROM users where email='$email'";
                            $get_id_result=mysqli_query($conn,$get_id_query) or die("error in get id query");
                            $row_id = mysqli_fetch_array($get_id_result);
                            //print_r($row_id);exit();
                        ?>
                        <button name="email_submit" class="form-controll input-box btn-signin"><a href="forget_password.php?id=<?php echo $row_id['id'] ?>">Email!</a></button>
                        <br>

                        <!-- username text input -->
                        <i class="fa fa-user icon"></i>
                        <input type="password" name="old_password" placeholder="Old Password" class="form-controll input-box">
                        <br>

                        <!-- password with its icon as a text input -->
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="newpassword" placeholder="New Password" class="form-controll input-box">
                        <br>

                        <!-- forget pass ..href="<?php echo("alert('Comming Soon')") ?>" -->
                        <a href="#" onclick='alert("Comming Soon!")' ><p class="forget-pass">Forget Password?</p></a>
                        <br>

                        <!-- button for sigin -->
                        <button name="submit" class="form-controll input-box btn-signin">Change Now!</button>
                        <br>

                        <br><br>
                        <p class="create-acc" style="font-size: 12px;opacity: .7">Don't have an Account <a href="register.php">Create Now!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>