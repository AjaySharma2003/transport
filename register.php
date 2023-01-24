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
    <title>User Registration</title>
    <style>
        body{
    background-image: linear-gradient(#eae5c9,#6cc6cb);
    width: 100%;
    height: 100vh;
    }
    </style>
    <script>
    function passwod_check()
    {
        let is_continue = true;
        let password = document.getElementById('password').value;  
        let c_password = document.getElementById("c_password").value;
        if(password!=c_password)
        {
            alert("Password and confirm should be same");
            document.getElementById("register").disabled = true;
        }
        else{
            document.getElementById("register").disabled = falseś;
        }
    }
    </script>
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
            <li><a href="index.php">User Login</a></li>
            <li><a href="admin_login.php">Admin</a></li>
        </ul>
        </div>
        </nav></div>
<div class="container">
<div class="col-md-1"></div>
<div class="col-md-6 left-image" style="margin-top: 50px;">
<p id="result" style="margin-left: 90px;color: #a8261d;font-size:17px;"></p>
<img src="images/register.png" alt="Registration" style="margin-top: 50px;" class="img img-responsive">
</div>
<div class="col-md-4" style="margin-top:30px;">
    <h3 class="form-head">User Registration</h3>
<form action="#" method="post" class="form-block" autocomplete="off">
<?php
if(isset($_POST["register"]))
{
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $phone_number = $_POST["phone_number"];
    $security_question = $_POST["security_question"];
    $security_question_answer = $_POST["security_question_answer"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
}
?>
<div class="form-group">
    <label for="name" class="control-label">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name;?>" required>
</div>
<div class="form-group">
    <label for="mail" class="control-label">Mail</label>
    <input type="email" name="mail" class="form-control" value="<?php echo $mail?>" required>
</div>
<div class="form-group">
    <label for="phone_number" class="control-label">Phone Number</label>
    <input type="tell" name="phone_number" class="form-control" pattern="[6-9]{1}[0-9]{9}" title="Enter valid Mobile Number" value="<?php echo $phone_number;?>" required minlength="10" maxlength="10">
</div>
<div class="form-group">
    <label for="security_question" class="control-label">Security Question</label>
    <select name="security_question" class="form-control" required>
    <option value="">Select</option>
    <option value="pet" <?php if($security_question == 'pet'){echo("selected");}?> name="pet">What is your pet name?</option>
    <option value="color" <?php if($security_question == 'color'){echo("selected");}?> name="color">What is your favourite color?</option>
    <option value="country" <?php if($security_question == 'country'){echo("selected");}?> name="country">What is your favourite country?</option>
    <option value="sport"<?php if($security_question == 'sport'){echo("selected");}?>  name="sport">What is your favourite sport?</option>
    </select>
</div>
<div class="form-group">
    <label for="security_question_ans" class="control-label">Answer for security question</label>
    <input type="text" name="security_question_answer" value="<?php echo $security_question_answer;?>" class="form-control" required>
</div>
<div class="form-group">
    <label for="password" class="control-label">Password</label>
    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password;?>" required>
</div>
<div class="form-group">
    <label for="c_password" class="control-label">Confirm Password</label>
    <input type="password" name="c_password" id="password" class="form-control" required value="<?php echo $c_password;?>">
</div>

<div class="form-group">
    <input type="submit" name="register" id="register" class="btn btn-success" value="Register" onclick="password_check()">
</div>
<!-- <div class="form-group">
    <label for="" class="control-label"></label>
    <input type="text" name="" class="form-control">
</div> -->
</form>
<p class="letter-design">Already have an account? <a href="index.php">Login</a></p>
</div>
<div class="col-md-1"></div><br><br><br>
</div>
    <script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
    <script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php
include('webpages/connect.php');
session_start();
if(isset($_POST["register"]))
{
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $phone_number = $_POST["phone_number"];
    $security_question = $_POST["security_question"];
    $security_question_answer = $_POST["security_question_answer"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    $sql = "SELECT mail from users where mail='$mail'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    {
        echo '<script>document.getElementById("result").innerText = "Given Mail ID is already registered";
        </script>';
    }
    else{
    if($password == $c_password)
    {
        $sql = "INSERT INTO users(name, mail, phone_number, security_question, security_question_answer, password) 
        VALUES('$name', '$mail', '$phone_number', '$security_question', '$security_question_answer', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header("location:index.php");
        }
        else{
            die(mysqli_connect_error());
        }
    }
    else{
        echo "<script>alert('Password and confirm password should be same');</script>";
}
}
}
?>