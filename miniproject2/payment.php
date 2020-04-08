<?php
session_start();
require_once "config.php";
error_reporting(0);
if($_SESSION["loggedin"]==false) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Payment-gatewway</title>
    <style type="text/css">
          body{ font:20px sans-serif; }
          .wrapper{ width: 350px; padding: 20px; margin-left:35% }
      </style>
</head>
<body>    
    

<div class="wrapper">
          <h2>Payment-Detail</h2>
          </div>
          <div class = "wrapper"> 
            <form action="" method="POST"> 
            
            <div>
                  <input type="text" name="street" class="form-control">
                  <label>Street</label>
              </div>
              <div>
                  
                  <input type="text" name="city" class="form-control">
                  <label>City</label>
              </div>
              <div>
                  
                  <input type="text" name="state" class="form-control">
                  <label>State</label>
              </div>
              <div>
                  
                  <input type="number" name="pincode" class="form-control">
                  <label>Pincode</label>
              </div>
              <div>
                  
                  <input type="number" name="nocards" class="form-control" >
                  <label>Number of Cards to be ordered</label>
              </div>
              </br></br>
              <div class="form-group">
                  <input type="submit" name='submit' class="btn btn-success" value="Submit Order" onclick="return function finalconfirm()">
                  <input type="submit" name='cancel' class="btn btn-danger" value="Cancel Order">
                  
              </div>
              </form>

              <script>
              function finalconfirm()
              {
                  return confirm('Do you want to confirm your Order!');
              }
              </script>
              <?php

  include_once "config.php";
  
  if(isset($_POST['cancel']))
  {
    $name = $_GET['name'];
    $email = $_GET['email'];

    $query2 = "DELETE from orders where name='$name' &&  email='$email'";
    $data2 = mysqli_query($link, $query2);

    if($data2)
    {
        header("Location:index.php");
    }
  }
  if(isset($_POST['submit']))
  {
          $nocards = $_POST['nocards'];
          $street = $_POST['street'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $pincode = $_POST['pincode'];
          $name = $_GET['name'];
          $email = $_GET['email'];
          $phone = $_GET['phone'];
          
          if($nocards!="" && $street!="" && $city!="" && $state!="" && $pincode!="" )
          {


              $query = "UPDATE orders SET street='$street',city='$city',state='$state',pincode='$pincode',nocards='$nocards' WHERE name='$name' && email='$email'";
              $data = mysqli_query($link,$query);

              if(!$data)
          {
            echo "<p style='color:red'>Payment Failed</p>";
          }
          else
          {
            
            header("Location:index.php");

            
          }
      
      }   
      else
      {
              echo "<p style='color:red'> All Fields are required</p>";
          }
}
?>
</div>
  
</body>
</html>  