<?php

	session_start();

	require "checklogin.inc.php";

	if (isset($_POST['SubmitUSignup'])) {
		if (!empty($_POST)) {
			require "dbh.inc.php";

			$user_name = $_POST['name'];
			$user_email = $_POST['email'];
			$user_password = $_POST['pwd'];
			$user_cpassword = $_POST['cpwd'];
			$user_mobile = $_POST['mobile'];
			$user_address = $_POST['address'];
			$user_city = $_POST['city'];
			$user_taste = $_POST['taste'];

			if (empty($user_name) || empty($user_email) || empty($user_password) || empty($user_cpassword) || empty($user_mobile) || empty($user_address) || empty($user_city) || empty($user_taste)) {
						header('Location: ../signup.php?error=emptyFields');
						exit();
			} elseif(!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
					header('Location: ../signup.php?error=InvalidUsername');
					exit();
			} elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
				header('Location: ../signup.php?error=INVALIDEMAIL');
				exit();
			} elseif ($user_password !== $user_cpassword) {
				header('Location: ../signup.php?error=invalidUserPassword');
				exit();
			} else {
				$sql = "SELECT CustEmail FROM customer WHERE CustEmail=?";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header('Location: ../signup.php?error=sqlerrorselecting');
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "s", $user_email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultcheckemail = mysqli_stmt_num_rows($stmt);
					if($resultcheckemail > 0){
					header('Location: ../signup.php?error=emailTaken');
					exit();
					} else {
						$sql = "INSERT INTO customer(CustName, CustEmail, CustPsw, CustMobile, CustTaste, CustAddress, CustCity)  VALUES(?,?,?,?,?,?,?)";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare( $stmt, $sql)) {
							header('Location: ../signup.php?error=sqlerrorcreating');
							exit();
						} else {
							mysqli_stmt_bind_param($stmt, "sssisss",$user_name, $user_email, $user_password, $user_mobile, $user_taste, $user_address, $user_city);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);

							
							$sql1 = "SELECT * FROM customer WHERE CustEmail='$user_email' ;";
							$result1= mysqli_query($conn, $sql1);
							
							

							$resultcheck = mysqli_num_rows($result1);
							if ($resultcheck == 1) {
								while ($rows = mysqli_fetch_assoc($result1)) {
									$_SESSION['UserID'] = $rows['Custid'];
									$_SESSION['UserName'] = $rows['CustName'];
									$_SESSION['UserMobile'] = $rows['CustMobile'];
									$_SESSION['UserEmail'] = $rows['CustEmail'];
									$_SESSION['UserAddress'] = $rows['CustAddress'];
									$_SESSION['UserCity'] = $rows['CustCity'];
									$_SESSION['UserTaste'] = $rows['CustTaste'];
									$_SESSION['UserRegDate'] = $rows['CustRegDate'];
									$_SESSION['UserType'] = "customer";

									if (isset($_GET['id'])) {
								      header('Location: ../placeorder.php?id='.$_GET['id']);      
								      exit();
									}
									mysqli_close($conn);
									header('Location: ../index.php?signup=success');
									exit();
										
								}
							} else {
								mysqli_close($conn);
								header('Location: ../signup.php?error=successButErrorinFetching');
								exit();
							}
							
							
						}
						
					}


				}
				
			}
			

		} else {
			header('Location: login.php');
			exit();
		}
		
	}else{
		header('Location: login.php');
		exit();
	}