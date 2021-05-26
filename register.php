<?php 
include "createuserCode.php";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>
    <body>
        <div id="container-login" class="container overflow-hidden" style="">

            <div id="login-form" class="row gx-5">
                <!--for img container class-->
                <!-- for input type class-->
                <div class="col form-group">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label><h1 class="sigin-word">Register</h1></label>
                        <br><br>
                        <!-- username text input -->
                        <!-- for error name hidden -->
                        <div 
                             <?php if(isset($name_error)):?>
                             class="form_error";
                             <?php endif?>
                             >
                            <i class="fa fa-user icon"></i>
                            <input type="text" name="username" placeholder="UserName" class="input-box username_input" 
                                   value="<?php echo htmlspecialchars($username);?>"
                                   minlength="3" maxlength="15" pattern="[a-zA-Z0-9]+" required>
                            <?php if(isset($name_error)):?>
                            <span><br><?php echo $name_error ; ?></span>
                            <?php endif?>
                        </div>

                        <!-- email text input  -->
                        <div 
                             <?php if(isset($email_error) or isset($emailErr)):?>
                             class="form_error";
                             <?php endif?>
                             >
                            <i class="fa fa-user icon"></i>
                            <input type="text" name="email" placeholder="Email"  class="input-box username_input" value="<?php echo htmlspecialchars($email);?>" 
                                   required>         
                            <?php if(isset($email_error) or isset($emailErr)):?>
                            <span><br><?php echo $email_error ; ?></span>
                            <span><?php echo $emailErr;?></span>

                            <?php endif?>
                        </div>

                        <!-- department dropdownlist-->
                        <i class="fa fa-briefcase icon"></i> 
                        <select name="work" class=" input-box" value="<?php echo $work;?>" required>
                            <option value="">--Department--</option>
                            <option value="IT" <?php if($work=='IT') {echo "selected";} ?>>IT</option>
                            <option value="Developer" <?php if($work=='Developer') {echo "selected";} ?>>Developer</option>
                            <option value="Designer" <?php if($work=='Designer') {echo "selected";} ?>>Designer</option>
                            <option value="Full Stack" <?php if($work=='Full Stack') {echo "selected";} ?>>Full Stack</option>
                            <option value="Technical Support" <?php if($work=='Technical Support') {echo "selected";} ?>>Technical Support</option>
                        </select>
                        <br>

                        <!-- gender radio button -->
                        <div class="radiobutton">
                            <label style="font-weight: 400;"><i class="fa fa-mars-stroke gender-icon"></i>Gender</label>
                            <div class="radio-words">
                                <input type="radio" name="gender" <?php if($gender=='Male') {echo "checked";} ?> value="Male" >Male
                                <input type="radio" name="gender" <?php if($gender=='Female') {echo "checked";} ?> value="Female" >Female
                            </div>
                            <br>
                        </div>

                        <!-- password with its icon as a text input  -->
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="password" placeholder="Password" class="input-box" id="password" minlength="8" maxlength="15"
                               value="<?php echo htmlspecialcharS($_POST['password']); ?>" required>
                        <br>

                        <!-- confirm-password with its icon as a text input -->
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="input-box" id="confirm_password" minlength="8" maxlength="15"
                                value="<?php echo htmlspecialchars($_POST['cpassword']);?>"  required>
                                <span id='message' style="font-size: 15px; white-space: pre;text-align: center;"></span>

                        <br>

                        <!-- image uploaded input-->
                        <i class="fa fa-camera icon" style="opacity: .5"></i>
                        <input type="file" name="image" class="input-box">

                        <!-- button for sigin -->
                        <button name="submit" class="form-controll input-box btn-signin">Register</button>

                        <!-- login if have an account -->
                        <p class="login-register-text" style="font-size: 13px;opacity: .7">Already Have an account <a href="login.php">Login Here</a></p>
                    </form>
                </div>
            </div>
        </div>
        <script>
            
            $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else 
                $('#message').html('Passwords don\'\ t Matching').css('color', 'red');
            });
        </script>
    </body>
</html>
