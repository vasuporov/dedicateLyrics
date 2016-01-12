                <!DOCTYPE html>
<html>
<head>
<title><?php global $pageTitle; echo $pageTitle;?></title>



 <?php
 global $metatags;
   echo $metatags;
 ?>



<meta name="p:domain_verify" content="24735b05a6fbab3e54d49c5c139a95e6"/><link href='https://fonts.googleapis.com/css?family=Dancing+Script:700|Oswald' rel='stylesheet' type='text/css' >
<link href="<?php echo $mainUrl;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $mainUrl;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<!-- js -->
<script src="<?php echo $mainUrl;?>js/jquery.min.js"></script>
<!-- //js -->
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php global $keywords; echo $keywords;?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->

<script type="text/javascript" src="<?php echo $mainUrl;?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $mainUrl;?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!--animated-css-->
<link rel="icon" type="img/png" href="<?php echo $mainUrl;?>images/minilogo.png">
<link href="<?php echo $mainUrl;?>css/animate.css" rel="stylesheet" type="text/css" media="all">

<script src="<?php echo $mainUrl;?>js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
	
<body>
<!-- header -->
	<div class="header-nav">
	<div class="container">
		<div class="logo wow fadeInLeft" data-wow-delay="0.5s">
			<a href="<?php echo $mainUrl;?>"><img src="<?php echo $mainUrl;?>images/mainlogo.png"  alt="Dedicate hindi lyrics"/><img src="<?php echo $mainUrl;?>images/logo.png" alt="Dedicate hindi Lyrics " /></a>
		</div>
		<div class="logo-right">
			<span class="menu"><img src="<?php echo $mainUrl;?>images/menu.png" alt=" "/></span>
							<ul class="nav1">
								<li><a href="<?php echo $mainUrl;?>">Home</a></li>
								<li><a href="<?php echo $mainUrl;?>dedicationWall.php">Dedications</a></li>
								<li><a href="<?php echo $mainUrl;?>latest-albums.htm">Latest</a></li>
								<li><a href="<?php echo $mainUrl;?>hit-songs.htm">Top Hits</a></li>
							</ul>
							


		</div>
		<div class="clearfix"> </div>
				<!-- script for menu -->
					<script> 
						$( "span.menu" ).click(function() {
						$( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						});
						});
					</script>
				<!-- //script for menu -->
	</div>
	

	</div>
	
	
	<!-- //header-->


<div class="sitebackground"> <!--100% width for background color of site end just before footer-->	


	<div class="header-info wow fadeInUp" data-wow-delay="0.5s">
	<div class="container">

		<form action="<?php echo $mainUrl;?>" method="get">
			<input type="text" placeholder="Search songs , movies , artists" required=" " name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>">
			<div class="up">
					<input type="submit" value="Find" >

			</div>
			 <br>Advance Filter : <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-song'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?>  name="f-song">Songs</input>
			                      <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-artist'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?> name="f-artist">Artist</input>
			                      <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-album'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?> name="f-album">Album</input>

		</form>
	</div>
	</div>
	

<!-- //header-->



