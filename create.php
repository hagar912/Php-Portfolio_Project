<!-- button back to list style-->
<?php 
include "config.php";
error_reporting(0);
include "createuserCode.php";
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    	<!-- Form | Full-background-->
        <title>Create </title>
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

        <!-- --------------------------------------------------navbar icon with texts --------------------------------------------->
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
                                    <a class="nav-link" style="color: #7F4591;"><img src="images/<?php echo $_SESSION['image']?>" style="height: 76px;width: 76px;border-radius: 50%;"> </a>
                                </li>  
                                <li class="nav-item">     
                                    <a class="nav-link" style="color: #7F4591;"><?php echo $_SESSION['username']?> </a>
                                </li>
                                <li class="nav-item">     
                                    <a class="nav-link" href="profile.php" style="color: #7F4591;">Home</a>
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

        	<!-- for table with inputs type-->
        <div class="container overflow-hidden" style="">
            <div id="view" class="row gx-5">
	    	 	<p class="logo-word"> Create New User</p>
	    	 	<hr />
                <!-- ----------------------------------------- Form Group ---------------------------------->
                <div class="col form-group">
                    <form method="POST" action="" enctype="multipart/form-data">
                    	
                        <!-- UserName -->
                        <div 
                            <?php if(isset($name_error)):?> 
                                class="form_error";
                            <?php endif?>>
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control input-box"
                                   value="<?php echo $username ?>"
                                   minlength="3" maxlength="15" pattern="[a-zA-Z0-9]+" required>
                            <?php if(isset($name_error)):?>
                            <span><?php echo $name_error ; ?></span><br>
                            <?php endif?>
                        </div>

                        <!-- Email -->
                        <div 
                            <?php if(isset($email_error) or isset($emailErr)):?>
                                class="form_error";
                            <?php endif?>>
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control input-box" value="<?php echo $email ?>" 
                                   required>         
                            <?php if(isset($email_error) or isset($emailErr)):?>
                            <span><?php echo $email_error ; ?></span>
                            <span><?php echo $emailErr;?></span><br><br>
                            <?php endif?>
                        </div>

                        <!-- Department -->
                    	<label>Department:</label><br>
                        <select name="work" class=" input-box" value="<?php echo $work ?>"required>
                            <option value="">--Department--</option>
                            <option value="IT" <?php if($work=='IT') {echo "selected";} ?>>IT</option>
                            <option value="Developer" <?php if($work=='Developer') {echo "selected";} ?> >Developer</option>
                            <option value="Designer" <?php if($work=='Designer') {echo "selected";} ?>>Designer</option>
                            <option value="Full Stack" <?php if($work=='Full Stack') {echo "selected";} ?> >Full Stack</option>
                            <option value="Technical Support" <?php if($work=='Technical Support') {echo "selected";} ?>>Technical Support</option>
                        </select>
                        <br>

                        <!-- Gender -->
                    	<label>Gender:</label>
                        <div class="radiobutton">
                            <div class="radio-words">
                                <input type="radio" name="gender" <?php if($gender=='Male') {echo "checked";} ?> value="Male" required >Male
                                <input type="radio" name="gender" <?php if($gender=='Female') {echo "checked";} ?> value="Female" required>Female
                            </div>
                            <br>
                        </div>

                        <!-- password -->
                        <label>Password:</label><br>
                        <input type="password" name="password" placeholder="Password" class="input-box"
                               value="<?php echo htmlspecialcharS($_POST['password']); ?>" required>
                        <br>

                        <!-- confirm-password -->
                        <label>Confirm Password:</label><br>
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="input-box"
                                value="<?php echo htmlspecialchars($_POST['cpassword']);?>"  required>
                        <br>

                        <!-- image -->
                        <label>Upload your Image:</label><br>
                        <input type="file" name="image" class="input-box" ><br>

                    	<button name="submit" class="btn-signin updated-btn">Save</button>
                        <button name="" class="btn-signin updated-btn"  formaction="profile.php">Back To List</button>
                    </form>
                </div>
            </div>
    	 </div>
    </body>
</html>