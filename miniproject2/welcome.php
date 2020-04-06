<?php
session_start();
require_once 'config.php';
?>
<?php error_reporting(0);
if($_SESSION["loggedin"]) {
?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class=".container-fluid">
<h1 align="right">Welcome <span class="badge badge-primary"><?php echo $_SESSION["username"]; ?></span> to Solinspire</h1>
<p align="right"><a href="logout.php" tite="Logout"><button type="button" class="btn btn-danger">Logout</button></a></p>
<p align="right"><a href="reset-password.php" tite="Logout"><button type="button" class="btn btn-danger">Reset Password</button></a></p>
</div>

<?php

$query = "SELECT image FROM cards" ;

$data = mysqli_query($link,$query);

$totRec = mysqli_num_rows($data);
// echo $totRec;

while($totRec!=0)
{
    ?>
    
    <table method ="GET" class="table table-striped table-dark">
       <?php
       $result = mysqli_fetch_array($data);
       $result2 = mysqli_fetch_array($data);

       if($result!=''  && $result2!='')
        {echo "
        <tr>
            <td border= align='center'><a href='user_detail.php?imageid=$result[image]&name=$_SESSION[username]'><img width='50%' src= '".$result['image']."' class='rounded mx-auto d-block' alt='not found'></a></td>
            <td align='center'><a href='user_detail.php?imageid=$result2[image]&name=$_SESSION[username]'><img width='50%' src= '".$result2['image']."' class='rounded mx-auto d-block' alt='not found'></a></td>        
        </tr>
        ";
        }


        
    $totRec--;
}
/* else
{
    echo "No Records found";
} */
?>
</table>


</body>
</html>
<?php
}else echo "<h1>Please login first .</h1>";
?>

