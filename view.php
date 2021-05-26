<?php 
include "config.php";
session_start();
error_reporting(0);
//php code --> include "viewCode.php" for dispaly data using include
?>
<!DOCTYPE html>
<html>
    <head>
    	<!-- Form | Full-background-->
        <title>View </title>
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
	    	 	<p class="logo-word">User's Details</p>
	    	 	<hr />
                <!-- for input type class-->
                <div class="col form-group">
                    <form method="POST" action="">
                    	<label>ID:</label>
                        <input onkeydown="return false;" class="form-control input-box view-input"  value="<?php include 'viewCode.php'; echo $id ?>" >

                    	<label>Username:</label>
                    	
                    	<input onkeydown="return false;" class="form-control input-box view-input" value="<?php echo $username ?>">

                    	<label>Email:</label>
                    	<input onkeydown="return false;" class="form-control input-box view-input" value="<?php echo $email ?>">

                    	<label>Department:</label>
                    	<input onkeydown="return false;" class="form-control input-box view-input" value="<?php echo $work ?>">

                    	<label>Gender:</label>
                    	<input onkeydown="return false;" class="form-control input-box view-input" value="<?php echo $gender ?>">

                    	<label>Image:</label>
                    	<br>
                    	<img src="images/<?php echo $image?>" style="margin:20px;width: 100px;height: 100px"> 

                        <button name="" class="form-control btn-primary btn-signin" formaction="profile.php">Back To List</button>
                    </form>
                </div>
            </div>
    	 </div>
    </body>
</html>


