<?php

if (ValidSession()) {
    echo '<a href="' . WEBROOT . 'Account/logout" class="accountbtn accountbtn-logout">
    <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
    </a>';
} else {
    echo '<a href="' . WEBROOT . 'Account/login" class="accountbtn ">
    <span class="icon"><i class="fa-solid fa-arrow-right-to-bracket"></i></span>
    </a>';
}

?>
<footer>
    <a href="index.php"> <img src=<?php echo DATA . "/general/Logo.png"; ?> alt="Logo" class="logo-footer" /></a>
    <h4>A propos</h4>
    <div class="footer-element">
        <ul>
            <li><a href="<?php echo WEBROOT . "Accueil/Contact" ?>">- Contact</a></li>
            <li><a href="<?php echo WEBROOT . "Accueil/Plan" ?>">- Plan du site</a></li>
            <li><a href="<?php echo WEBROOT . "Accueil/Mentions" ?>">- Mentions Legales</a></li>
        </ul>
    </div>

</footer>