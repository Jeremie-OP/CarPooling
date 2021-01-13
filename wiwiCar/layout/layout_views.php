<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/Ajax.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>CarPooling</title>

</head>

<header>
    <div class="container p-0" id="banner">
        <img src="image/header_img.png" class="img-fluid" alt="Une mobilité responsable">
    </div>
    <div class="container p-0 bg-white" id="menu">
        <?php include("wiwiCar/view/menu.php"); ?>
    </div>
</header>

<body>

<div id="page" class="container-fluid">
    <?php if($context->error): ?>
        <div id="flash_error" class="container-fluid bg-danger text-dark">
            <?php echo $context->error ?>
        </div>
    <?php endif; ?>

    <div id="notif" class="container text-white" style="display: none"></div>

    <div id="login_modal" class="modal fade" tabindex="-1" aria-labelledby="login_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="model-header">
                    <h5 class="modal-title" id="login_modal_label">&nbsp; Connexion / Inscription<button type="button" class="btn btn-dark float-right" data-bs-dismiss="modal" aria-label="Close">Fermer</button></h5>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="login_signup_tab" role="tablist">
                        <li class="nav-item" role="login">
                            <a class="nav-link active" id="login_tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Connexion</a>
                        </li>
                        <li class="nav-item" role="signup">
                            <a class="nav-link" id="signup_tab" data-bs-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Inscription</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="login_signup_tab_content">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab"><?php include("wiwiCar/view/connexionSuccess.php"); ?></div>
                        <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab"><?php include("wiwiCar/view/inscriptionSuccess.php"); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ajax" class="container" style="background-color:#3399ff"></div>
    <div id="page_maincontent" class="container" style="background-color:#3399ff">

        <?php if (isset($template_view4)) include($template_view4);
        else { ?>


        <div id="top" class="row">
            <div id="access" class="col">
                <?php include($template_view3); ?>
            </div>
        </div>
        <div id="bot" class="row">
            <div id="search" class="col-md">
                <?php include($template_view2); ?>
            </div>
            <div id="result" class="col-md bg-dark">
                <?php include($template_view); ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

</body>

</html>
