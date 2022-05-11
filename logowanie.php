<?php
	session_start();
	if(isset($_SESSION['login'])){
		header("Location: index.php");
	}
	$errorr="";
	if(isset($_GET['error'])) {
		if($_GET['error'] == "login") {
			$errorr='<p >Podany login jest zajęty!</p>';
		} elseif($_GET['error'] == "email") {
			$errorr='<p>Podany adres email jest zajęty!</p>';
		} elseif($_GET['error'] == "password") {
			$errorr='<p>Hasło nie spełnia wymagań!</p>';
		} elseif($_GET['error'] == "emailz") {
			$errorr='<p>Email nie spełnia wymagań!</p>';
		} elseif($_GET['error'] == "loginz") {
			$errorr='<p>Login nie spełnia wymagań!</p>';
		}
	}
	if(isset($_GET['l']) && $_GET['l'] == "error") {
	$errorl='<p>Podano złe dane</p>';
	} else {
	$errorl="";	
	}
	
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Ogloszenia</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	
		<div id="baner">
			<h1>Ogłoszenia</h1>
		</div>
		<div style="margin-left: 18%;">
			<p><a class="link" href="index.php">Strona główna</a><p>
		</div>
		
		<div id="srodek">
			<div id="lewy" >
				<h1>Zaloguj się</h1>
				<form name="logowanie" id="logowanie" method="POST" action="login.php">
					<label for="login">Login: </label><br>
					  <input id="login" name="login" placeholder="Podaj login" type="text" required><br>
					<label for="password">Hasło: </label><br>
					  <input id="password" name="password" placeholder="Podaj haslo" type="password" required><br>
					<input  type="submit" value="Zaloguj"><br>
					<?php echo $errorl; ?>
				</form>
			</div>
			<div id="prawy">
					<h1>Rejestracja</h1>
					<form id="rejestracja" name="rejestracja" autocomplete="false" method="POST" action="rejestracja.php">
						<label for="login">Nazwa konta: </label><br>
						<input autocomplete="none" id="login" name="login" placeholder="Podaj nazwe" type="text" required>
						<p>Min. 2 znaki, tylko litery i cyfry</p>
						<label for="email">Adres e-mail: </label><br>
						<input autocomplete="none" id="email" name="email" placeholder="Podaj email" type="text" required>
						<p>Przykładowy adres email: nazwa@poczta.pl</p>
						<label for="password">Hasło: </label><br>
						<input autocomplete="none" readonly onfocus="this.removeAttribute('readonly');" id="password" name="password" placeholder="Wybierz hasło" type="password" required>
						<p>8-12 znaków, zawiera min. 1 litere i cyfre, może zawierac znaki specjalne</p>
						<input type="submit" value="Zarejestruj">
						<?php echo $errorr; ?>
					</form>
				
			</div>
			<div style="clear:both;"></div>
		</div>
		
	</body>
</html>