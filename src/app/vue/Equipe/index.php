<?php
// Déclaration des variables
$NOM = "je trouve pas "; // Nom de l'image
$image = DATA . 'rubrique/' . $NOM . '.png'; // Chemin vers l'image
$image2 = DATA . 'rubrique/image2.png'; // Chemin vers la deuxième image
$titre = 'La Web Radio'; // Titre de la page

// Affichage du titre
echo '<div class="title-emi">';
echo '<h2>' . $titre . '</h2>';
echo '</div>';

// Affichage de la première image
echo '<img src="' . $image . '" alt="image" class="emi-marg" />'; // La classe "emi-marg" permet d'ajouter une marge de 2% à l'image

// Affichage du premier paragraphe
echo '<p class="emi-marg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisi ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>';

// Affichage de la deuxième image
echo '<div style="float: right;">';
echo '<img src="' . $image2 . '" alt="image" />';
echo '</div>';

// Affichage du titre
echo '<div class="title-emi">';
echo '<h2>Le lycée guy Chauvet</h2>';
echo '</div>';

// Affichage du deuxième paragraphe
echo '<p class="emi-marg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisi ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>';
?>
