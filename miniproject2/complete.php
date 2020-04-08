<?php
session_start();
require_once 'config.php';
error_reporting(0);
if($_SESSION["loggedin"]==false) {
    header("Location:index.php");
}

$phone      =   $_GET['phone'];
$cardid     =   $_GET['cardid'];
$name       =   $_GET['name'];
$email      =   $_GET['email'];
$cname      =   $_GET['cname'];
$slogan     =   $_GET['slogan'];
$address    =   $_GET['address'];
$nocards    =   $_GET['nocards'];
$street     =   $_GET['street'];
$city       =   $_GET['city'];
$state      =   $_GET['state'];
$pincode    =   $_GET['pincode'];

$query2 = "INSERT INTO complete_order (cname, slogan, name, email, phone, address, cardid, street, city, state, pincode, nocards) VALUES ('$cname','$slogan','$name','$email','$contact','$address','$cardid','$street','$city','$state','$pincode','$nocards')";
$data2 = mysqli_query($link,$query2);


$query = "DELETE from orders where phone='$phone' &&  cardid='$cardid'";
$data = mysqli_query($link, $query);

$query3 = "DELETE from complete_order where phone='$phone' &&  cardid='$cardid'";
$data3 = mysqli_query($link, $query3);

if($data and $data2)
{
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/miniproject2/admin.php">
    <?php
}
else
{
    echo " Delete Process Fail";
}



?>