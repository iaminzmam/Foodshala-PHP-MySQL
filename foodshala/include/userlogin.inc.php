<?php

	session_start();

	require "checklogin.inc.php";

	if (isset($_POST['SubmitULogin'])) {
		require "dbh.inc.php";


		$login_email = $_POST['loginemail'];
		$login_password = $_POST['loginpwd'];

		if (empty($login_email) || empty($login_password)) {
			header('Location: ../login.php?error=emptyfields');
			exit();
		} else {
			$sql = "SELECT * FROM customer WHERE CustEmail='$login_email' ";
			$result = mysqli_query($conn, $sql);
			$resultcheck = mysqli_num_rows($result);

			if ($resultcheck == 0) {
				header('Location: ../login.php?error=User Does Not Exist');
				exit();
			} else {
				if ($rows = mysqli_fetch_assoc($result)) {
					if ($login_password != $rows['CustPsw']) {
						header('Location: ../login.php?error=wrongpassword');
						exit();
					} else {
						$_SESSION['UserID'] = $rows['Custid'];
						$_SESSION['UserName'] = $rows['CustName'];
						$_SESSION['UserMobile'] = $rows['CustMobile'];
						$_SESSION['UserEmail'] = $rows['CustEmail'];
						$_SESSION['UserAddress'] = $rows['CustAddress'];
						$_SESSION['UserCity'] = $rows['CustCity'];
						$_SESSION['UserTaste'] = $rows['CustTaste'];
						$_SESSION['UserRegDate'] = $rows['CustRegDate'];
						$_SESSION['UserType'] = 'customer';
						mysqli_close($conn);
						if (isset($_GET['id'])) {
						      header('Location: ../placeorder.php?id='.$_GET['id']);      
						      exit();
						  }
						header('Location: ../index.php?login=success');
						exit();
					}
						
				} else {
					mysqli_close($conn);
					header('Location: ../login.php?error=User Does Not Exist');
					exit();
				}
				
			}
			
		}
		

	} else {
		header('Location: ../login.php?error=cant respond');
		exit();
	
	}
	