<?php

	

	if (isset($_SESSION['UserType']) ) {
		if($_SESSION['UserType'] == 'customer') {
			header('Location: http://localhost/foodshala/index.php');
			exit();
		} elseif ($_SESSION['UserType'] == 'restaurant') {
			header('Location: http://localhost/foodshala/restaurant/additem.php');
			exit();
		}
	}