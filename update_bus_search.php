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
    <title>Update Bus</title>
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
            <li><a href="#" style="color: black;">Update Bus</a></li>
            <li><a href="view_feedback.php">Feedbacks</a></li>
            <li><a href="webpages/admin_logout.php">Logout</a></li>
        </ul>
        </div>
        </nav></div>
<div class="container" align="center"><br>
        <h3 class="form-head">Update Buses</h3>
    <form method="post" autocomplete="off">
        <div class="form-block">
        <table>
        <tr>
        <td><label for="from_place" class="control-label">From place</label></td>
        <td>
        <select name="from_place" id="from_place" class="form-control" required>
            <option value=''>Select</option>
            <?php
            include('webpages/connect.php');
            $sql = "SELECT from_place FROM buses GROUP BY from_place ORDER BY from_place ASC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
            $from = $row["from_place"];
            echo "
            <option value='$from'>$from</option>
            ";
            }
            ?>
        </select></td>
        </tr></td>
        <tr>
        <td><label for="to_place" class="control-label">To place</label></td>
        <td><select name="to_place" id="to_place" class="form-control" required>
            <option value=''>Select</option>
            <?php
            include('webpages/connect.php');
            $sql = "SELECT to_place FROM buses GROUP BY to_place ORDER BY to_place ASC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
            $to= $row["to_place"];
            echo "
            <option value='$to'>$to</option>
            ";
            }
            ?>
        </select></td></td></tr>
        <tr>
        <td></td>
        <td colspan=2><input type="submit" class="btn btn-success" value="Search" name="search"></td></tr>
    </table></div>
    </form>
<p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>
    <?php
    echo "
    <table class='table table-responsive' align='center'>
    <tr>
    <th>Bus Name</th>
    <th>Bus Number</th>
    <th>From Place</th>
    <th>To Place</th>
    <th>Time</th>
    <th>Amount</th>
    <th>Update</th>
    </tr>";
    function display($bus_number,$bus_name, $from_place, $to_place, $time, $amount)
    { 
        echo"
        <tr>
        <td>$bus_name</td>
        <td>$bus_number</td>
        <td>$from_place</td>
        <td>$to_place</td>
        <td>$time</td>
        <td>$amount Rs</td>
        <td><a href='update.php?bus_name=$bus_name&bus_number=$bus_number&from_place=$from_place&to_place=$to_place&time=$time&amount=$amount' class='btn btn-success'>Update</a></td>
        </tr>";
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
include('webpages/connect.php');
if(isset($_POST["search"]))
{
    $from_place = $_POST["from_place"];
    $to_place = $_POST["to_place"];
    if($from_place == $to_place)
    {
    echo "
    <p align='center' class='letter-design' style='margin-top: 15px; font-size: 20px; color: brown;''>
    Don't give same place name</p>";
    echo "
    <script>alert('Don't give same place name');</script>
    ";
    }
    else{
    $sql = "SELECT * FROM buses WHERE from_place='$from_place' AND to_place='$to_place' ORDER BY time";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $num = $row["bus_number"];
                $bus_name = $row["bus_name"];
                $from_place = $row["from_place"];
                $to_place = $row["to_place"];
                $time = $row["time"];
                $amount = $row["amount"];
                display($num,$bus_name, $from_place , $to_place, $time, $amount);
            }
        }
        else{
            echo "<script>document.getElementById('result').innerText = 'Sorry There are no buses available'</script>";

        }
    }
    else{
        echo $conn->error;
  }
} 
 }  
?>