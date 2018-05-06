<?php
include_once('dbcon.php');

$error = false;
if(isset($_POST['btn-register'])){
    //clean user input to prevent sql injection
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    //validate
    if(empty($username)){
        $error = true;
        $errorUsername = 'Please input username';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $errorEmail = 'Please enter a valid email';
    }

    if(empty($password)){
        $error = true;
        $errorPassword = 'Please enter a password';
    }elseif(strlen($password) < 6){
        $error = true;
        $errorPassword = 'Password must at least 6 characters';
    }

    //encrypt password with md5
    $password = md5($password);

    //insert data if no error
    if(!$error){
        $sql = "insert into administrators(username, email ,password)
                values('$username', '$email', '$password')";
        if(mysqli_query($conn, $sql)){
            $successMsg = 'Register successfully. <a href="index.php">click here to login</a>';
        }else{
            echo 'Error '.mysqli_error($conn);
        }
    }

}

?>

		<h3>Register</h3>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
						    <?php
                                if(isset($successMsg)){
                             ?>
                                    <div class="alert alert-success">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                        <?php echo $successMsg; ?>
                                    </div>
                            <?php
                                }
                            ?>
							<div class="icon1">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<label for="username" class="control-label">Username</label>
								<input  type="text" name="username" class="form-control" placeholder="Your name" required=""/>
								<span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
							</div>
							<div class="icon1">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<label for="email" class="control-label">Email</label>
								<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Your email" required=""/>
                                <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
							</div>
							<div class="icon1">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								<label for="password" class="control-label">Password</label>
								<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Create password" required=""/>
					            <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
							</div>
							<div class="bottom">
								<input type="submit" name="btn-register" value="Register" class="btn btn-primary">
							</div>
							<hr/>
                            <a href="index.php">Login</a>
						</form>	
					