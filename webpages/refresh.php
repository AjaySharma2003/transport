<?php
include('connect.php');
date_default_timezone_set('Asia/Kolkata');
$tod = date('Y-m-d');
$sql = "UPDATE tickets SET status='Completed' Where date<'$tod'";
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM passengers";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result))
{
    $pnr = $row['pnr'];
    $passenger_sql = "SELECT * FROM tickets WHERE pnr=$pnr";
    $passenger_result = mysqli_query($conn, $passenger_sql);
    if(mysqli_num_rows($passenger_result)<1)
    {
        $del_sql = "DELETE FROM passengers WHERE pnr=$pnr";
        $del_result = mysqli_query($conn, $del_sql);
    }
}
?>