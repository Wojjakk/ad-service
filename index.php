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
    <div id="container">
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
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
       <h1 class="h2">Ogłoszenia</h1>         
    <div id="main">
        
            <?php 
                echo '<p id="ogloszenie">';
                $zap = "select * from ogloszenia"; 
                $ogl = mysqli_query ($con,$zap); 
                while ($w = mysqli_fetch_array ($ogl)){ 
                echo "<b><i>".$w['login'].":</i></b><br> ";
                echo $w['tresc']."<br>";
                echo "<i>".$w['data']."</i><br><br>";
                } 
                echo "</p>";
            ?>
        
        </div>
        <div id="dodawanie">
        <?php
        if(isset($_SESSION['login'])) {
                    echo '<form method="post" action="" >';
                    //echo '<input type="text" name="ogl" ><br>';  
                    echo '<textarea name="ogl" cols="30" rows="3" placeholder="wpisz ogłoszenie">';
                    echo '</textarea>';
                    
                    echo '<br><input type="submit" value="Dodaj ogloszenie">';
                    echo "</form>";
                    
                    if( isset($_POST['ogl'])){
                    $ogl = $_POST['ogl'];
                    $login = $_SESSION['login'];

                    $ins = "insert into ogloszenia (tresc, login, data) value('$ogl','$login','".
                            date("Y-m_d H:i:s"). "')";
                    mysqli_query($con, $ins);
                    header ('Location: podziekowanie.php');
                    }
                    
                
                }
        ?>
        <?php mysqli_close($con); ?>
        </div>
    </div>

</body>
</html>