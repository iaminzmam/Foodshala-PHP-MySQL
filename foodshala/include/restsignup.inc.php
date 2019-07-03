<?php

	session_start();

	require "checklogin.inc.php";

	if (isset($_POST['SubmitRSignup'])) {
		if (!empty($_POST)) {
			require "dbh.inc.php";

			$user_name = $_POST['ownername'];
			$user_title = $_POST['shoptitle'];
			$user_email = $_POST['shopemail'];
			$user_password = $_POST['spwd'];
			$user_cpassword = $_POST['cspwd'];
			$user_address = $_POST['shopaddress'];
			$user_city = $_POST['shopcity'];

			if (empty($user_name) || empty($user_email) || empty($user_password) || empty($user_cpassword)  || empty($user_address) || empty($user_city) || empty($user_title)) {
						header('Location: ../restaurant/signup.php?error=emptyFields');
						exit();
			} elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				header('Location: ../restaurant/signup.php?error=INVALIDEMAIL');
				exit();
			} elseif ($user_password !== $user_cpassword) {
				header('Location: ../restaurant/signup.php?error=invalidUserPassword');
				exit();
			} else {
				$sql = "SELECT RestEmail FROM restaurant WHERE RestEmail=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header('Location: ../restaurant/signup.php?error=sqlerrorselecting');
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "s", $user_email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultcheckemail = mysqli_stmt_num_rows($stmt);
					mysqli_stmt_close($stmt);
					if($resultcheckemail > 0){
						mysqli_stmt_close($stmt);
						header('Location: ../restaurant/signup.php?error=emailTaken');
						exit();
					} else {

						$sql = "INSERT INTO restaurant(RestTitle, RestOwner, RestEmail, RestPsw, RestAddress, RestCity)  VALUES(?,?,?,?,?,?)";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare( $stmt, $sql)) {
							header('Location: ../restaurant/signup.php?error=sqlerrorcreating');
							exit();
						} else {
							mysqli_stmt_bind_param($stmt, "ssssss",$user_title, $user_name, $user_email, $user_password, $user_address, $user_city);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);

							
							$sql1 = "SELECT * FROM restaurant WHERE RestEmail='$user_email' ;";
							$result1= mysqli_query($conn, $sql1);
							
							

							$resultcheck = mysqli_num_rows($result1);
							if ($resultcheck == 1) {
								while ($rows = mysqli_fetch_assoc($result1)) {
									$_SESSION['RestID'] = $rows['Restid'];
									$_SESSION['RestOwner'] = $rows['RestOwner'];
									$_SESSION['RestTitle'] = $rows['RestTitle'];
									$_SESSION['RestEmail'] = $rows['RestEmail'];
									$_SESSION['RestAddress'] = $rows['RestAddress'];
									$_SESSION['RestCity'] = $rows['RestCity'];
									$_SESSION['RestRegDate'] = $rows['RestRegDate'];
									$_SESSION['UserType'] = "restaurant";
 										
								}
							} else {
								mysqli_close($conn);
								header('Location: ../restaurant/signup.php?error=successButErrorinFetching');
								exit();
							}
							mysqli_close($conn);
							header('Location: ../index.php?signup=success');
							exit();
							
						}
						
					}


				}
				
			}
			

		} else {
			header('Location: ../restaurant/login.php');
			exit();
		}
		
	}else{
		header('Location: ../restaurant/login.php');
		exit();
	}