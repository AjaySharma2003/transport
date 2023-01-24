<?php
session_start();
$_SESSION["bus_name"] = $_GET["bus_name"];
$_SESSION["bus_number"] = $_GET["bus_number"];
$_SESSION["from_place"] = $_GET["from_place"];
$_SESSION["to_place"] = $_GET["to_place"];
$_SESSION["time"] = $_GET["time"];
$_SESSION["amount"] = $_GET["amount"];
function generate_pnr()
{
    include('webpages/connect.php');
    $pnr_number = rand(10000,99999);
    $sql = "SELECT pnr from tickets WHERE pnr=$pnr_number";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            generate_pnr();
        }
        else{
            return $pnr_number;
        }
    }
}
$_SESSION["pnr"] = generate_pnr();
header('location:ticket_booking.php');
?>