<?php

	session_start();

	if (isset($_SESSION['UserType']) ) {
	    if($_SESSION['UserType'] == 'customer') {
	        header('Location: ../index.php');
	        exit();
	     }
    }

	if (isset($_POST['SubmitFood'])) {
			

			$food_name = $_POST['foodtitle'];
			$image = $_FILES['foodimage'];
			
			$food_price = $_POST['foodprice'];
			$food_type = $_POST['taste'];
			$restid = $_POST['restid'];

			if (empty($food_type) || empty($food_price) || empty($food_name) || empty($image) || empty($restid) ) {
				header('Location: ../restaurant/additem.php?error=emptyFields');
				exit();
			} else {
				$fileName = $image['name'];
				$fileTmpName = $image['tmp_name'];
				$fileSize = $image['size'];
				$fileError = $image['error'];

				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg','jpeg','png');

				if (in_array($fileActualExt, $allowed)) {
					if ($fileError === 0) {
						if ($fileSize < 1000000) {
							$fileNameNew = uniqid('', true).'.'.$fileActualExt;
							$fileDest = '../images/'.$fileNameNew;
						} else {
							header('Location: ../restaurant/additem.php?error=FileIsTooBig');
							exit();
						}
						
					} else {
						header('Location: ../restaurant/additem.php?error=ErrorInUpload');
						exit();
					}
					
				} else {
					header('Location: ../restaurant/additem.php?error=WrongFileType');
					exit();
				}
				

				require "dbh.inc.php";
				$sql = "INSERT INTO fooditems(FoodName, FoodType, FoodPrice, FoodImg, Restid)  VALUES(?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare( $stmt, $sql)) {
					header('Location: ../restaurant/additem.php?error=sqlerrorcreating');
					exit();
				} else {
					mysqli_stmt_bind_param($stmt, "ssisi",$food_name, $food_type, $food_price, $fileNameNew,$restid);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);

					mysqli_close($conn);
					move_uploaded_file($fileTmpName, $fileDest);
					header('Location: ../restaurant/additem.php?successfully-added');
					exit();
				}
				
			}
			

	} else {
		header('Location: ../restaurant/additem.php?error=method');
		exit();
	}
	