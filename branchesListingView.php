
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
			
			//check if request is by_brand or by_district
			$collectionParams = explode('&', $collectionParams);
			$byBrand = array_search('groupBy=chainId', $collectionParams);
			$byDistrict = array_search('groupBy=address.city', $collectionParams);
			
			foreach ($branchesObjects as $key => $branchObject) {
		?>
	     <div class="span12">
	     	<?php 
	     	if($byDistrict){
				if($branchObject->address->city){
					echo $branchObject->address->city->name;
				}
				else {
					continue;
				}
			}
	     	elseif($byBrand)
			{
				if($branchObject->chainId){
					echo $branchObject->chainId->chainDisplayName;
				}
				else {
					continue;
				}
			}
				
     		?>
	     	<?php 
	     		$uniqueDName = array();
				foreach ($branchObject->items as $branch) {
					if(!in_array($branch->address->district->name, $uniqueDName)){
						echo "</br>";
						array_push($uniqueDName, $branch->address->district->name);
						?>
						<a href="/<?php echo $base_Mazaya_dir ?>/branchView.php?limit=all&address.district=<?php echo $branch->address->district->_id; ?>"><?php echo $branch->address->district->name;?></a>
					<?php }
				}
	     	?>
	     </div><!-- .span4 -->
	     <?php } ?>
         
     </div><!-- .row -->
</div><!-- .container -->
	<?php require_once 'includes/footerIncludes.php'; ?>

 </body>
 </html>