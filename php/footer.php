<?php
$sql = "SELECT * FROM Podcast";

$db = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
$resu = $db->query($sql);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql2 = "SELECT * FROM Podcast WHERE id = :id";
$stmt = $db->prepare($sql2);
$stmt->execute(array(':id' => $id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<footer>
    <img src="../images/Logo.png" alt="Logo" class="logo-footer">
    <h4>A propos</h4>
    <div class="footer-element">
        <ul>
            <li><a href="contact.php">- Contact</a></li>
            <li><a href="plan_du_site.php">- Plan du site</a></li>
            <li><a href="mentions_legales.php">- Mentions Legales</a></li>
        </ul>
    </div>

</footer>
<div class="podcast-ft">
    <div class="head">
        <p><strong> titre</strong> / description</p>
    </div>
    <div class="audio-lect">
        <button class="previous"></button>
        <button onclick="Like(this)" class="like"></button>
        <button class="next"></button>
        <audio controls preload>
            <source src="../files/H2P/H2P Ep 1.wav">
        </audio>
        <img id="myImg" src="../images/biblio.png" class="biblio" alt="biblio" onclick="openModal2()">
    </div>

    <div id="myModal6" class="modal6" style="display: none;">
        <span class="close1">&times;</span>

        
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        <div class="modal6-content">
            <div class="modal6-header">
                <h2>Titre de l'émission</h2>
            </div>
            <div class="modal6-body">
                <div class="modal6-image">
                    <img src="../images/material-icons.png" alt="Placeholder Image">
                </div>
                <div class="modal6-description">
                    <p>Description de l'émission</p>
                </div>
            </div>
            <div class="modal6-footer"></div>
        </div>
        
    </div>