
<?php require_once 'includes/headerIncludes.php'; ?>


<!DOCTYPE html>
<html>
 
 	<?php 	require_once("includes/header.php"); ?>
 
 <body>
 	<?php require_once("includes/navBar.php"); ?>
  
 <div class="container">
         
    <?php require_once("includes/heroUnit.php");?>
	<div class="row">
	 	<?php
	 		$link = "http://{$base_API_url}/APIPlatform/index.php/{$version}/{$collectionName}?oauth_token={$auth_token}&{$collectionParams}";
			$notificationsObjects = $mazayaEngine->getJsonFromUrl($link);
			foreach ($notificationsObjects as $notificationObject) {
		?>
	     <div class="span12">
	     	<?php 
	     		echo $notificationObject->data->alert;
				$notificationimagePath = explode('www', $notificationObject->images[0]->path);
				$notificationimagePath = $notificationimagePath[1];
	     	?>
	     	<img src="http://<?php echo $base_API_url;?>/<?php echo $notificationimagePath;?>" />
	     </div><!-- .span4 -->
	     <?php } ?>
         
     </div><!-- .row -->
</div><!-- .container -->
	<?php require_once 'includes/footerIncludes.php'; ?>

 </body>
 </html>