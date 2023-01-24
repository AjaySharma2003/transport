<?php
session_start();
include('webpages/connect.php');
if(!isset($_SESSION['mail']))
{
    header("location:index.php");
}
if(!isset($_SESSION["bus_number"]))
{
    header('location:search.php');
}
if(isset($_POST["book_ticket"]))
{
    $passenger_name = $_POST["passenger_name"];
    $age = $_POST["age"];
    $phone_number = $_POST["phone_number"];
    $date = $_POST["date"];
}
date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');
$today_str = strtotime($today);
$valid_date = date('Y-m-d',strtotime("+1 month", $today_str));
$time_now = date('H:i:s');
$pnr = $_SESSION["pnr"];
if(isset($_POST["book_ticket"]))
{
    $passenger_name = $_POST["passenger_name"];
    $age = $_POST["age"];
    $phone_number = $_POST["phone_number"];
    $date = $_POST["date"];
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
    <title>Ticket Booking</title>
    <style>
    body{
    background-image: linear-gradient(#eae5c9,#6cc6cb);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 100%;
    }
    .container{
        margin-top: 50px;
    }
    td{
        padding: 20px;
    }
    .bus-info td{
        padding: 5px;
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
    <div class="container" align="center"><br>
    <h3 class="form-head">Ticket Booking</h3>
    <form method="POST">
        <input style="margin-left:-1000px;margin-top:-50px;" type="submit" name="go_back" value="Go Back" class="btn btn-success">
    </form>
        <div class="bus_info" style="font-size: 18px;">   
        <p style="font-size: 20px;"><?php echo $_SESSION["from_place"];?>  To  <?php echo $_SESSION["to_place"];?></p>
        <table>
            <tr>
                <td><i class="fa-duotone fa-left"></i>Bus Name : <?php echo $_SESSION["bus_name"];?></td>
                <td>Time : <?php echo $_SESSION["time"];?></td>
            </tr>
            <tr>
                <td>Bus Number : <?php echo $_SESSION["bus_number"];?></td>
                <td>Ticket Price : <?php echo $_SESSION["amount"];?></td>
            </tr>
        </table>
        <dialog id="add_passenger_dialog"style="margin-left:400px;margin-top:-150px;width:40%;background-color:#F4FFEF;border:1px dotted black;"align="center">
        <center>
        <form method="POST" autocomplete="off" >
        <table>
            <tr>
                <td><label for="passenger_name" class="control-label"><i class="fa-solid fa-square-left"></i>Name</label></td>
                <td><input type="text" class="form-control" value="<?php echo $passenger_name;?>" name="passenger_name" required></td>
            </tr>
            <tr>
                <td><label for="gender" class="control-label">Gender</label></td>
                <td>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="age" class="control-label">Age</label></td>
                <td><input type="tell" class="form-control" value="<?php echo $age;?>" name="age" pattern="[0-9]{2}" title="Please enter age in two digit eg : 05" maxlength="2"required></td>
            </tr>
            <tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="add_passenger_form_value" class="btn btn-success" value="Add Passenger"></td>
</tr>
        </table>
    </form></center>
                <td ><input type="submit" id="close_add_passenger" class="btn btn-success" value="Close"></td>
</dialog>
        </div> <br>
    <?php
    echo "
    <table class='table table-responsive' align='center' style='width:30%'>
    <tr>
    <th>Passenger Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Update</th>
    </tr>";
    function display($passenger_name, $gender, $age, $pnr)
    { 
        echo"
        <tr>
        <td>$passenger_name</td>
        <td>$gender</td>
        <td>$age</td>
        <td><a href='passenger_update.php?passenger_name=$passenger_name&gender=$gender&age=$age&pnr=$pnr' class='btn btn-success'>Update</a></td>
        </tr>";
    }
    if(isset($_POST["add_passenger_form_value"]))
    {
    $passenger_name = $_POST["passenger_name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $sql = "SELECT * FROM passengers WHERE passenger_name = '$passenger_name' and gender='$gender' and age=$age and pnr=$pnr";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    {
    echo "<script>alert('The Given Passenger details is already available');</script>";
    }
    else{
    $sql = "INSERT INTO passengers(passenger_name, gender, age, pnr) VALUES('$passenger_name','$gender',$age, $pnr)";
    $result = mysqli_query($conn, $sql);
    }
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
    ?>
    </table>
<input type="submit" name="add_passender" id = "add_passenger_form" class="btn btn-success"value="Add Passenger">
<br>
<?php
if(isset($_POST["book_ticket"]) or isset($_POST["add_passenger"]))
{
    $phone_number = $_POST["phone_number"];
    $date = $_POST["date"];
}
?>
<form method="POST" autocomplete="off">
<table>
<tr>
    <td><label for="phone_number" class="control-label">Phone Number</label></td>
    <td><input type="tell" name="phone_number" value="<?php echo $phone_number;?>" class="form-control" pattern="[6-9]{1}[0-9]{9}" title="Enter valid Mobile Number" required minlength="10" maxlength="10"></td>
    </tr>
    <tr>
        <td><label for="date" class="control-label">Date</label></td>
        <td><input type="date" min="<?php echo $today;?>" max="<?php echo $valid_date;?>" value="<?php echo $date;?>" class="form-control" name="date" required></td>
    </tr>
    <tr align="center">
        <td colspan="2"><input type="submit" name="book_ticket" class="btn btn-success" value="Book Ticket"></td>
</tr>
</table>
</form>        
</div>



<?php
if(isset($_POST["go_back"]))
{
    $pnr = $_SESSION["pnr"];
    $sql = "DELETE FROM passengers WHERE pnr=$pnr";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        header('location:search.php');
    }
}
if(isset($_POST["book_ticket"]))
{
$pnr = $_SESSION["pnr"];
$sql = "SELECT * FROM passengers WHERE pnr=$pnr";
$result = mysqli_query($conn, $sql);
$no_pass = mysqli_num_rows($result);
if($no_pass>0)
{
if($today == $date and $time<$time_now)
{
    echo "<script>alert('Sorry Bus already departured');</script>";
}
else{
$sql = "SELECT * from tickets WHERE bus_number=$bus_number AND from_place='$from_place' AND to_place='$to_place' AND time='$time' AND date='$date'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)<30)
{
$_SESSION["phone_number"] = $_POST["phone_number"];
$_SESSION["date"] = $_POST["date"];
$sql = "SELECT * FROM passengers WHERE pnr=$pnr";
$result = mysqli_query($conn, $sql);
$_SESSION["no_of_passengers"] = mysqli_num_rows($result);
$amount = $_SESSION["amount"];
$no_of_passengers = $_SESSION["no_of_passengers"];
$_SESSION["amount_paid"] = $amount*$no_of_passengers;
header('location:payment.php');
}
else{
    echo "<script>alert('The seat is full for this bus for the selected date');</script>";
}
}}
else
{
    echo "<script>alert('You need to add atleast one passenger');</script>";
}
}
?>




<script src="script.js"></script>
<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>