<?php

session_start();
$msg = false;
include('dbconnect.php');
if(isset($_POST['user_name'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query = "select * from user where user = '" .$user_name. "' AND password = '" .$user_password. "' limit 1";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result)==1){
        header('Location: index.php');
    }else{
        $msg = "Incorrect Password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="post">
                    <h2>LOGIN</h2>
                    <div class="card">
                        <label for="name">Name
                            <input type="text" name="user_name" placeholder="Enter Your Username..." required>
                        </label>
                    </div>
                    <div class="card">
                        <label for="name">Password
                            <input type="password" name="user_password" placeholder="Enter Your Password..." required>
                        </label>
                    </div>
                    <input type="Submit" value="Login" class="submit">
                    <div class="check">
                        <input type="checkbox" name="" id=""><span>Remember Me.</span>
                    </div>
                    <p>Don't have an account yet?<a href="signup.html">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="right_bx1">
            <img src="login.png.jpeg" alt="">
            <!-- <h3>Incorrect Password</h3> -->
            <?php
            echo ('<h3>'. $msg .'</h3>');
            ?>
        </div>
    </header>
</body>
</html>