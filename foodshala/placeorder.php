<?php 
  session_start();
  if(isset($_SESSION['UserType'])){
    if($_SESSION['UserType'] == 'restaurant') {
      header('Location: index.php');
      exit();
     }
  } else {
      header('Location: login.php?id='.$_GET['id']);
      exit();
  }
      $id = $_GET['id'];
      require "include/dbh.inc.php";
      $sql = "SELECT * FROM fooditems INNER JOIN restaurant ON fooditems.Restid = restaurant.Restid AND fooditems.Foodid='$id'";
      $result = mysqli_query($conn, $sql);
      $resultcheck = mysqli_num_rows($result);
      if ($rows = mysqli_fetch_assoc($result)) {
          $foodid= $rows['Foodid'];
          $name = $rows['FoodName'];
          $price = $rows['FoodPrice'];
          $img = $rows['FoodImg'];
          $type = $rows['FoodType'];
          $restid = $rows['Restid'];
          $restname = $rows['RestTitle'];

          $_SESSION['checkout'] = array('foodid' => $foodid, 'name' => $name, 'price' => $price, 'img' => $img, 'ftype'=> $type, 'restid'=>$restid, 'restname'=>$restname);
          
      }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/menu.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">FoodShala</a>
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

    <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">CheckOut</h4><br><br>

    <div class="wrapper">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action ">
              <img src="images/<?php echo $rows['FoodImg']; ?>">
              <div>
                <strong><?php echo $name; ?></strong>
                <p><?php echo $restname; ?></p>
                <p><?php echo $rows['FoodType']; ?></p>
                <p>Price: <strong><?php echo $price; ?> Rs</strong></p>
              </div>
            </a>
          <a href="#" class="list-group-item list-group-item-action ">
              
              
                <p>Name: <strong><?php echo $_SESSION['UserName']; ?></strong></p>
                <p>Email: <?php echo $_SESSION['UserEmail']; ?></p>
                <p>Mobile: <?php echo $_SESSION['UserMobile']; ?></p>
                <p>Address: <?php echo $_SESSION['UserAddress'] ?></p>
              
            </a>
          <a href="include/placeorder.inc.php" class="list-group-item list-group-item-action ">
              <button class="btn btn-success">Place Order</button>
          </a>          
        </div>



    </div>

  </div>

</body>
</html>
