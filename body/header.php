<!DOCTYPE html>
<html lang="fr">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebRadio</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <img src="./img/headerlogo.png" alt="Logo" class="logo">
        <img src="headerlogo.png" alt="Logo" class="logo">
        <div class="headright">
            <button onclick="MenuOpen()"><img src="../img/Menu.png" alt="Menu"></button>
            <div class="dropdown" id="emission">
                <a href="" id="btn">EMISSIONS</a>
                <div class="dropdown-content">
                    <a href="">Le quiz en série</a>
                    <a href="">Histoire de poche</a>
                    <a href="">Le journal</a>
                    <a href="">Debat Lycéen</a>
                    <a href="">1 thème, 3 chansons</a>
                </div>
            </div>
            <div class="dropdown" id="equipe">
                <a href="" id="btn">JOURNAL</a>
                <div class="dropdown-content">
                    <a href=""> </a>
                </div>
            </div>
            <div class="dropdown" id="journal">
                <a href="" id="btn">L'EQUIPE</a>
                <div class="dropdown-content">
                    <a href="">le Web Radio</a>
                    <a href="">Le lycée</a>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        tmp = true;
        function MenuOpen() {
            console.log(window.innerWidth);
            
            if (window.innerWidth < 400) {
                if (tmp == true) {
                    document.getElementById("btn").style.display = "block";
                    tmp = false;
                } else {
                    tmp = true;
                    document.getElementById("btn").style.display = "none";
                }
            }
        }
    </script>
</html>
