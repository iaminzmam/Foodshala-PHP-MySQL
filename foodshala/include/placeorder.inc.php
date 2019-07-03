<?php

	session_start();
	if (isset($_SESSION['UserType'])) {
		if ($_SESSION['UserType'] == 'restaurant') {
			header('Location: ../index.php');
			exit();
		}
	}

	if (isset($_SESSION['checkout'])) {
		if(!empty($_SESSION['checkout'])) {
			$fid = $_SESSION['checkout']['foodid'];
			$fname = $_SESSION['checkout']['name'];
			$price = $_SESSION['checkout']['price'];
			$restid = $_SESSION['checkout']['restid'];
			$restname = $_SESSION['checkout']['restname'];
			$cname = $_SESSION['UserName'];
			$cemail = $_SESSION['UserEmail'];
			$cid = $_SESSION['UserID'];
			
			if (empty($fid) || empty($fname) || empty($price) || empty($restid) || empty($restname) || empty($cname) || empty($cemail) || empty($cid)) {
				header('Location: ../placeorder.php?error=EmptyFields');
				exit();
			} else {
				require "dbh.inc.php";
				$sql = "INSERT INTO orders(OrderFoodName, OrderPrice, OrderRest, OrderCustName, OrderEmail, Custid_fk, Restid_fk, Foodid_fk)  VALUES(?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare( $stmt, $sql)) {
					header('Location: ../placeorder.php?error=SqlErrorCreating');
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "sisssiii",$fname, $price, $restname, $cname, $cemail,$cid, $restid, $fid);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);

					mysqli_close($conn);
					header('Location: ../myorders.php?SuccessfullyPlaced');
					exit();
				}
				
			}
			
		} else {
			
			header('Location: ../placeorder.php?error=EmptyCart');
			exit();
		}
	} else {
		
		header('Location: ../placeorder.php?error=EmptyCart');
		exit();
	}
	