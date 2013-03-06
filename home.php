<?php 
	require_once 'includes/headerIncludes.php';
?>

<!DOCTYPE html>
<html>
 	<?php 
 		require_once("includes/header.php"); 
	?>
 
 <body>
 	<?php 
 		require_once("includes/navBar.php"); 
	?> 
 <div class="container">
       <?php require_once("includes/heroUnit.php"); ?>
 <div class="row">
 	<?php
 		$link = "http://{$base_API_url}/APIPlatform/index.php/{$version}/{$collectionName}?oauth_token={$auth_token}";
		$chains = $mazayaEngine->getJsonFromUrl($link);
		foreach ($chains as $key => $chain) {
	?>
     <div class="span4">
     		<img style="float:left" src="http://<?php echo $base_API_url;?>/APIPlatform/index.php/getImage?image=<?php echo $chain->images[0]->path; ?>&width=70&height=20&gravity=center&oauth_token=66d24abb03fd436ab725d25bd76f33d2"/>
			<a href="/<?php echo $base_Mazaya_dir ?>/redemptionView.php?chains=<?php echo $chain->_id; ?>"><?php echo $chain->name; ?></a>
	      	<div style="clear:both"></div>
     	<hr>
     </div><!-- .span4 -->
     <?php } ?>
         
   </div><!-- .row -->
 </div><!-- .container -->
	
	<?php require_once 'includes/footerIncludes.php'; ?>

 </body>
</html>