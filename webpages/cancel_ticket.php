<?php
session_start();
include('connect.php');
if(!isset($_SESSION['mail']))
{
    header("location:index.php");
}
elseif(!isset($_GET["pnr"]))
{
    header('location:../mybookings.php');
}
else
{
    $pnr = $_GET["pnr"];
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
    <title>Ticket</title>
    <style>
    body{
    background-color: #6cc6cb;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 100%;
    }
    .container{
        margin-top: 50px;
        padding-top:100px;
        padding-bottom:100px;
    }
    td{
        display: table-cell;
        padding: 15px;
    }
    .bus-info-tab td{
    padding:35px;
    padding-bottom:0px;
}
.ticket_details{
    display: none;
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
        <li><a href="" style="color: black;"><?php echo $_SESSION["mail"]; ?> <i class="fa-regular fa-user"></i></a></li>
        </ul>
        </div>
        </nav></div>
    <div class="container" align="center" style="font-size: 18px;"><br>
    <h3 class="form-head">Ticket Cancellation</h3><br>
    <form method="post" autocomplete="off">
        <div class="form-block">
        <table>
        <tr align="center">
        <td colspan="2"><label class="control-label">Are you sure you want to cancel the ticket?</label></td>
        </tr>
        <tr align="center">
        <td><input type="submit" class="btn btn-success" value="No" name="no"></td>
        <td><input type="submit" class="btn btn-danger" value="Yes" name="yes"></td>
        </tr>
    </table></div>
    <?php
    if(isset($_POST["no"]))
    {
        header('location:../mybookings.php');
    }
    if(isset($_POST["yes"]))
    {
        $sql = "DELETE FROM tickets WHERE pnr=$pnr";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $sql = "DELETE FROM passengers WHERE pnr=$pnr";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                echo "<script>alert('Your ticket was cancelled. Money will be refunded shortly');
                window.location= '../mybookings.php';
                </script>";
            }
        }
    }
    ?>

<script src="../script.js"></script>
<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>

