<?php

	require "include/dbh.inc.php";

	if (isset($_SESSION['UserTaste'])) {
		$taste = $_SESSION['UserTaste'];
		$sql = "SELECT * FROM fooditems INNER JOIN restaurant ON fooditems.Restid = restaurant.Restid AND fooditems.FoodType='$taste'";
	    $result = mysqli_query($conn, $sql);
	    $resultcheck = mysqli_num_rows($result);
	} else {
		$sql = "SELECT * FROM fooditems INNER JOIN restaurant ON fooditems.Restid = restaurant.Restid";
    	$result = mysqli_query($conn, $sql);
	    $resultcheck = mysqli_num_rows($result);
	}
	


	