    <footer>
        <img src="../images/Logo.png" alt="Logo" class="logo-footer" />
        <h4>A propos</h4>
        <div class="footer-element">
            <ul>
                <li><a href="">- Contact</a></li>
                <li><a href="">- Plan du site</a></li>
                <li><a href="">- Mentions Legales</a></li>
            </ul>
        </div>
<?php

        echo "
        <div class=\"footer-podcast\">
            <div style=\"margin-bottom: 2vh\">
                <button class=\"previous\"></button>
                <button onclick=\"Like(this)\" class=\"like\"></button>
                <button class=\"next\"></button>
            </div>
            <div class=\"audio-container\">
                <p><strong>Titre Podcast</strong> / Description</p>
                <audio controls preload>
                    <source src=\"../files/journal/Journal 14 12 2022.wav\" type=\"audio/wav\">
                </audio>
            </div>
            <div class=\"bibliotheque\">
                <button class=\"biblio\"></button>
                <p class=\"biblioTXT\">Bibliothèque</p>
            </div>
        </div>";
?>
    </footer>
