<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>

    <title> Synchronizer Token Pattern </title>

</head>
<body>
<!-- Login Form-->
<div class="login-box">

    <img src="images/user.png" class="avatar">
    <h1>User Login</h1>

    <form action="login.php" method="POST" enctype='multipart/form-data'>

        <p>Username</p>
        <input type="text" id="name" name="name" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" id="password" name="password" placeholder="Enter Password">

        <input type="submit" id="submit" name="submit"  value="Login">

        <a href="#">Forget Password</a>
    </form>

</div>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
    login();
}
?>

<?php

//Function for logging
function login()
{

    $name='admin';
    $password='admin123';

    $input_name = $_POST['name'];
    $input_pwd = $_POST['password'];

    //check whether the credentials match
    if(($input_name == $name)&&($input_pwd == $password))
    {
        session_set_cookie_params(300);
        //start a session - user's browser
        session_start();
        session_regenerate_id();

        setcookie('session_cookie', session_id(), time() + 300, '/');
        
        //generate CSRF Token
        $_SESSION['csrf_Token'] = generate_token();
        //$Token = generate_token();
        
        //redirect to updateData.php
        header("Location:updateData.php");
        exit;
    }
    //if invalid login
    else
    {
        echo "<script>alert('Invalid Credentials !')</script>";
    }
}

//Function to generate CSRF token and return it
function generate_token()
{
    return sha1(base64_encode(openssl_random_pseudo_bytes(30)));
}

?>
