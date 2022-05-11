<?php
	session_start();
    $con = mysqli_connect('localhost','root','','serwis');
    
	if(isset($_SESSION['login'])){
		header("Location: index.php");
    
	} else {
			if(!empty($_POST["login"]) && !empty($_POST["password"])) {
				$login=htmlspecialchars($_POST["login"]);
				$password=htmlspecialchars($_POST["password"]);
				if(ctype_alnum($login)) {
					
					$q = "SELECT * from klienci WHERE login='".$login."' AND password='".md5($password)."'";
					$w = mysqli_query($con,$q);
					if(mysqli_num_rows($w)) {
						$_SESSION['login'] = $login;
						mysqli_close($con);
						header("Location: index.php");
					} else {
						mysqli_close($con);
						header("Location: logowanie.php?l=error");
					}
				} else {
					mysqli_close($con);
					header("Location: logowanie.php?l=error");
				}
			} else {
				mysqli_close($con);
				header("Location: logowanie.php");
			}
	}
?>