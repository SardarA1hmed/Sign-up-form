<?php

    session_start();
    include("conn.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        if(!empty($email) && !empty($pass) && !is_numeric($email))
        {
            $query= "select *from signup where email='$email' limit 1";
            $result= mysqli_query($conn,$query);

            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['pass']== $pass)
                {
                    header("locaction: welcome.php");
                }
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Login Page.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="Login">
<h1>Login</h1>
<form method="POST">
    <div class="txt-center">
    <label>Email</label>
    <input type="email" name="email" Required>
    <label>Password</label>
    <input type="password" name="pass" Required>
    <input type="submit" name="submit" value="submit">
    </div>
</form>
<p>Not Have An Account?<a href="signup.php">Sign Up Here</a></p>
</div>
</body>
</html>