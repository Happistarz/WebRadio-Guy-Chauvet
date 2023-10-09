<?php
$NOM = "je trouve pas ";
$image = DATA . 'rubrique/' . $NOM . '.png';
$image2 = DATA . 'rubrique/image2.png';
$titre = 'La Web Radio';

echo '<div class="title-emi">';
echo '<h2>' . $titre . '</h2>';
echo '</div>';

echo '<img src="' . $image . '" alt="image" class="emi-marg" />';


echo '<p class="emi-marg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisi ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>';

echo '<div style="float: right;">';
    echo '<img src="' . $image2 . '" alt="image" />';
echo '</div>';

echo '<div class="title-emi">';
echo '<h2>Le lycée guy Chauvet</h2>';
echo '</div>';

echo '<p class="emi-marg"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisi ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>';
?>