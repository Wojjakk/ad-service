<?php
	session_start();
	$con = mysqli_connect('localhost','root','','serwis'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad-serive</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <p style="float: right">
            <?php 
				if(isset($_SESSION['login'])){
					echo '<p><a class="link" href="logout.php">Wyloguj się '.$_SESSION['login'].'</a> ';
				} else {
					echo '<p><a class="link" href="logowanie.php">Zaloguj się</a></p>';
				}
			?>
        </p>
        
    </div>
         
    <div id="main">
    <h1 style="text-align: center;">Hej jestem Kacper. Hej jestem Maks
            </h1>
      
        </div>
    </div>
    <footer>Prawa autorskie tego typu</footer>
</body>
</html>