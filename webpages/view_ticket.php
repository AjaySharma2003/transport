<?php
session_start();
include('connect.php');
if(!isset($_SESSION['mail']))
{
    header("location:./index.php");
}
else{
    if(isset($_SESSION["pnr"]))
    {
        $pnr = $_SESSION["pnr"];
        unset($_SESSION["pnr"]);
    }
    elseif(isset($_GET["pnr"]))
    {
        $pnr = $_GET["pnr"];
    }
    else{
        header('location:../pnr_check.php');
    }
    $sql = "SELECT * FROM tickets WHERE pnr=$pnr";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
    while($row = mysqli_fetch_assoc($result))
    {
        $bus_name = $row["bus_name"];
        $bus_number = $row["bus_number"];
        $from_place = $row["from_place"];
        $to_place = $row["to_place"];
        $time = $row["time"];
        $amount_paid = $row["amount_paid"];
        $status = $row["status"];
        $no_of_passengers = $row["no_of_passengers"];
        $mail = $row["mail"];
        $phone_number = $row["phone_number"];
        $date = $row["date"];
        $pnr = $row["pnr"];
        $ticket_price = $amount_paid/$no_of_passengers;
    }
   }
}
$mail = $_SESSION["mail"];
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
    }
    td{
        display: table-cell;
        padding: 15px;
    }
    .bus-info-tab td{
    padding:35px;
    padding-bottom:0px;
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
        </nav>
        <div align="right" style="margin-right: 60px;font-size:19px;">
        <a href="../logout.php" >Logout</a>
        </div>
    </div>
    <div class="container" align="center" style="font-size: 18px;"><br>
        <h3 class="form-head">Ticket</h3><br>
        <div class="bus_info" style="font-size: 18px;">   
        <p style="font-size: 20px;"><?php echo $from_place;?>  To  <?php echo $to_place;?></p>
        <div class="bus-info-tab">
        <table>
            <tr>
                <td>Bus Name : <?php echo $bus_name;?></td>
                <td>Time : <?php echo $time;?></td>
            </tr>
            <tr>
                <td>Bus Number : <?php echo $bus_number;?></td>
                <td>Ticket Price : <?php echo $ticket_price;?></td>
            </tr>
        </table>
        </div><br>
        <table>
            <tr>
                <td>Status</td>
                <td><?php echo $status;?></td>
            </tr>
            <tr>
                <td>PNR Number</td>
                <td><?php echo $pnr;?></td>
            </tr>
            <tr>
                <td>No of Passengers</td>
                <td><?php echo $no_of_passengers;?></td>
            </tr>
        </table>
        <?php
    $pnr = $pnr;
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
                <td>Mail</td>
                <td><?php echo $_SESSION["mail"];?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo $phone_number;?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo $date;?></td>
            </tr>
            <tr>
                <td>Paid Amount</td>
                <td><?php echo $amount_paid;?></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="../mybookings.php" class="btn btn-success">Go Back</a></td>
            </tr>
        </table><br>
        <?php
        session_start();
        // session_destroy();
        session_start();
        $_SESSION["mail"] = $mail;
        ?>
        </div>
</div>


<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>

