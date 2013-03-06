<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/<?php echo $base_Mazaya_dir;?>/home.php">MazayaNMore</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/<?php echo $base_Mazaya_dir;?>/home.php">Cataloge</a></li>
              <li class="dropdown">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Branches <b class="caret"></b></a>
              	<ul class="dropdown-menu">
                  <li><a href="/<?php echo $base_Mazaya_dir;?>/branchesListingView.php?limit=all&groupBy=address.city&sort=address.city.weight&dir=desc&definition=address.city,address.district">By District</a></li>
                  <li><a href="/<?php echo $base_Mazaya_dir;?>/branchesListingView.php?limit=all&groupBy=chainId&sort=chainId.weight&dir=desc&definition=chainId,name,address.street,address.district">By Brand</a></li>
                  <li><a href="/<?php echo $base_Mazaya_dir;?>/branchesNearbyView.php?sort=createdAt&dir=desc">NearBy</a></li>
                </ul>
              </li>
              <li><a href="/<?php echo $base_Mazaya_dir;?>/offersView.php">Offers</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>