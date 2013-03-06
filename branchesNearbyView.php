
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
			$branchesObjects = $mazayaEngine->getJsonFromUrl($link);
			
			foreach ($branchesObjects as $key => $branchObject) {
		?>
	     <div class="span12">
	     	<?php 
	     	
	     	?>
	     </div><!-- .span4 -->
	     <?php } ?>
         
     </div><!-- .row -->
</div><!-- .container -->
	<?php require_once 'includes/footerIncludes.php'; ?>

 </body>
 </html>