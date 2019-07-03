<?php

            if (isset($_SESSION['UserType'])) {
              if ($_SESSION['UserType'] == 'customer') {
                  echo '
                        <li><a href="myorders.php">My Orders</a></li>
          
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="myorders.php"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['UserName'].'</a></li>
                          <li><a href="http://localhost/foodshala/include/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                        ';
              } elseif($_SESSION['UserType'] == 'restaurant') {
                	echo '
                		<li><a href="http://localhost/foodshala/restaurant/vieworders.php">View Orders</a></li>
                    <li><a href="http://localhost/foodshala/restaurant/additem.php">Add Food</a></li>
          
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="http://localhost/foodshala/restaurant/vieworders.php"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['RestTitle'].'</a></li>
                          <li><a href="http://localhost/foodshala/include/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                	';
              }else {
              		echo '
              			<li><a href="http://localhost/foodshala/restaurant/login.php">Restaurant login</a></li>
          
				        </ul>
				        <ul class="nav navbar-nav navbar-right">
				          <li><a href="http://localhost/foodshala/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				          <li><a href="http://localhost/foodshala/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				        </ul>
              		';
              }
              
            }else {
            	echo '
            		<li><a href="http://localhost/foodshala/restaurant/login.php">Restaurant login</a></li>
          
			        </ul>
			        <ul class="nav navbar-nav navbar-right">
			          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			        </ul>
            	';
            }