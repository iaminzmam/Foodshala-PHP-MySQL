<?php
  
  session_start();

  require "../include/checklogin.inc.php";

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurant Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/form.css">
</head>
<body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../index.php">FoodShala</a>
        </div>
        <ul class="nav navbar-nav">
          <li class=""><a href="../index.php">Home</a></li>
          <?php
            require "../include/header.inc.php";
          ?>
          
      </div>
    </nav>

    

  <div class="container">
    <div style="margin: 0 auto;text-align: center;">
      <h2>FoodShala</h2>
      <p>No. 1 Food Delivery App</p>
    </div><br><br>

    <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">Restaurant Registration Form</h4><br><br>
    

    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="../include/restsignup.inc.php">
      <div class="form-group">
        <br><p style="color: red;text-align: center;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p><br>
        <label class="control-label col-sm-2" for="shoptitle">Shop Title:</label>
        <div class="col-sm-10">

          <input type="text" class="form-control" id="shoptitle" placeholder="Enter Shop Name" name="shoptitle">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="ownername">Owner Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="ownername" placeholder="Enter Full Name" name="ownername">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="shopemail">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="shopemail" placeholder="Enter Email" name="shopemail">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="spwd">Password:</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control" id="spwd" placeholder="Enter password" name="spwd">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="cspwd">Confirm Password:</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control" id="cspwd" placeholder="Confirm your password" name="cspwd">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="address">Address:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="address" placeholder="Enter Address" name="shopaddress">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="scity">City:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="scity" placeholder="Enter City Name" name="shopcity">
        </div>
      </div>

      

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="SubmitRSignup" value="submitrest" class="btn btn-primary">Submit</button><br>
          <p>Already Registered <a href="login.php"><strong>Click Here</strong></a>
            </p>
        </div>
      </div>
    </form>

  </div>

</body>
</html>
