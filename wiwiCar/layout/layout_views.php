<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

<?php
if($context->getSessionAttribute('user_id')):
    echo $context->getSessionAttribute('user_id')." est connecte";
endif;
?>

<div id="page" class="container-fluid">
    <?php if($context->error): ?>
        <div id="flash_error" class="container-fluid bg-danger text-dark">
            <?php echo $context->error ?>
        </div>
    <?php endif; ?>

    <div id="notif" class="container text-white" style="display: none"></div>

    <div id="page_maincontent" class="container" style="background-color:#3399ff">
        <div class="row">
            <div id="access" class="col" style="display: none">
                <?php include($template_view4); ?>
            </div>
        </div>
        <div class="row">
            <div id="search" class="col-md">
                <?php include($template_view2); ?>
            </div>
            <div id="result" class="col-md p-0 bg-dark">
                <?php include($template_view3); ?>
            </div>
        </div>
    </div>
</div>

</body>

</html>
