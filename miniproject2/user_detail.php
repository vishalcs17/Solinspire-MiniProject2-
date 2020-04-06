  <?php
  session_start();
  $username_err = $contact_err = $cname_err = $address_err = "";

  ?>


  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>User-Password</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <style type="text/css">
          body{ font: 14px sans-serif; }
          .wrapper{ width: 350px; padding: 20px; margin-left:35% }
      </style>
  </head>
  <body>
      <div class="wrapper">
          <h2>User-Detail</h2>
          <p>Please fill out this form to know your details.</p></div>
          <div class = "wrapper"> 
            <form action="" method="POST"> 
                  <div>
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $_GET['name']; ?>">
                  <span class="help-block"><?php echo $username_err; ?></span>
              </div>
              <div>
                  <label>Contact</label>
                  <input type="number" name="contact" class="form-control">
                  <span class="help-block"><?php echo $contact_err; ?></span>
              </div>
              <div>
                  <label>Email</label>
                  <input type="email" name="email" class="form-control">
                  <span class="help-block"><?php echo $cname_err; ?></span>
              </div>
              <div>
                  <label>Company Name</label>
                  <input type="text" name="cname" class="form-control">
                  <span class="help-block"><?php echo $cname_err; ?></span>
              </div>
              <div>
                  <label>Company Slogan</label>
                  <input type="text" name="slogan" class="form-control" >
                  <span class="help-block"><?php echo $cname_err; ?></span>
              </div>
              <div>
                  <label>Address</label>
                  <textarea name="address" class="form-control"></textarea>
                  <span class="help-block"><?php echo $address_err; ?></span>
              </div></br>
              <div class="form-group">
                  <input type="submit" name='submit' class="btn btn-success" value="Submit">
                  <a class="btn btn-link" href="welcome.php">Cancel</a>
              </div>
              </form>
              <?php

  include_once "config.php";

  if(isset($_POST['submit']))
  {
          $contact = $_POST['contact'];
          $name = $_POST['name'];
          $email = $_POST['email'];
          $cname = $_POST['cname'];
          $slogan = $_POST['slogan'];
          $address = $_POST['address'];
          
          if($contact!="" && $name!="" && $email!="" && $cname!="" && $slogan!="" && $address!="")
          {


              $query = "INSERT INTO orders (cname, slogan, name, email, phone, address, cardid) VALUES ('$cname','$slogan','$name','$email','$contact','$address','$_GET[imageid]')";
              $data = mysqli_query($link,$query);

              if(!$data)
          {
              echo "Data not Inserted";
          }
          else
          {
            session_start();
            $_SESSION = array();
            session_destroy();
            header("location: payment.php");
            exit;
          }
      
      }   
      else{
              echo "<p style='color:red'> All Fields are required</p>";
          }

      }
  ?>
    </div>    
  </body>
  </html>

