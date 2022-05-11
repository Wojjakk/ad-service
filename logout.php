<?php
	session_start();
	if(isset($_SESSION['login'])){
		unset($_SESSION['login']);
		unset($_SESSION['klientid']);
		session_destroy();
		header("Location: index.php");
	} else {
		header("Location: logowanie.php");
	}
?>