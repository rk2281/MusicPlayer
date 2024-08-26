<?php

session_start();

include('dbconnect.php');
$msg = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_re_password = $_POST['user_re_password'];


    if(!empty($user_name) && !empty($user_email) && !empty($user_password)  && !is_numeric($user_password)){
        if($user_password === $user_re_password){
            $query = "insert into user (user, email, password) VALUES ('$user_name', '$user_email', '$user_password')";
            mysqli_query($con, $query);
            header("Location: login.php");
        }else{
            $msg = "Password Not Match";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website Sign Up</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="post">
                    <h2>SIGN UP</h2>
                    <div class="card">
                        <label for="name">Name
                            <input type="text" name="user_name" placeholder="Enter Your Username..." required>
                        </label>
                    </div>
                    <div class="card">
                        <label for="name">Email
                            <input type="text" name="user_email" placeholder="Enter Your Email..." required>
                        </label>
                    </div>
                    <div class="card">
                        <label for="name">Password
                            <input type="password" name="user_password" placeholder="Enter Your Password..." required>
                        </label>
                    </div>
                    <div class="card">
                        <label for="name">Re-Password
                            <input type="password" name="user_re_password" placeholder="Enter Your Password..." required>
                        </label>
                    </div>
                    <input type="Submit" value="Login" class="submit">
                    <div class="check">
                        <input type="checkbox" name="" id=""><span>Remember Me.</span>
                    </div>
                    <p>You have an account?<a href="login.html">LogIn</a></p>
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