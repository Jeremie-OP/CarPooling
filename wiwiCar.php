<?php
//nom de l'application
$nameApp = "wiwiCar";

//action par défaut
$action = "index";
$action2 = "search";
$action3 = "result";
$action4 = "inscription";



if(key_exists("action", $_REQUEST))
$action =  $_REQUEST['action'];

require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';

foreach(glob($nameApp.'/model/*.class.php') as $model)
	include_once $model ;   

session_start();

$context = context::getInstance();
$context->init($nameApp);

$view = $context->executeAction($action, $_REQUEST);
$view2 = $context->executeAction($action2, $_REQUEST);
$view3 = $context->executeAction($action3, $_REQUEST);
$view4 = $context->executeAction($action4, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false)
{
	echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
	die;
}
//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE)
{
	$context->setLayout("layout_views");
	$template_view = $nameApp."/view/".$action.$view.".php";
	$template_view2 = $nameApp."/view/".$action2.$view2.".php";
	$template_view3 = $nameApp."/view/".$action3.$view3.".php";
    $template_view4 = $nameApp."/view/".$action4.$view4.".php";
	include($nameApp."/layout/".$context->getLayout().".php");
}

?>