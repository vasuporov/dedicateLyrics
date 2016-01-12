<!DOCTYPE html>
<html>
<head>
<title>Dedication Wall of the week | DedicateLyrics.com</title>
<link href='https://fonts.googleapis.com/css?family=Dancing+Script:700|Oswald' rel='stylesheet' type='text/css' >
<link href="<?php global $mainUrl; echo $mainUrl;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $mainUrl;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo $mainUrl;?>js/jquery.min.js"></script>
<!-- //js -->

<link type="text/css" rel="stylesheet" href="<?php echo $mainUrl;?>css/materialize.min.css"  media="screen,projection"/>


<link rel="icon" type="img/png" href="<?php echo $mainUrl;?>images/minilogo.png">

<!-- for-mobile-apps -->
<meta property="og:url" content="http://www.dedicatelyrics.com/dedicationWall.php" />
<meta property="og:description" content="This is the dedication wall of the dedicatelyrics.com , all the dedication done on the website are displayed here for the whole week. So take a look where is your dedication on the dedication wall. " />
 <meta property="og:title" content="Dedication wall of the week | DedicateLyrics.com"/>
 <meta property="og:image" content="http://www.dedicatelyrics.com/images/fbdl.png"/>
 <meta name="description" content="This is the dedication wall of the dedicatelyrics.com , all the dedication done on the website are displayed here for the whole week. So take a look where is your dedication on the dedication wall.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dedicate , lyrics , top , dedications , wall , of , week , dedicatelyrics , dedicatelyrics.com" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo $mainUrl;?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $mainUrl;?>js/easing.js"></script>
<script>
          $(window).load(function() {
            $("#loader").hide();
                  $("#cards").show();
          /*boxes = $('.card');
  maxHeight = Math.max.apply(
  Math, boxes.map(function() {
      return $(this).height();
  }).get());
  boxes.height(maxHeight); */   });

  

      </script>
      

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
<link href="<?php echo $mainUrl;?>css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo $mainUrl;?>js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->



<script type="text/javascript" src="<?php echo $mainUrl;?>js/jquery2.js"></script>
      <script type="text/javascript" src="<?php echo $mainUrl;?>js/materialize.min.js"></script>


      <style>
      pre {
        //font-family: 'Pacifico', cursive;
        font-family: 'Dancing Script', cursive;
        font-size: 20px;
        line-height:2em;
        background:none;
        overflow-x:hidden;
        overflow-y:hidden;
      }
      .card-title {
      font-family: 'Oswald', sans-serif;
      		position: relative;
	width: 50%;
	font-size: 1em;
	font-weight: bold;
	padding: 6px 10px 6px 70px;
	margin: 0px 10px 5px -70px;
	color: #555;
	background-color: #999;
	text-shadow: 0px 1px 2px #bbb;
	-webkit-box-shadow: 0px 2px 4px #000;
	-moz-box-shadow: 0px 2px 4px #000;
	box-shadow: 0px 2px 4px #000;
      }


       .card:hover{
           box-shadow: 0 5px  5px 0 rgba(0,0,0,0.16),5px 10px 10px 5px rgba(0,0,0,0.12);

       }

    </style>




</head>
	
<body>
<!-- header -->
	<div class="header-nav">
	<div class="container">
		<div class="logo wow fadeInLeft" data-wow-delay="0.5s">
			<a href="<?php echo $mainUrl;?>"><img src="<?php echo $mainUrl;?>images/mainlogo.png"/ alt="Dedicate hindi lyrics."><img src="<?php echo $mainUrl;?>images/logo.png" alt="Dedicate hindi lyrics. " /></a>
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
				
				
				<script type="text/javascript" src="ajaxLikes.js"></script>
	</div>


	</div>


<!-- //header-->


<!-- for left right arrows href -->
          <?php
                 $total = getTotalNumberOfDedicationOfWeek();
                 $page=1;
                      if(isset($_GET['p']))
                       {
                         $page = $_GET['p'];
                       }

                 $leftHref = false;
                 $rightHref = false;

                 if($page>1)
                   {
                     $leftHref = 'dedicationWall.php?p='.($page-1);
                     }
                 if($total>$page*6)
                   {
                     $rightHref =  'dedicationWall.php?p='.($page+1);
                    }

               ?>
 <!-- for left right arrows href -->


