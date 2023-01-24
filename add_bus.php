<?php
session_start();
if(!isset($_SESSION['admin_mail']))
{
    header("location:index.php");
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
    <title>Add Bus</title>
    <style>
    body{
    background-image: linear-gradient(#eae5c9,#6cc6cb);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 800px;
    }
    .container{
        margin-top: 50px;
    }
    td{
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
            <li><a href="add_bus.php" style="color: black;">Add Bus</a></li>
            <li><a href="update_bus_search.php" >Update</a></li>
            <li><a href="view_feedback.php">Feedbacks</a></li>
            <li><a href="webpages/admin_logout.php">Logout</a></li>
        </ul>
        </div>
        </nav></div>
    <div class="container" align="center"><br>
        <h3 class="form-head">Add Bus Details</h3>
<p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>
        <form method="POST" autocomplete="off">
        <table>
            <tr>
                <td><label for="bus_name" class="control-label">Bus Name</label></td>
                <td><input type="text" class="form-control" name="bus_name" required></td>
            </tr>
            <tr>
                <td><label for="bus_number" class="control-label">Bus Number</label></td>
                <td><input type="tell" class="form-control" name="bus_number" pattern="[0-9]{5}" required title="Enter 5 digit number"></td>
            </tr>
            <tr>
                <td><label for="from_place" class="control-label">From Place</label></td>
                <td><input type="text" class="form-control" name="from_place" required></td>
            </tr>
            <tr>
                <td><label for="to_place" class="control-label">To Place</label></td>
                <td><input type="text" class="form-control" name="to_place" required></td>
            </tr>
            <tr>
                <td><label for="time" class="control-label">Time</label></td>
                <td><input type="time" class="form-control" name="time" required></td>
            </tr>
            <tr>
                <td><label for="amount" class="control-label">Amount</label></td>
                <td><input type="number" class="form-control" name="amount" required></td>
            </tr>
            <tr colspan="2">
                <td></td>
                <td colspan="2"><input type="submit" name="add_bus" class="btn btn-success" value="Add Bus"></td>
            </tr>
        </table>
    </form>
</div>


<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php
include('webpages/connect.php');
if(isset($_POST["add_bus"]))
{
$bus_name = $_POST["bus_name"];
$bus_number = $_POST["bus_number"];
$from_place = $_POST["from_place"];
$to_place = $_POST["to_place"];
$time = $_POST["time"];
$amount = $_POST["amount"];
$sql = "SELECT * from buses Where bus_number=$bus_number and from_place='$from_place' AND to_place='$to_place' AND time='$time'";
$result = mysqli_query($conn, $sql);
if($result)
{
    if(mysqli_num_rows($result)>0)
    {
    echo "<script>document.getElementById('result').innerText = 'Given Bus details is already available'</script>";
    }
    else{
        $sql = "INSERT INTO buses(bus_name, bus_number, from_place, to_place, time, amount) VALUES('$bus_name',$bus_number,'$from_place', '$to_place','$time',$amount)";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            
            echo "<script>document.getElementById('result').innerText = 'Successfully Added'</script>";
        }
        }
    }
}
?>