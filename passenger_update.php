<?php 
include('webpages/connect.php');
session_start();
if(!isset($_SESSION['mail']))
{
    header("location:index.php");
}
elseif(!isset($_GET["passenger_name"]))
{
    header('location:ticket_booking.php');
}
else
{
    $passenger_name_prev = $_GET["passenger_name"];
    $gender_prev = $_GET["gender"];
    $age_prev = $_GET["age"];
    $pnr = $_SESSION["pnr"];
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
    <title>Update Passenger</title>
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
        <h3 class="form-head">Passenger Details Update</h3>
<form method='POST' autocomplete="off">
<table>
    <tr>
    <td><label for='passenger_name' class='control-label'>Passenger Name</label></td>
    <td><input type='text' class='form-control' name='passenger_name' required value='<?php echo $passenger_name_prev;?>'></td>
    </tr>
    <tr>
    <td><label for='gender' class='control-label'>Gender</label></td>
    <td><select name="gender" id="gender" class="form-control" required>
    <option value="">Select</option>
    <option value="male" <?php if($gender_prev == 'male'){echo("selected");}?> name="male">Male</option>
    <option value="female" <?php if($gender_prev == 'female'){echo("selected");}?> name="female">Female</option>
    </select>        
</td>
    </tr>
    <tr>
    <td><label for='age' class='control-label'>Age</label></td>
    <td><input type='text' class='form-control' name='age' required value='<?php echo $age_prev;?>'></td>
    </tr>
    <tr>
    <td align="right"><input type='submit' name='delete_passenger' class='btn btn-success' value='Delete Passenger'></td>
    <td align="right"><input type='submit' name='update_passenger' class='btn btn-success' value='Update Passenger'></td>
    </tr>
    </table>
</form>
<a href="ticket_booking.php" class="btn btn-success">Go Back</a>
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
 window.location= 'ticket_booking.php';
 </script>";
}
if(isset($_POST["delete_passenger"]))
{
    $sql = "DELETE from passengers WHERE passenger_name = '$passenger_name_prev' AND gender = '$gender_prev' AND age='$age_prev' AND pnr='$pnr'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        show_result("Deleted");
    }
    else{
        echo mysqli_error($conn);
    }
}
if(isset($_POST["update_passenger"]))
{
    $passenger_name = $_POST["passenger_name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $sql = "SELECT * from passengers Where passenger_name='$passenger_name' and gender='$gender' and age=$age AND  pnr=$pnr";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
        echo "<script>alert('Given Passenger Details is already available')</script>";
        }
        else{
            $sql = "Update passengers SET passenger_name='$passenger_name',gender ='$gender ',age='$age',pnr=$pnr
            WHERE passenger_name = '$passenger_name_prev' AND gender = '$gender_prev' AND age='$age_prev' AND pnr=$pnr";
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
}
?>
