<!--<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="wiwiCar.php" role="button">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <button type="button" id="inscription" data-bs-toggle="modal" data-bs-target="#login_modal" class="btn flex-d">Inscription</button>

        <?php
        if($context->getSessionAttribute('identifiant')):
            echo "Bonjour ".$context->getSessionAttribute('identifiant');
        endif;
        ?>
</nav>-->

<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a id="accueil" class="navbar-brand" href="wiwiCar.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php if($context->getSessionAttribute('identifiant')) { ?>
                        <a id="mesReservations" class="nav-link" aria-current="page" href="wiwiCar.php?action=mesReservations">Mes reservations</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if($context->getSessionAttribute('identifiant')) { ?>
                        <a id="mesVoyages" class="nav-link" aria-current="page" href="wiwiCar.php?action4=mesVoyages">Mes voyages</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if($context->getSessionAttribute('identifiant')) { ?>
                        <a id="propVoyage" class="nav-link" aria-current="page" href="wiwiCar.php?action4=propVoyage">Proposer un voyage</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <?php if($context->getSessionAttribute('identifiant')) { ?>
        <span class="navbar-text">
                <?php echo "Bonjour ".$context->getSessionAttribute('identifiant')."  "; ?>
        </span>
            <a class="nav-link" href="wiwiCar.php?action=disconnect"><button type="button" id="disconnect" class="btn flex-d justify-content-end btn-outline-danger">Deconnexion</button></a>
        <?php } else { ?>
            <button type="button" id="inscription" data-bs-toggle="modal" data-bs-target="#login_modal" class="btn flex-d justify-content-end btn-outline-success">Connexion/Inscription</button>
        <?php } ?>
    </div>
</nav>