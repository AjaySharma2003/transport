<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>User Login</title>
    <style>
    body{
    background-image: linear-gradient(#eae5c9,#6cc6cb);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 100vh;
    }
    .container{
        margin-top: 50px;
    }
    </style>
</head>
<body>
    <div class="navigation">
    <nav class="navbar navbar-default navbar-static-top navigation" >
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false" aria-controls="mynavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand head-letter" style="padding-left: 100px;"><h3><i class="fa-solid fa-bus"></i> Blue Bus</h3></a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar" style="margin-top: 27px;">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php">User Registration</a></li>
            <li><a href="admin_login.php">Admin</a></li>
        </ul>
        </div>
        </nav></div>
<div class="container">
<p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>

    <div class="col-md-1"></div>
<div class="col-md-6 left-image">
<img src="images/login.png" alt="Login" class="img img-responsive">
</div>
<div class="col-md-4" style="margin-top:90px;">
    <h3 class="form-head">User Login</h3>
<form action="#" method="post" class="form-block" autocomplete="off">
<div class="form-group">
    <label for="mail" class="control-label">Mail</label>
    <input type="email" name="mail" class="form-control" required>
</div>
<div class="form-group">
    <label for="password" class="control-label">Password</label>
    <input type="password" name="password" class="form-control" required>
</div>
<div class="form-group">
    <input type="submit" name="user_login" class="btn btn-success" value="Login">
</div>
</form>
<p class="letter-design">New User? <a href="register.php">Register here</a></p>
<!-- <p class="letter-design">Forgot Password?<a href="forgot_password.php">Click here</a></p> -->
</div>
<div class="col-md-1">
</div>
</div>


    <script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
    <script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php
session_start();
include('webpages/connect.php');
if(isset($_POST["user_login"]))
{
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE mail='$mail' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["mail"] = $mail;
        header("location:search.php");
    }
    else
    {
        echo '<script>document.getElementById("result").innerText = "Please enter valid mail id and password"</script>';
    }
}
?>