<!-- main body-->
<div class="sitebackground"> <!--100% width for background color of site end just before footer-->


         <h1 align="center">  <span class="   indigo lighten-5 white-text" style="font-family: 'Oswald', sans-serif;
        font-size: 40px;
        line-height:2em;
        background:none;">&nbsp;&nbsp; DEDICATION WALL OF THE WEEK &nbsp;&nbsp;</span>   </h1>
        


          <div id="loader">

                              <br><br><br><br>
                             <img src="<?php echo $mainUrl;?>images/musicalloader.gif"/><br>
                             Loading...
                             <br><br> <br><br>
                    
              </div>
              

          <div id="cards" style="display: none;  ">


            <div style="width:4%; position:fixed; left:-1px; top:40%; ">
              <?php
                 global $leftHref;
                 if($leftHref)
                   echo '<a href='.$mainUrl.$leftHref.'><button class="viewAll" style="height:2em; font-size:2em;" >  < &nbsp; </button></a>';
              
              ?>
            </div>


             <div class="row" style="width:90%;  "  >

                    <?php

                      global $page;
                      $result = getDedicationsOfWeek($page);


                        if((!$result) || mysqli_num_rows($result)==0)
                           {
                             echo '<div align="center"><br><br><br><br><br><br>None yet! Be the first one to dedicate. </div>';
                           }
                        else 
                        {
                          $count=0;
                          $totalDedications = $result->num_rows;
                          $colMdTagValue='4';
                          if($totalDedications <= 2)
                           {
                             $colMdTagValue = '10 col-md-offset-1';
                           }
                          else  if($totalDedications <= 4)
                           {
                             $colMdTagValue = '6';
                           }
                           else  if($totalDedications <= 6)
                           {
                             $colMdTagValue = '4';
                           }

                          while($row = $result->fetch_assoc())
                           {
                             
                            if($count%2==0)
                               echo '<div class="col-sm-12 col-md-'.$colMdTagValue.' col-xs-12">';



                             $ps = trim($row["personalMessage"]);
                             
                             if($ps!="")
                               $ps = "PS : ".$row['personalMessage'];

                             //print_r($row);
                             
                             echo '
                      <div class="card  '.$row['cardColor'].' wow bounceIn" data-wow-delay="0.5s" >
                        <div class="card-content black-text">
                          <span class="card-title  '.explode(" ",trim($row['cardColor']))[0].' " >'.$row['dedicationTo'].'</span>
                          <pre align="center"><font size="26px;">"</font>'.$row['dedicationLyrics'].'<font size="10px;">."</font></pre>
                          <span style="float:right;" >-'.$row['dedicationBy'].'</span>
                        </div>
                        <div class="card-action" align="center" >

                          <span id="likes'.$row['dedicationId'].'" class=" black-text badge alert-success" >'.$row['likes'].' Likes</span>
                          <button class="viewAll" style="text-decoration: none;" id="'.$row['dedicationId'].'"  onclick="process(this)">&nbsp;Like&nbsp;</button>
                          <a href="'.$mainUrl.$row['dedicationId'].'/sharededication.htm"><button type="button"  class="viewAll ">Share</button></a>
                          <br>
                          <span class="white-text">'.$ps.'</span>
                           <div class="white-text" style="font:bold;" id="likesError'.$row['dedicationId'].'"> </div>

                        </div>
                      </div>

                                    ';
                                    
                            if($count%2!=0)
                              echo '</div>';
                              
                              $count++;

                           }

                            if($count%2!=0)
                           echo '</div>';
                        }





                    ?>



          </div> 

          <div style="width:4%; position:fixed; right:0; top:40%; ">
               <?php
                 global $rightHref;
                 if($rightHref)
                   echo ' <a href="'.$mainUrl.$rightHref.'" ><button class="viewAll" style="height:2em; font-size:2em; float:right;">  > &nbsp; </button></a>';

              ?>

            </div>



    </div>






        <Br><br><br>
        <br><br>

