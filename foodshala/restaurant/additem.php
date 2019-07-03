<?php
  session_start();

    if (isset($_SESSION['UserType']) ) {
    if($_SESSION['UserType'] == 'customer') {
        header('Location: ../index.php');
        exit();
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurant Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/addfood.css">
</head>
<body>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">FoodShala</a>
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

    <h4 style="background-color: whitesmoke; width: 250px; padding: 5px;text-align: center;">Add Food Item</h4><br><br>

    <div class="wrapper">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="../include/addfood.inc.php">


            <div class="form-group">
                <br><p style="color: red;text-align: center;"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></p><br>
              <label class="control-label col-sm-2" for="foodimage">Image:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="foodimage" name="foodimage" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="taste">Type:</label>
              <div class="col-sm-10">
                  <label class="radio-inline"><input type="radio" name="taste" value="Veg" required>Veg</label>
                  <label class="radio-inline"><input type="radio" name="taste" value="Non-Veg" required>Non-Veg</label>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="foodtitle">Title:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="foodtitle" placeholder="Enter Food Name  (20 characters max)" name="foodtitle" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="foodprice">Price:</label>
              <div class="col-sm-10">
                <input type="number" min="1" max="10000" class="form-control" id="foodprice" name="foodprice" required>
              </div>
            </div>
            <input type="hidden" name="restid" value="<?php echo $_SESSION['RestID']; ?>" >


            
            

            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="SubmitFood" value="submitfood" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
    </div>

    
  </div>

</body>
</html>
