<?php 
	require_once("includes/constants.php");
	
	require_once("includes/mazayaEngine.php");
	
	// call the form
	$mazayaEngine = new mazayaEngine($base_API_url);
	// call the extractDataFromUrl function and pass it the URL to get the collection name
	$collectionName = $mazayaEngine->getCollectionFromUrl($_SERVER['REQUEST_URI']);
	$collectionName = ($collectionName == "home.php") ? 'chains' : $collectionName;
	// pagination data
	$countUrl = $getData_URL."/".$collectionName."/count?oauth_token=".$auth_token;
	if(isset($_REQUEST['nameSearchField']))
	{
		$countUrl .= "&op=like&q=". rawurlencode($_REQUEST['nameSearchField']);
	}
	// count the records per given collection
	$countCollectionRecords = $mazayaEngine->getJsonFromUrl($countUrl);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Martin Bean" />
    <title>MazayaNMore&rsquo;s Bootstrap with Ryan Fait&rsquo;s Sticky Footer</title>
    <link rel="stylesheet" href="twitter-bootstrap/docs/assets/css/bootstrap.css" />
    <!-- <style>
        html, body {
            height: 100%;
        }
        footer {
            color: #666;
            background: #222;
            padding: 17px 0 18px 0;
            border-top: 1px solid #000;
        }
        footer a {
            color: #999;
        }
        footer a:hover {
            color: #efefef;
        }
        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -63px;
        }
        .push {
            height: 63px;
        }
        /* not required for sticky footer; just pushes hero down a bit */
        .wrapper > .container {
            padding-top: 60px;
        }
    </style> -->
 </head>
 
 <body>
 	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">MazayaNMore</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Cataloge</a></li>
              <li class="dropdown">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
              	<ul class="dropdown-menu">
                  <li><a href="#bydistrict">By District</a></li>
                  <li><a href="#bybrand">By Brand</a></li>
                  <li><a href="#nearBy">NearBy</a></li>
                </ul>
              </li>
              <li><a href="#Offers">Offers</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
   <?php
	 	$link = "http://{$base_API_url}/APIPlatform/index.php/{$version}/{$collectionName}?&oauth_token={$auth_token}";
		$jsonResult = $mazayaEngine->getJsonFromUrl($link);
	?> 
 <div class="container">
         
         <div class="hero-unit">
         <h1>Awesome responsive layout</h1>
         <p>Hello guys i am a ".hero-unit" and you can use me if you wanna say something important.</p>
         <p><a class="btn btn-primary btn-large">Super important &raquo;</a></p>
         </div><!-- .hero-unit -->
        
 <div class="row">
         <div class="span12 columns">
         	<div class="accordion" id "accordion2">
         		<?php
         			foreach ($jsonResult as $key => $value) {
						 
				?>
         		<div class="accordion-group">
         			<div class="accordion-heading">
         				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $key; ?>">
         					<?php echo $value->name; ?>
         				</a>
         			</div>
         			<div id=<?php echo $key; ?> class="accordion-body collapse" style="height: 0px;">
         				<div class="accordion-inner">
         					<?php var_dump($value); ?>
         				</div>
         			</div>
         		</div>
         		<?php } ?>
         	</div>	
         </div><!-- .span4 -->
         
   </div><!-- .row -->
 </div><!-- .container -->
 	<script src="twitter-bootstrap/docs/assets/js/jquery.js"></script>
    <script src="twitter-bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="twitter-bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
 </body>
</html>