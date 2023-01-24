<?php 
include('webpages/connect.php');
session_start();
if(!isset($_SESSION['admin_mail']))
{
    header("location:admin_login.php");
}
elseif(!isset($_GET["bus_number"]))
{
    header('location:update_bus_search.php');
}
else
{
    $bus_name_prev = $_GET["bus_name"];
    $bus_number_prev = $_GET["bus_number"];
    $from_place_prev = $_GET["from_place"];
    $to_place_prev = $_GET["to_place"];
    $time_prev = $_GET["time"];
    $amount_prev = $_GET["amount"];
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
    background-image: linear-gradient(#eae5c9,#6cc6cb);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    height: 100vh;
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
    <div class="container" align="center"><br>
        <h3 class="form-head">Update Bus Details</h3>
<form method='POST' autocomplete="off">
<table>
    <tr>
    <td><label for='bus_name' class='control-label'>Bus Name</label></td>
    <td><input type='text' class='form-control' name='bus_name' required value='<?php echo $bus_name_prev;?>'></td>
    </tr>
    <tr>
    <td><label for='bus_number' class='control-label'>Bus Number</label></td>
    <td><input type='number' class='form-control' name='bus_number' maxlength="5" required value='<?php echo $bus_number_prev?>'></td>
    </tr>
    <tr>
    <td><label for='from_place' class='control-label'>From Place</label></td>
    <td><input type='text' class='form-control' name='from_place' required value='<?php echo $from_place_prev;?>'></td>
    </tr>
    <tr>
    <td><label for='to_place' class='control-label'>To Place</label></td>
    <td><input type='text' class='form-control' value='<?php echo $to_place_prev;?>' required name='to_place'></td>
    </tr>
    <tr>
    <td><label for='time' class='control-label'>Time</label></td>
    <td><input type='time' class='form-control' name='time' required value='<?php echo $time_prev;?>'></td>
    </tr>
    <tr>
    <td><label for='amount' class='control-label'>Amount</label></td>
    <td><input type='number' class='form-control' name='amount' required value='<?php echo $amount_prev;?>'></td>
    </tr>
    <tr>
    <td align="right"><input type='submit' name='delete_bus' class='btn btn-success' value='Delete Bus'></td>
    <td align="right"><input type='submit' name='update_bus' class='btn btn-success' value='Update Bus'></td>
    </tr>
    </table>
</form>
<a href="update_bus_search.php" class="btn btn-success">Go Back</a>
<p id="result" align="center" class="letter-design" style="margin-top: 15px; font-size: 20px; color: brown;"></p>
    </div>
<script src="Bootstrap/bootstrap-3.4.1-dist/js/jquery-3.6.1.min.js"></script>
<script scr="Bootstrap/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
<?php
function show_result($res)
{
 echo "<script>alert('$res Succesfully')
 window.location= 'update_bus_search.php';
 </script>";
}
if(isset($_POST["delete_bus"]))
{
    $sql = "DELETE from buses WHERE bus_number = $bus_number_prev AND from_place = '$from_place_prev' AND to_place='$to_place_prev' AND time='$time_prev'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        show_result("Deleted");
    }
    else{
        echo mysqli_error($conn);
    }
}
if(isset($_POST["update_bus"]))
{
    $bus_name = $_POST["bus_name"];
    $bus_number = $_POST["bus_number"];
    $from_place = $_POST["from_place"];
    $to_place = $_POST["to_place"];
    $time = $_POST["time"];
    $amount = $_POST["amount"];
    $sql = "SELECT * from buses Where bus_name = '$bus_name' AND bus_number=$bus_number AND from_place='$from_place' AND to_place='$to_place' AND time='$time' AND amount=$amount";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            echo "<script>alert('Given Bus details is already available')</script>";
        }
        else{
            $sql = "Update buses SET bus_name='$bus_name',bus_number=$bus_number,from_place ='$from_place ',to_place='$to_place',time='$time',amount=$amount
            WHERE bus_number = $bus_number_prev AND from_place = '$from_place_prev' AND to_place='$to_place_prev' AND time='$time_prev'";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                show_result("Updated");
            }
            else{
                echo mysqli_error($conn);
            }
        }
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>
