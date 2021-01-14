<?php if ($context->notif) echo $context->notifMsg;
else {
    ?>
    <div class="alert alert-primary">
        <?php
            echo "<b>".count($context->result)."</b> résultats trouvés pour <b>".$context->trajet->depart."</b>-><b>".$context->trajet->arrivee."</b>";
        ?>
    </div>

    <form id="search_list" method="POST">
        <input id="action" type="hidden" name="action" value="reserver">
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
                echo "<tr>\n\t<td>" . $value->trajet->depart . "</td>\n";
                echo "\t<td>" . $value->heuredepart . "h" . "</td>\n";
                echo "\t<td>" . $value->trajet->arrivee . "</td>\n";
                echo "\t<td>" . $value->tarif . "€</td>\n";
                echo "\t<td>" . $value->nbplace . "</td>\n";
                echo "\t<td>" . $value->conducteur->prenom . " " . $value->conducteur->nom . "</td>\n";
                echo "\t<td>" . $value->contraintes . "</td>\n";
                echo "\t<td>";
                if ($context->getSessionAttribute("identifiant") && $value->nbplace > 0 ) {
                    echo "<a><button type=\"submit\" id=\"reservation_button\" name=\"reservation\" class=\"btn btn-outline-success\" value='".$value->id."'>Reserver</button></a>";
                }
                echo "</td>\n</tr>";
            }
            ?>
            </tbody>
        </table>
        </div>
    </form>
<?php }; ?>