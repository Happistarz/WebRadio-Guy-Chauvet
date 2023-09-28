<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php $title; ?>
    </title>
</head>

<body>
    <?php require VIEWS . "header.php" ?>
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="quiz">

        <div class="form1">
            <form method="POST" action="quiz.php">
                <label for="nom">Nom Prénom:</label>
                <input type="text" id="nom" name="nom" required="required"><br>
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required="required"
                    placeholder="Tout attaché sans +33"><br>
        </div>

        <div class="txt-quiz">
            <p>
                Cochez les dates où vous ne serez pas disponible pour venir dans le studio le
                [insérer
                jour de la
                semaine] de [insérer horaire de tournage].
                Si vous êtes disponilbe à toutes les dates, merci de rien cocher.
            </p>
        </div>

        <div class="form2">
            <div class="pref">
                <input type="checkbox" id="preference1" value="option1" name="option1">
                <input type="time" name="t1" value="00:00">
                <label for="preference1" class="pref">Proposition date 1</label><br>
            </div>

            <div class="pref">
                <input type="checkbox" id="preference2" value="option2" name="option2">
                <label for="preference2">Proposition date 2</label><br>
            </div>

            <div class="pref">
                <input type="checkbox" id="preference3" value="option3" name="option3">
                <label for="preference3">Proposition date 3</label><br>
            </div>


            <div class="pref">
                <input type="checkbox" id="preference4" value="option4" name="option4">
                <label for="preference4">Proposition date 4</label><br>
            </div>

            <div class="pref">
                <input type="checkbox" id="preference5" value="option5" name="option5">
                <label for="preference5">Proposition date 5</label><br>
            </div>

            <button type="submit" name="submit" class="button" id="button-submit"><img src="../images/valider.png"
                    onclick="sumbimit_form();"></button>

            </form>
        </div>
    </div>

    <?php require VIEWS . "footer.php" ?>
</body>

</html>