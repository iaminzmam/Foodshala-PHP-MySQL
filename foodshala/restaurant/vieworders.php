<?php 
	session_start();

	if(isset($_SESSION['UserType'])){
	    if($_SESSION['UserType'] == 'customer') {
	      header('Location: index.php');
	      exit();
	     } else{
	     	require "../include/dbh.inc.php";
	     	$cid = $_SESSION['RestID'];
		    $sql = "SELECT * FROM orders WHERE Restid_fk='$cid'";
		    $result = mysqli_query($conn, $sql);
		    $resultcheck = mysqli_num_rows($result);
		    
	     }
	  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Orders | Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/vieworders.css">
</head>
<body>

	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">FoodShala</a>
        </div>
        <ul class="nav navbar-nav">
          <li class=""><a href="#">Home</a></li>
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

      <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">View Orders</h4><br><br>
    

    <div class="wrapper">
        <div class="list-group">
          <?php while($rows = mysqli_fetch_assoc($result)) { ?>

          <a href="#" class="list-group-item list-group-item-action ">
              
              
                <div style="display: inline-block;">
                	<strong><?php echo $rows['OrderFoodName']; ?></strong>
	                <p><?php echo $rows['OrderRest']; ?></p>
	                <p>Price: <strong><?php echo $rows['OrderPrice']; ?> Rs</strong></p>
	                <p>Order No: <?php echo $rows['Orderid']; ?></p>
                </div>
                <div style="display: inline-block;float: right;">
                	<strong><?php echo $rows['OrderCustName']; ?></strong>
                	<p><?php echo $rows['OrderEmail']; ?></p>
                	<p>Status: <strong>On The Way</strong></p>
                	<p><?php echo $rows['OrderTime']; ?></p>
                </div>
             
            </a>

        	<?php }  ?>

          
          
        </div>
    </div>

    
  </div>

</body>
</html>
