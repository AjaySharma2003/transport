<?php
session_start();
if(!isset($_SESSION['mail']))
{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Feedback</title>
    <style>
    body{
    background-color: #6cc6cb;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 100vh;
    }
    .container{
        margin-top: 50px;
    }
    form td{
        padding: 30px;
    }
.navigation-letter{
    color: white;
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
            <li><a href="../search.php" >Explore Buses</a></li>
            <li><a href="../pnr_check.php" class="navigation-letter">PNR Check</a></li>
            <li><a href="../mybookings.php">Bookings</a></li>
            <li><a href="#" style="color:black;">Feedback</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
        </div>
        </nav></div>
<div class="container" align="center"><br>
        <h3 class="form-head">Feedback</h3>
    <form method="post" autocomplete="off">
        <div class="form-block">
        <table>
        <tr>
        <td><label for="name" class="control-label">Name</label></td>
        <td><input type="text" class="form-control" name="name"  required></tr></td>
        <tr>
        <td><label for="subject" class="control-label">Subject</label></td>
        <td><input type="text" class="form-control" name="subject" required></td></tr>
        <tr>
        <td><label for="message" class="control-label">Message</label></td>
        <td><textarea name="message" class="form-control" required></textarea></td></tr>
        <tr align="center">
        <td colspan=2><input type="submit" class="btn btn-success" value="Submit" name="submit"></td></tr>
    </table></div>
    </form>
</div>


<script src="../Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="../Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="../https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="../https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php
include('connect.php');
if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $mail = $_SESSION["mail"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    if(strlen(trim($name))==0 || strlen(trim($mail))==0 || strlen(trim($subject))==0 || strlen(trim($message))==0)
    {
        echo "<script>alert('Fields Should Not be empty')</script>";
    }
    else{
    $sql = "INSERT INTO feedback(name, mail, subject, message) VALUES('$name','$mail','$subject','$message')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "<script>alert('Thank You for your Feedback');";
    }
    else{
        echo $conn->error;
    } 
    }
}  
?>