<?php
	session_start();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/form.css">
</head>
<body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">FoodShala</a>
        </div>
        <ul class="nav navbar-nav">
          <li class=""><a href="index.php">Home</a></li>
          <?php
            require "include/header.inc.php";
          ?>
          
      </div>
    </nav>

  <div class="container">

    <div style="margin: 0 auto;text-align: center;">
      <h2>FoodShala</h2>
      <p>No. 1 Food Delivery App</p>
    </div><br><br>

    <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">User Login Form</h4><br><br>

    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="include/userlogin.inc.php<?php 
      if (isset($_GET['id'])) {
        echo '?id='.$_GET['id'];      
      }
       ?>">



      <div class="form-group">
          <br><p style="color: red;text-align: center;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p><br>
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="loginemail" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="loginpwd" required>
        </div>
      </div>
      

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="SubmitULogin" value="loginnow" class="btn btn-primary">Login</button><br>
          <p>Not Registered <a href="signup.php<?php 
              if (isset($_GET['id'])) {
                echo '?id='.$_GET['id'];      
              }
               ?>"><strong>Click Here</strong></a>
            </p>
        </div>
      </div>
    </form>
  </div>

</body>
</html>
