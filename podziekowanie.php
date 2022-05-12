<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Dziekuje za wpisanie wpisu :D<h1>
    <br><h2>Za chwile wrocisz do strony glownej<h2> <a id="link" href="index.php">Strona główna</a>

    <script>
        setTimeout(function() { your_func(); }, 5000);

        function your_func(){
            var link = document.getElementById("link");
            link.click();
        }
    </script>
    </div>
</body>
</html>