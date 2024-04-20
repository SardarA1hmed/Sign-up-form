<?php

    session_start();
    include("conn.php");


    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];


        if(!empty($email) && !empty($pass)&& !is_numeric($email))
        {
            $query= "insert into signup (fname,lname,gender,address,contact,email,pass)
            VALUES('$fname','$lname','$gender','$address','$contact','$email','$pass')";
            mysqli_query($conn,$query);
            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
        }else{
            echo "<script type='text/javascript'> alert('Please Enter Some valid Information')</script>";

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
<div class="signup">
<h1>Sign-up Page</h1>
<h4>Its free and only takes a Minute.</h4>
<form method="POST">
    <label>First Name</label>
    <input type="text" name="fname" Required>
    <label>Last Name</label>
    <input type="text" name="lname" Required>
    <label>Gender</label>
    <input type="text" name="gender" Required>
    <label>Contact Address</label>
    <input type="text" name="address" Required>
    <label>Contact</label>
    <input type="text" name="contact" Required>
    <label>Email</label>
    <input type="email" name="email" Required>
    <label>Password</label>
    <input type="password" name="pass" Required>
    <input type="submit" name="submit" value="submit">
</form>
<p>By Clicking the Submit button are you agree to our <br>
<a href="">Terms and Conditions</a> and <a href=""> policy.</a></p>
<p>Already have an Account? <a href="login.php">Login Here</a></p>
</div>
    
</body>
</html>