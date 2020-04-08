<?php
session_start();
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>AdminPage</title>
    
</head>
<body>
<div class="col-sm-15 form-group">
<br>
<div class="card mb-2">
<div class="card-body text-white bg-primary p-1">
<h4 class="text-center">Order Request</h4>
</div>
</div>
    
<?php


$query = "SELECT * FROM orders";

$data = mysqli_query($link,$query);



$totRec = mysqli_num_rows($data);
// echo $totRec;

if($totRec!=0)
{
    ?>
    
<table class="table table-striped">
  <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>CardImage</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Company</th>
            <th>Slogan</th>
            <th>Address</th> 
            <th>||</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Pincode</th>
            <th>Number Of Card</th>
            <th class="text-center">Action</th>
        </tr>
</thead>
       
    

    <?php
    $c=0;

     while($result = mysqli_fetch_assoc($data))
     {
        $c+=1;
        echo "
        <tr>
            <td>".$c."</td>
            <td><img src='$result[cardid]' width='50'></td>
            <td>".$result['name']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone']."</td>
            <td>".$result['cname']."</td>
            <td>".$result['slogan']."</td>
            <td>".$result['address']."</td>
            <td>||</td>
            <td>".$result['street']."</td>
            <td>".$result['city']."</td>
            <td>".$result['state']."</td>
            <td>".$result['pincode']."</td>
            <td>".$result['nocards']."</td>
            <td><a class='badge badge-success' <a  href='complete.php?phone=$result[phone]&cardid=$result[cardid]&name=$result[name]&email=$result[email]&cname=$result[cname]&slogan=$result[slogan]&address=$result[address]&street=$result[street]&city=$result[city]&state=$result[state]&pincode=$result[pincode]&nocards=$result[nocards]' onclick = 'return DeleteRecord()'>TakeOrder</a></td>
            
        </tr>
        ";
         
     }
}
else
{
    echo "No Records found";
}
?>
</table>
</div>
    </div>
</div>


<!-- PLACED ORDER -->

<div class="col-sm-15form-group">
<br>
<div class="card mb-2">
<div class="card-body text-white bg-primary p-1">
<h4 class="text-center">Placed Orders</h4>
</div>
</div>
    
<?php


$query2 = "SELECT * FROM complete_order";

$data2 = mysqli_query($link,$query2);



$totRec = mysqli_num_rows($data2);
// echo $totRec;

if($totRec!=0)
{
    ?>
    
<table class="table table-striped">
  <thead class="thead-dark">
        <tr>
        <th>#</th>
            <th>CardImage</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Company</th>
            <th>Slogan</th>
            <th>Address</th> 
            <th>||</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Pincode</th>
            <th>Number Of Card</th>
            <th class="text-center">Action</th>
        </tr>
</thead>
       
    

    <?php
    $c2=0;

     while($result2 = mysqli_fetch_assoc($data2))
     {
        $c2+=1;
        echo "
        <tr>
            <td>".$c2."</td>
            <td><img src='$result2[cardid]' width='50'></td>
            <td>".$result2['name']."</td>
            <td>".$result2['email']."</td>
            <td>".$result2['phone']."</td>
            <td>".$result2['cname']."</td>
            <td>".$result2['slogan']."</td>
            <td>".$result2['address']."</td>
            <td>||</td>
            <td>".$result2['street']."</td>
            <td>".$result2['city']."</td>
            <td>".$result2['state']."</td>
            <td>".$result2['pincode']."</td>
            <td>".$result2['nocards']."</td>
            <td><a class='badge badge-danger' href='complete.php?phone=$result2[phone]&cardid=$result2[cardid]' onclick = 'return finish()'>Dispatch</a></td>
            
        </tr>
        ";
         
     }
}
else
{
    echo "No Records found";
}
?>
</table>
</div>
    </div>
</div>

    
<script>
    function DeleteRecord()
    {
        

        return confirm("Do u want to confirm the order ?");
    }


    function finish()
    {
        return confirm("order placed");
    }
</script>
</body>
</html>