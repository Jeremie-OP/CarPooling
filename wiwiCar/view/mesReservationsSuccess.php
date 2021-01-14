<?php if ($context->notif) echo $context->notifMsg;
else {
    ?>
    <div class="table-responsive">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col" colspan="2">Départ</th>
            <th scope="col">Arrivée</th>
            <th scope="col">Tarif</th>
            <th scope="col">Places</th>
            <th scope="col">Conducteur</th>
            <th scope="col">Contraintes</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($context->result as $value) {
            echo "<tr>\n\t<td>" . $value->voyage->trajet->depart . "</td>\n";
            echo "\t<td>" . $value->voyage->heuredepart . "h" . "</td>\n";
            echo "\t<td>" . $value->voyage->trajet->arrivee . "</td>\n";
            echo "\t<td>" . $value->voyage->tarif . "€</td>\n";
            echo "\t<td>" . $value->voyage->nbplace . "</td>\n";
            echo "\t<td>" . $value->voyage->conducteur->prenom . " " . $value->voyage->conducteur->nom . "</td>\n";
            echo "\t<td>" . $value->voyage->contraintes . "</td>\n</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
<?php }; ?>