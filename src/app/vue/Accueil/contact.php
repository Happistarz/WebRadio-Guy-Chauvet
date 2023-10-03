<h1>Contact</h1>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
    integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <!-- <main> -->

    <div class="container">
        <div style="text-align:center;padding-bottom: 15px;padding-top: 15px;">
            <h1>Contactez Nous</h1>
        </div>
        <div class="row">
            <div class="column">
                <img src="<?php echo DATA."/general/Logo.png"?>" style="width: 100%;">
            </div>
            <div class="column">
                <form method="POST" action="contact.php">
                    <label for="fname">Prenom</label>
                    <input type="text" id="fname" name="fname" placeholder="Votre nom..." required>
                    <label for="lname">Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre E-mail" required>
                    <label for="subject">Sujet</label>
                    <textarea id="subject" name="subject" placeholder="Ecrivez quelque chose..." style="height:170px" required></textarea>
                    <input type="submit" name="submit" value="Valider">
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="container">
        <h1 style="text-align: center;">Informations du lycée</h1>
        <div class="row">
            <div class="column">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d961.921594769298!2d0.0859733681157145!3d47.0063698375723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fd65f2582afbb1%3A0x7999dd35adc065e1!2sLyc%C3%A9e%20Guy%20chauvet!5e0!3m2!1sfr!2sfr!4v1677751061240!5m2!1sfr!2sfr"
                    width="600" height="400" style="border:0;float: right;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="column">
                <ul>
                    <li><i class="fa fa-bolt" style="margin-right: 15px;"></i> Rue de l'Éperon, 86200 Loudun</li>
                    <li><i class="fas fa-phone-alt" style="margin-right: 15px;"></i> 05 49 98 17 51</li>
                    <li><i class="fas fa-globe" style="margin-right: 15px;"></i> <a
                            href="https://etab.ac-poitiers.fr/lycee-guy-chauvet/" style="color: black;">Site du lycée
                        </a></li>
                </ul>
            </div>

        </div>
    </div>