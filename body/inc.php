

<?php echo "test";
function header() {
?>
 <div class=\"loader\" id=\"loader\">
        <p>Chargement...</p>
    </div>
    <header>
        <img src=\"headerlogo.png\" alt=\"Logo\" class=\"logo\">
        <div class=\"headright\">
            <button onclick=\"MenuOpen()\"><img src=\"html css/Menu.png\" alt=\"Menu\"></button>
            <div class=\"dropdown\" id=\"emission\">
                <a href=\"\" id=\"btn\">EMISSIONS</a>
                <div class=\"dropdown-content\">
                    <a href=\"\">Le quiz en série</a>
                    <a href=\"\">Histoire de poche</a>
                    <a href=\"\">Le journal</a>
                    <a href=\"\">Debat Lycéen</a>
                    <a href=\"\">1 thème, 3 chansons</a>
                </div>
            </div>
            <div class=\"dropdown\" id=\"equipe\">
                <a href=\"\" id=\"btn\">JOURNAL</a>
                <div class=\"dropdown-content\">
                    <a href=\"\"> </a>
                </div>
            </div>
            <div class=\"dropdown\" id=\"journal\">
                <a href=\"\" id=\"btn\">L'EQUIPE</a>
                <div class=\"dropdown-content\">
                    <a href=\"\">le Web Radio</a>
                    <a href=\"\">Le lycée</a>
                </div>
            </div>
        </div>
    </header>
</body>
<script>
    tmp = true;
    function MenuOpen() {
        console.log(window.innerWidth);

        if (window.innerWidth < 400) {
            if (tmp == true) {
                const btn = document.querySelectorAll(\"#btn\");
                btn.forEach(btn => {
                    btn.style.display = \"block\";
                });

                tmp = false;
            } else {
                tmp = true;
                const btn = document.querySelectorAll(\"#btn\");
                btn.forEach(btn => {
                    btn.style.display = \"none\";
                });
            }
        } else {
            const btn = document.querySelectorAll(\"#btn\");
            btn.forEach(btn => {
                btn.style.display = \"block\";
            });

        }
    }
    window.addEventListener(\"DOMContentLoaded\", (event) => {
        setTimeout(function () {
            document.getElementById(\"loader\").style.top = \"-100vh\";
        }, 1000)
    });
</script>
<?php
}
function footer(){


echo "
<footer>
        <img src=\"../img/Logo.png\" alt=\"Logo\" class=\"logo-footer\">
        <h4>A propos</h4>
        <div class=\"footer-element\">
            <ul>
                <li><a href=\"\">- Contact</a></li>
                <li><a href=\"\">- Plan du site</a></li>
                <li><a href=\"\">- Mentions Legales</a></li>
            </ul>
        </div>
    </footer>
    ";
  }
  
function entete(){

    echo "
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <link rel=\"stylesheet\" href=\"page_journal.css\">
    <link rel=\"stylesheet\" href=\"../css/reset.css\">
    <link rel=\"stylesheet\" href=\"../css/header.css\">
    <link rel=\"stylesheet\" href=\"../css/page_des_emissions.css\">
    <link rel=\"stylesheet\" href=\"../css/page_journal.css\">
    ";
  }
 ?>
