<?php
session_start();
if(!isset($_SESSION['admin_mail']))
{
    header("location:admin_login.php");
}
?>
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
    <title>Feedbacks</title>
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
.navigation-letter{
    color: white;
}
td{
    padding:20px;
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
            <li><a href="add_bus.php">Add Bus</a></li>
            <li><a href="update_bus_search.php" >Update</a></li>
            <li><a href="#" style="color: black;">Feedbacks</a></li>
            <li><a href="webpages/admin_logout.php">Logout</a></li>
        </ul>
        </div>
        </nav></div>
<div class="container" align="center"><br>
    <h3 class="form-head">Feedbacks</h3><br>
    <p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>
<?php
    function display($name,$mail, $subject,$message)
    { 
        echo "
        <p align='left' class='letter-design'style='padding-left:40px;padding-right:40px;word-wrap: break-word;'>Name : $name<br>Mail : $mail<br>Subject : $subject<br>
        Message<br>     $message<hr></p>
        ";
    }
    include('webpages/connect.php');
    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $name = $row["name"];
            $mail = $row["mail"];
            $subject = $row["subject"];
            $message = $row["message"];
            display($name , $mail, $subject, $message);
        }
    }
    else{
        echo "<script>document.getElementById('result').innerText = 'There are no Feedbacks available'</script>";

    }
        }
        else{
            echo $conn->error;
    } 
    ?>
</div>


<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php

?>