<!DOCTYPE html>
<html>
<head>
<title><?php global $title; echo $title;?></title>
<link href="<?php echo $mainUrl; ?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo $mainUrl; ?>js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo $mainUrl; ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

<?php
 global $metatags;
   echo $metatags;
 ?>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- for bootstrap working -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- //for bootstrap working -->

<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="icon" type="img/png" href="<?php echo $mainUrl;?>images/minilogo.png">

<script src="<?php echo $mainUrl; ?>js/responsiveslides.min.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		  });
		});
	</script>
	<script type="text/javascript" src="<?php echo $mainUrl; ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $mainUrl; ?>js/easing.js"></script>
<script src="<?php echo $mainUrl;?>js/wow.min.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
<body>
	<!-- header-section-starts-here -->
	<!--<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="top-menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="privacy-policy.html">Privacy Policy</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>


	</div>-->
	
 	   <div class="header-nav ">
 	      <div class="wrap2">
          		<div class="logo2 wow fadeInLeft" data-wow-delay="0.5s">
          			<a href="<?php echo $mainUrl2;?>" ><img src="<?php echo $mainUrl2;?>images/mainlogo.png" alt="Bolywood updates "/><img src="<?php echo $mainUrl2;?>images/logo.png" alt="Dedicate lyrics's blog to stay updated with the bollywood" /></a>
          		</div>
          		
          	
                  

          		<div class="logo-right " >

          			<span class="menu"><img src="<?php echo $mainUrl2;?>images/menu.png" alt="Main menu"/></span>
          							<ul class="nav1">
          								<li><a href="<?php echo $mainUrl;?>" title="Home page">Home</a></li>
          								<li><a href="<?php echo $mainUrl;?>bollywood-gossips" title="Stay updated with all the rumors and bollywood gossips.">Gossips</a></li>
          								<li><a href="<?php echo $mainUrl;?>bollywood-movies"  title="Updates of all the latest and upcoming movies of bollywood.">Movies</a></li>
          								<li><a href="<?php echo $mainUrl;?>bollywood-music"      title="Always stay ahead of everyone, get updates of all the latest bollywood music here.">Music</a></li>
          								<li><a href="<?php echo $mainUrl;?>zingo-post"      title="This is something special here you will find articles which worth reading.">Zingo</a></li>
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
	

	<!-- header-section-ends-here -->