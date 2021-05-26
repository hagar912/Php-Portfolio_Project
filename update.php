<!--- button for back to list stye -->
<?php
include "updateCode.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    	<!-- Form | Full-background-->
        <title>Update </title>
        <link rel="shortcut icon" href="images/bg-02.jpg">
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- BOOTSTRAP -->
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    </head>
    <body><!-- navbar icon with texts -->
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
                                    <a href="update.php?id=<?php echo $_SESSION['id']?>" class="nav-link" style="color: #7F4591;text-decoration: underline;"><?php echo $_SESSION['username']?> </a>
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
	    	 	<p class="logo-word">Update User's Information</p>
	    	 	<hr />

                <!-- -------------------- Form group ------------------------------->
                <div class="col form-group">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <!--id-->
                    	<label>ID:</label>
                        <input onkeydown="return false;"  class="form-control input-box view-input" style="background-color: #F5F5F5;" 
                                value="<?php echo $id ?>" >

                        <!-- username -->
                        <div 
                            <?php if(isset($name_error)):?> 
                                class="form_error";
                            <?php endif?>>
                            <label>Username:</label>
                             <!--  if this a default user can't changer name -->
                            <?php 
                            if($id == '1010'){
                                echo "<input  onkeydown=\"return false;\" disable name='username' class='form-control input-box view-input'
                                            style='background-color: #F5F5F5;' value='$username' required>";
                            }else{
                                echo "<input type='text' name='username' class='form-control input-box'
                                            value='$username' minlength='3' maxlength='15' pattern='[a-zA-Z0-9]+' required>";
                            }
                            ?>
                            <?php if(isset($name_error)):?>
                            <span><?php echo $name_error ; ?></span><br>
                            <?php endif?>
                        </div>

                        <!-- Email  -->
                        <div 
                            <?php if(isset($email_error) or isset($emailErr)):?>
                                class="form_error";
                            <?php endif?>>
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control input-box" value="<?php echo $email ?>" 
                                   required>         
                            <?php if(isset($email_error) or isset($emailErr)):?>
                            <span><?php echo $email_error ; ?></span>
                            <span><?php echo $emailErr ; ?></span>
                            <br><br>
                            <?php endif?>
                        </div>

                        <!-- Department -->
                        <label>Department:</label><br>
                        <?php 

                        /* enable to choose any department else developer*/
                        if($_SESSION['id'] == $id and $_SESSION['work'] != 'Developer'){
                            echo "<select name='work' class='input-box' >
                            <option value='' disabled>--Department--</option>
                            <option value='IT' >IT </option>
                            <option value='Designer' >Designer</option>
                            <option value='Developer' disabled >Developer</option>
                            <option value='Full Stack' >Full Stack</option>
                            <option value='Technical Support'>Technical Support</option>
                            <option {echo selected=' selected'}>$work</option>
                            </select>
                            <br>";
                        }else{
                            //<!-- Department [IT, designer ,...]-->
                            echo "<select name='work' class='input-box' value='$work'>
                            <option value='' disabled>--Department--</option>
                            <option value='IT'> IT </option>
                            <option value='Designer' >Designer</option>
                            <option value='Full Stack' >Full Stack</option>
                            <option value='Technical Support' >Technical Support</option>
                            <option value='Developer'>Developer </option>
                            <option {echo selected=' selected'}>$work</option>
                            </select>
                            <br>";
                        }
                        ?>
                        
                        <!-- Gender
                                if($_SESSION['id'] == $id and $_SESSION['work'] != 'Developer'){
                            echo "<input name ='work' onkeydown=\"return false;\" disabled class='form-control input-box view-input' value='$work'>"; -->
                    	<label>Gender:</label>
                        <div class="radiobutton">
                            <div class="radio-words">
                                <input type="radio" name="gender" <?php if($gender=='Male') {echo "checked";} ?> value="Male" >Male
                                <input type="radio" name="gender" <?php if($gender=='Female') {echo "checked";} ?> value="Female" >Female
                            </div>
                            <br>
                        </div>

                        <!-- Image -->
                        <label>Upload Your Image</label><br>
                        <img src="images/<?php echo $image?>" style="margin-left:20px;width: 100px;height: 100px"> <br>

                        <!--  if this a default user can't changer image -->
                        <?php 
                        if(($id == '1010' or $id =='1011') and ($username =='Default' or $username == 'Admin')){
                            echo "<input type='file' disabled name='image' class='input-box' value=".$_SESSION['image'].">
                            <br>";
                        }else{
                            echo "<input type='file' name='image' class='input-box' value=".$_SESSION['image']."><br>";
                        }
                        ?>

                        <!-- button-->
                    	<button name="submit" class="btn-signin updated-btn">Save</button>
                        <button name="" class="btn-signin updated-btn"  formaction="profile.php">Back To List</button>
                    </form>
                </div>
            </div>
    	</div>
    </body>
</html>