<!DOCTYPE html>
<html>
<head>
<title><?php global $pageTitle; echo $pageTitle;?></title>



 <?php
 global $metatags;
   echo $metatags;
 ?>



 <meta name="p:domain_verify" content="24735b05a6fbab3e54d49c5c139a95e6"/>
<link href='https://fonts.googleapis.com/css?family=Dancing+Script:700|Oswald' rel='stylesheet' type='text/css' >
<link href="<?php echo $mainUrl;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $mainUrl;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<!-- js -->
<script src="<?php echo $mainUrl;?>js/jquery.min.js"></script>

<?php
 global $extraStuff;
 echo $extraStuff;
?>

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
			<a href="<?php echo $mainUrl;?>" ><img src="<?php echo $mainUrl;?>images/mainlogo.png" alt="Dedicate hindi lyrics"/><img src="<?php echo $mainUrl;?>images/logo.png" alt="Dedicate hindi lyrics" /></a>
		</div>
		<div class="logo-right">
			<span class="menu"><img src="<?php echo $mainUrl;?>images/menu.png" alt="Main menu"/></span>
							<ul class="nav1">
								<li><a href="<?php echo $mainUrl;?>" title="Home page">Home</a></li>
								<li><a href="<?php echo $mainUrl;?>dedicationWall.php" title="Dedication wall">Dedications</a></li>
								<li><a href="<?php echo $mainUrl;?>latest-albums.htm"  title="Latest Albums">Latest</a></li>
								<li><a href="<?php echo $mainUrl;?>hit-songs.htm"      title="Top Hits">Top Hits</a></li>
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
	<div class="theme" style="background-image: url('<?php global $theme; echo $theme;?>'); background-position: left center; background-repeat: no-repeat; width:100%;border="0"; background-size: cover;">

	<div class="container">
	          Browse by album name :   <br />


          <ul class="pagination pagination-md" align="center">
                  <li><a href="<?php echo $mainUrl;?>?pagination=A">A</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=B">B</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=C">C</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=D">D</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=E">E</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=F">F</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=G">G</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=H">H</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=I">I</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=J">J</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=K">K</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=L">L</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=M">M</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=N">N</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=O">O</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=P">P</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=Q">Q</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=R">R</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=S">S</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=T">T</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=U">U</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=V">V</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=W">W</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=X">X</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=Y">Y</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=Z">Z</a></li>
                  <li><a href="<?php echo $mainUrl;?>?pagination=0">0-9</a></li>
                </ul>

		<h3>Search lyrics from our lighter and faster portal!</h3>
		<p>All the latest bollywood songs being pushed into our database almost daily.</p> (English song's lyrics coming soon.)
		<form action="<?php echo $mainUrl;?>" method="get">
			<input type="text" placeholder="Search by lyrics or song, movie, artist name" required=" " name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>">
			<div class="up">
					<input type="submit" value="Find" >

			</div>
			 <br>Advance Filter : <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-song'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?>  name="f-song">Songs</input>
			                      <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-artist'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?> name="f-artist">Artist</input>
			                      <input type="checkbox" selected="selected" <?php if(isset($_GET['search'])) { if(isset($_GET['f-album'])) echo 'checked="checked"';  }else echo 'checked="checked"'; ?> name="f-album">Album</input>

		</form>
	</div>
	</div><!--container-->
</div> <!--theme-->
	

<!-- //header-->

