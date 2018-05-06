<?php
session_start();
include_once('dbcon.php');

$error = false;

if(isset($_POST['btn-login'])){
    
    $email = trim($_POST['email']);
    $email = htmlspecialchars(strip_tags($email));

    $password = trim($_POST['password']);
    $password = htmlspecialchars(strip_tags($password));

    if(empty($email)){
        $error = true;
        $errorEmail = 'Please input email';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $errorEmail = 'Please enter a valid email address';
    }

    if(empty($password)){
        $error = true;
        $errorPassword = 'Please enter password';
    }elseif(strlen($password)< 6){
        $error = true;
        $errorPassword = 'Password at least 6 character';
    }

    if(!$error){
        $password = md5($password);
        $sql = "select * from administrators where email='$email' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1 && $row['password'] == $password){
            $_SESSION['username'] = $row['username'];
            header('location: ../admin');
        }else{
            $errorMsg = 'Invalid Username or Password';
        }
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script src="assets/js/jquery.vide.min.js"></script>

	<div class="login-page">
        <div class="form">
            <h1>Admin Login</h1>
            <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                            <?php
                                if(isset($errorMsg)){
                                    ?>
                                    <div class="alert alert-danger">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                        <?php echo $errorMsg; ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            <div class="icon1">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Your email" required=""/>
                                <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                            </div>
                            <div class="icon1">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input type="password" placeholder="password" required="" name="password" class="form-control" autocomplete="off"/>
                                <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                            </div>
                            <div class="bottom">
                                <br/>
                                <input type="submit" name="btn-login" value="Login" class="btn btn-primary">
                            </div>
                        <hr/>
                        </form>
                        <button onclick="goBack()">Go Back</button>

        </div>
    </div>
		
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>