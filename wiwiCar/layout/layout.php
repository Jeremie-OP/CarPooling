<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       <link rel="stylesheet" href="css/main.css">
   
    <title>CarPooling</title>
  </head>

  <header>
      <div class="container p-0" id="banner">
          <img src="images/header_img.png" class="img-fluid" alt="Une mobilité responsable">
          <img src="images/header_logo.png" class="rounded img-fluid float-left" alt="CERIcar" id="logo">
      </div>
  </header>

  <body>
    <?php if($context->getSessionAttribute('user_id')): ?>
	  <?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
    <?php endif; ?>

    <div id="page" class="container-fluid">
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
      <div id="page_maincontent" class="container" style="background-color:#3399ff">
          <?php include($template_view); ?>
      </div>
    </div>
      

  </body>

</html>
