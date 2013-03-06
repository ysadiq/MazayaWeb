
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
			$redemptionObjects = $mazayaEngine->getJsonFromUrl($link);
			foreach ($redemptionObjects as $key => $redemptionObject) {
		?>
	     <div class="span12">
	     	<a><?php echo $redemptionObject->name; ?></a>
		  	<div style="clear:both"></div>
		  	<?php 
		  		//fetch products from tiers
		  		foreach ($redemptionObject->tiers as $tier) {
					  echo $tier->name;
					echo "<br/>"; 
					foreach ($tier->products as $productIds) {
						foreach ($productIds as $productId) {
							$link = "http://{$base_API_url}/APIPlatform/index.php/{$version}/products/{$productId}?&oauth_token={$auth_token}";
							$productObjects = $mazayaEngine->getJsonFromUrl($link);
							foreach ($productObjects as $productObject) {
								echo $productObject->name;
								$productImagePath = explode('www', $productObject->images[0]->path);
								$productImagePath = $productImagePath[1];
								?>
								<img src="http://<?php echo $base_API_url;?>/<?php echo $productImagePath; ?>" />
							<?php }echo "<br/>";
								
						}echo "<br/>";
					}
				  }
		  	?>
	     	<hr>
	     </div><!-- .span4 -->
	     <?php } ?>
         
     </div><!-- .row -->
</div><!-- .container -->
	<?php require_once 'includes/footerIncludes.php'; ?>

 </body>
 </html>