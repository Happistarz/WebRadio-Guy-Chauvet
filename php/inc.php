<?php
function entete(){
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="icon" type="image/x-icon" href="./img/favico.png">
</head> 
<?php
}
function eader() {
?>
<header class = "header">
    <img src="./img/logo.png" alt="Logo" class="logoh">
    <div class="headright">
        <a href=""><img src="./img/Menu.png" alt="Menu"></a>
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
                <a href="">le Web Radio</a>
                <a href="">Le lycée</a>
            </div>
        </div>
        <div class="dropdown" id="journal">
            <a href="" id="btn">L'EQUIPE</a>
            <div class="dropdown-content">
                <a href=""> . </a>
            </div>
        </div>
    </div>
</header>
<?php
}

function page_emission(){
 ?>
      <div class="emission marging-body">
        <img src="./img/test.png" id="Imgdel'emission" alt="Emission" class="image">
        <div class="text">
            <h5>Titre de l'émission</h5>
            <h6>- Description de l'émission en quelques mots sed do -</h6>
            <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>
               eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris <br>
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in <br>
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla <br>
              pariatur. Excepteur sint occaecat cupidatat non
            <article>
          </div>
      </div>

        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size=5 width="93%"color = black> 
    <div>
        <a class="container border-3 marging-body" href="">
            <audio id="player" src="mon-fichier-audio.mp3"></audio>
            <img src="./img/bouton-coeur-plein.png" onclick="document.getElementById('player').play()">
            <img src="./img/bouton-play.png" onclick="document.getElementById('player').pause()">
            <img src="./img/bouton-stop.png" onclick="document.getElementById('player').stop()">
            <h6>Titre du podcast</h6>
            <h7>Description et/ou nom croniqueurs</h7>
            <hr size=5 width="93%"color = black> 
            <audio id="player" src="../Audio/Shrek.mp3"></audio>
            <img src="./img/bouton-coeur-plein.png" onclick="document.getElementById('player').play()">
            <img src="./img/bouton-play.png" onclick="document.getElementById('player').pause()">
            <img src="./img/bouton-stop.png" onclick="document.getElementById('player').stop()">
            <h6>Titre du podcast</h6>
            <h7>Description et/ou nom croniqueurs</h7>
        </a>
    </div>
    <br>
<?php
}
function index_accueil(){
?>
     <div class="def-p marging-body">
        <p>
        Certains domaines de l'informatique peuvent être très abstraits, comme la complexité algorithmique, et d'autres peuvent être plus proches d'un public profane. Ainsi, la théorie des langages demeure un domaine davantage accessible aux professionnels formés (description des ordinateurs et méthodes de programmation), tandis que les métiers liés aux interfaces homme-machine (IHM) sont accessibles à un plus large public.
        </p>
    </div>

<h1 class="title">A venir</h1>
<hr size=5 width="100%"color = black>

    <div class="new-p marging-body">
        <p>
        Certains domaines de l'informatique peuvent être très abstraits, comme la complexité algorithmique, et d'autres peuvent être plus proches d'un public profane. Ainsi, la théorie des langages demeure un domaine davantage accessible aux professionnels formés (description des ordinateurs et méthodes de programmation), tandis que les métiers liés aux interfaces homme-machine (IHM) sont accessibles à un plus large public.
        </p>
    </div>

<h1 class="title">LES EMISSIONS</h1>
<hr size=5 width="93%"color = black>
    <div class="emissions marging-body">
        <div class="box">
            <a href="" class="box-img border-1">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
            <a href="" class="box-img border-2">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
            <a href="" class="box-img border-3">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
        </div>
        <div class="box">
            <a href="" class="border-1">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
            <a href="" class="border-2">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
            <a href="" class="border-3">
                <h3>Titre</h3>
                <img src="./img/Loudun.jpg" alt="image">
            </a>
        </div>
    </div>

<h1 class="title">LE JOURNAL</h1>
<hr size=5 width="93%"color = black>
    <div class="marging-body">
        <a class="j-box border-1" href="">
            <img src="./img/Loudun.jpg" alt="Image">

            <article>
                <h2>Lorem ipsum dolor sit</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis blanditiis ipsam amet quon,nb jh jkhkjljk jhjkjh. Impedit, g accusantium laboriosam praesentium mollitia asperiores quasi alias quas quibusdam ducimus facilis obcaecati consequatur quis quod.</p>
            </article>
        </a>
        <a class="j-box border-2" href="">
            <img src="./img/Loudun.jpg" alt="Image">

            <article>
                <p>L. Veritatis blaias qmus facilis obcaecati consequatur quis quod.</p>
                <p>L. Veritatis blaias qmus facilis obcaecati consequatur quis quod.</p>
            </article>
        </a>
        <a class="j-box border-3" href="">
            <img src="./img/Loudun.jpg" alt="Image">

            <article>
                <h2>Lorem ipsum dolor sit</h2>
            </article>
        </a>
    </div>

<h1 id="equipe" class="title">L'EQUIPE</h1>
<hr size=5 width="93%"color = black>
    <div class="equipe-box marging-body">
        <a href="" class="border-1">
            <h3>Titre</h3>
            <img src="./img/Loudun.jpg" alt="image">
        </a>
        <a href="" class="border-2">
            <h3>Titre</h3>
            <img src="./img/Loudun.jpg" alt="image">
        </a>
    </div>
  <?php
}

function footer(){
?>
<footer>
        <img src="./img/logo.png" alt="Logo" class="logof">
        <h1>A propos</h1>
        <div class="footer-element">
            <ul>
                <li><a href="">Contact</a></li>
                <li><a href="">Plan du site</a></li>
                <li><a href="">Mentions Legales</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
<?php
?>
<?php
  }

?>
