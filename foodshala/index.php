<?php
	
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu | FoodShala</title>
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
          <a class="navbar-brand" href="index.php">FoodShala</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
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

    <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">Menu</h4><br><br>

    <div class="wrapper">
        <div class="list-group">

          <?php
              require "include/foodlist.inc.php";
              while($rows = mysqli_fetch_assoc($result)) {
                  
          ?>

            <a href="#" class="list-group-item list-group-item-action ">
            <img src="images/<?php echo $rows['FoodImg']; ?>">
            <div>
              <strong><?php echo $rows['FoodName']; ?></strong>
              <p><?php echo $rows['RestTitle']; ?></p>
              <p>Price: <strong><?php echo $rows['FoodPrice']; ?></strong></p>

              <button onclick="window.location.href = 'http://localhost/foodshala/placeorder.php?id=<?php echo $rows['Foodid']; ?>';" class="btn btn-primary">Order Now</button>
            </div>
          </a>


          <?php   }
          ?>

          

          
        </div>



    </div>

  </div>

</body>
</html>
