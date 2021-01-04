<div class="w3-bar w3-dark-grey w3-top">
    <a href="#" class="w3-bar-item w3-button w3-mobile">Index</a>
    <a href="#" class="w3-bar-item w3-button w3-mobile">Ajouter</a>
    <?php if (!isset($_SESSION['user'])){ ?> <a href="#" class="w3-bar-item w3-button w3-mobile w3-right w3-green">Connexion</a>
    <?php } else { ?> <a href="#" class="w3-bar-item w3-button w3-mobile w3-right w3-red">Deconnexion</a>
    <?php } ?>
</div>

<?php
