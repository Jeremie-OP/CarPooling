Voila le resultat du test:<br>
<?php
    foreach ($context->result as $value) {
        echo "Voyageur : ";
        echo $value->voyageur->nom, "&nbsp";
        echo $value->voyageur->prenom, "&nbsp_&nbsp";
        echo "Trajet : ";
        echo $value->voyage->trajet->depart, "-";
        echo $value->voyage->trajet->arrivee, "&nbsp";
        echo $value->voyage->trajet->distance, " km - ";
        echo $value->voyage->heuredepart, "h _ ";
        echo "Conducteur : ";
        echo $value->voyage->conducteur->nom, "&nbsp";
        echo $value->voyage->conducteur->prenom, "&nbsp_&nbsp";
        echo "Tarif : ";
        echo $value->voyage->tarif, "&nbsp";
        echo "Contraintes : ";
        echo $value->voyage->contraintes, "</br>";
    }
?>