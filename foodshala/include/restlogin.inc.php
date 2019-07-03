<?php

	session_start();

	require "checklogin.inc.php";

	if (isset($_POST['SubmitRLogin'])) {
		require "dbh.inc.php";


		$login_email = $_POST['shopemail'];
		$login_password = $_POST['spwd'];

		if (empty($login_email) || empty($login_password)) {
			header('Location: ../restaurant/login.php?error=emptyfields');
			exit();
		} else {
			$sql = "SELECT * FROM restaurant WHERE RestEmail='$login_email' ";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck == 0) {
				header('Location: ../restaurant/login.php?error=User Does Not Exist');
				exit();
			} else {
				if ($rows = mysqli_fetch_assoc($result)) {
					if ($login_password != $rows['RestPsw']) {
						header('Location: ../restaurant/login.php?error=wrongpassword');
						exit();
					} else {
									$_SESSION['RestID'] = $rows['Restid'];
									$_SESSION['RestOwner'] = $rows['RestOwner'];
									$_SESSION['RestTitle'] = $rows['RestTitle'];
									$_SESSION['RestEmail'] = $rows['RestEmail'];
									$_SESSION['RestAddress'] = $rows['RestAddress'];
									$_SESSION['RestCity'] = $rows['RestCity'];
									$_SESSION['RestRegDate'] = $rows['RestRegDate'];
									$_SESSION['UserType'] = "restaurant";
									mysqli_close($conn);
									header('Location: ../index.php?login=success');
									exit();
					}
						
				} else {
					mysqli_close($conn);
					header('Location: ../restaurant/login.php?error=User Does Not Exist');
					exit();
				}
				
			}
			
		}
		

	} else {
		header('Location: ../restaurant/login.php?error=cant respond');
		exit();
	
	}