<?php
	session_start();
	$con = mysqli_connect('localhost','root','','serwis');
	if(isset($_SESSION['login'])){
		header("Location: index.php");
	} else {
		if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
			$login=$_POST["login"];
			$email=$_POST["email"];
			$password=$_POST["password"];
			if(ctype_alnum($login) && strlen($login)>1) {
				$login=htmlspecialchars($login);
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$email=htmlspecialchars($email);
					if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*]{6,15}$/', $password)){
						$password=md5(htmlspecialchars($password));
						$z1="SELECT `email` FROM `klienci` WHERE login='".$login."'";
						$z2="SELECT `login` FROM `klienci` WHERE email='".$email."'";
						if(!mysqli_num_rows(mysqli_query($con,$z1))) {
							if(!mysqli_num_rows(mysqli_query($con,$z2))) {
								$z3="INSERT INTO `klienci` (`login`, `email`, `password`) VALUES ('".$login."', '".$email."', '".$password."')";
								mysqli_query($con,$z3);
								mysqli_close($con);
								$_SESSION['login'] = $login;
								header("Location: index.php");
							} else {
								mysqli_close($con);
								header("Location: logowanie.php?error=email");
							}
						} else {
							mysqli_close($con);
							header("Location: logowanie.php?error=login");
						}
					} else {
						mysqli_close($con);
						header("Location: logowanie.php?error=password");
					}		
				} else {
					mysqli_close($con);
					header("Location: logowanie.php?error=emailz");
				}
			} else {
				mysqli_close($con);
				header("Location: logowanie.php?error=loginz");
			}
		} else {
			mysqli_close($con);
			header("Location: logowanie.php");
		}
	}
?>