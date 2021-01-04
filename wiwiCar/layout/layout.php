<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
   
    <title>
     Ton appli !
    </title>
   
  </head>

  <body>
    <h2>Super c'est ton appli wiwiCar ! </h2>
    <?php if($context->getSessionAttribute('user_id')): ?>
	  <?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
    <?php endif; ?>

    <div id="page">
      <?php if($context->error): ?>
      	<div id="flash_error" class="error">
        	<?php echo " $context->error !!!!!" ?>
      	</div>
      <?php endif; ?>

      <?php if($context->notif): ?>
        <div id="bar_notif" class="w3-display-topmiddle w3-container w3-red">
          <?php echo " $context->notif !!!!!" ?>
        </div>
      <?php endif; ?>

      <div id="page_maincontent">	
      	<?php include($template_view); ?>
      </div>
    </div>
      

  </body>

</html>
