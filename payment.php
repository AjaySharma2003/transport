<?php
session_start();
include('webpages/connect.php');
if(!isset($_SESSION['mail']))
{
    header("location:index.php");
}
elseif(!isset($_SESSION["bus_number"]))
{
    header('location:search.php');
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
    <title>Payment</title>
    <style>
    body{
    background-color:#6cc6cb;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 900px;
    }
    .container{
        margin-top: 50px;
    }
    td{
        display: table-cell;
        padding: 20px;
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
        <h3 class="form-head">Payment</h3><br>
        <a href="ticket_booking.php"style="margin-left:-1000px;" class="btn btn-success">Go Back</a><br>
        <div class="bus_info" style="font-size: 18px;">   
        <p style="font-size: 20px;"><?php echo $_SESSION["from_place"];?>  To  <?php echo $_SESSION["to_place"];?></p>
        <div class="bus-info-tab">      
        <table>
            <tr>
                <td>Bus Name : <?php echo $_SESSION["bus_name"];?></td>
                <td>Time : <?php echo $_SESSION["time"];?></td>
            </tr>
            <tr>
                <td>Bus Number : <?php echo $_SESSION["bus_number"];?></td>
                <td>Ticket Price : <?php echo $_SESSION["amount"];?></td>
            </tr>
        </table><br>
        <?php
    $pnr = $_SESSION["pnr"];
    echo "
    <table class='table table-responsive' align='center' style='width:30%'>
    <tr>
    <th>Passenger Name</th>
    <th>Gender</th>
    <th>Age</th>
    </tr>";
    function display($passenger_name, $gender, $age)
    { 
        echo"
        <tr>
        <td>$passenger_name</td>
        <td>$gender</td>
        <td>$age</td>
        </tr>";
    }
    $sql = "SELECT * FROM passengers WHERE pnr=$pnr";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
        display($row["passenger_name"], $row["gender"], $row["age"], $pnr);
     }
    }
    else{
        echo mysqli_error($conn);
    }
    ?></table>
        <table>
            <tr>
                <td>No of Passengers</td>
                <td><?php echo $_SESSION["no_of_passengers"];?></td>
            </tr>
            <tr>
                <td>Mail</td>
                <td><?php echo $_SESSION["mail"];?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo $_SESSION["phone_number"];?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo $_SESSION["date"];?></td>
            </tr>
            <tr>
                <td>Amount to Pay</td>
                <td><?php echo $_SESSION["amount_paid"];?></td>
            </tr>
            <form method="POST" autocomplete="off">
            <tr align="center">
                <td colspan="2"><input type="submit" name="pay" class="btn btn-success" value="Pay"></td>
            </tr>
        </table>
    </form>
<p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>
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
if(isset($_POST["pay"]))
{
$bus_name = $_SESSION["bus_name"];
$bus_number = $_SESSION["bus_number"];
$from_place = $_SESSION["from_place"];
$to_place = $_SESSION["to_place"];
$time = $_SESSION["time"];
$amount_paid = $_SESSION["amount_paid"];
$status = 'Confirmed';
$no_of_passengers = $_SESSION["no_of_passengers"];
$mail = $_SESSION["mail"];
$phone_number = $_SESSION["phone_number"];
$date = $_SESSION["date"];
$pnr = $_SESSION["pnr"];
$sql = "INSERT INTO tickets(bus_name, bus_number, from_place, to_place, time, amount_paid,status,no_of_passengers, mail,phone_number, date, pnr) 
    VALUES('$bus_name', $bus_number, '$from_place','$to_place','$time',$amount_paid,'$status', $no_of_passengers,'$mail',$phone_number,'$date', $pnr)";
$result = mysqli_query($conn, $sql);
if($result)
{
    $_SESSION["pnr"] = $pnr;
    header('location:webpages/view_ticket.php');
}
else
{
    echo mysqli_error($conn);
}
// header('location:ticket.php');
}
?>