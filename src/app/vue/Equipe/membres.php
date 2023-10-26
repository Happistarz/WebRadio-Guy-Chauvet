<h1 style="display: flex; justify-content: flex-start; font-size: 1.9em;">La Web radio</h1>
<div class="logomembres">
    <img src=<?php echo DATA . "general/logo/typo.png"; ?> alt='typo' class='typo'>
</div>

<div class="desc-web-radio">
    <!-- <h2>Description</h2> -->
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat voluptatum iste nostrum culpa molestiae,
        eveniet repellendus. Dolores, quas. Neque assumenda dolores dolor accusantium reiciendis laudantium debitis
        animi cumque, minima vitae?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur aliquam quae vel minus itaque culpa
        voluptate vero totam inventore, non aliquid nemo optio enim! Nostrum blanditiis error ad dolorum sunt!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium expedita sed ipsam doloremque, minus
        animi soluta debitis a nemo quisquam ab sit pariatur aliquid nostrum praesentium similique officiis.
        Adipisci, maiores.
    </p>
</div>
<h2 style="font-size: 1.9em;margin: 60px 0 20px 0;">Présentation des membres</h2>

<div class="presentation-membres">
    <div class="membres">
        <!-- Récuperent les informations de membres dans la tables équipe -->
        <table class="membre-container">
            <?php

            // prend 2 membres par 2 membres et les affiches
            $membres = array_chunk($membres, 2);

            foreach ($membres as $membre):
                $display = "left";
                ?>
                <tr>
                    <?php foreach ($membre as $m):
                        extract($m);
                        ?>
                        <td class="membres-<?= $display ?>">
                            <div class="membre-image"><img src="<?= DATA . $SRC; ?>" alt="img-Membres"></div>
                            <div class="membre-info">
                                <h3>
                                    <?= $PRENOM . " " . $NOM; ?>
                                </h3>
                                <p>
                                    <?= $DESCRIPTION; ?>
                                </p>
                            </div>
                        </td>
                        <?php
                        $display = "right";
                    endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>