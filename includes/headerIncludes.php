<?php 
	require_once("includes/constants.php");
	
	require_once("includes/mazayaEngine.php");
	
	// call the engine
	$mazayaEngine = new mazayaEngine($base_API_url);
	// call the extractDataFromUrl function and pass it the URL to get the collection name
	$collectionData = $mazayaEngine->getCollectionFromUrl($_SERVER['REQUEST_URI']);
	$collectionData = explode('?', $collectionData);
	$collectionParams = $collectionData[1];
	$collectionName = $collectionData[0];
	
	if($collectionName == "home.php"){
		$collectionName = 'chains';
	}
	elseif($collectionName == "redemptionView.php"){
		$collectionName = "redemptionCatalog";
	}
	elseif($collectionName == "branches_by_district.php" || $collectionName == "branchView.php"){
		$collectionName = "stores";
	}
	// pagination data
	$countUrl = $getData_URL."/".$collectionName."/count?oauth_token=".$auth_token;
	if(isset($_REQUEST['nameSearchField']))
	{
		$countUrl .= "&op=like&q=". rawurlencode($_REQUEST['nameSearchField']);
	}
	// count the records per given collection
	$countCollectionRecords = $mazayaEngine->getJsonFromUrl($countUrl);
	
?>

<link rel="stylesheet" href="twitter-bootstrap/docs/assets/css/bootstrap.css" />