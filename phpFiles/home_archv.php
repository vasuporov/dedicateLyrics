


<?php
@require('cardRelatedStuff.php');
?>


<style>
.carousel-inner > .item  {
      width: 100%;
      margin: auto;
  }

  </style>

<!-- WRAP-->
<div class="wrap">





<!-- single -->
   <div class="container">
	<div class="col-md-8">
	  <h1>TOP DEDICATIONS OF WEEK</h1>
		   <div class="bottom">

                        <div id="loader">
                              <center>
                                        <br><br><br><br>
                                       <img src="<?php echo $mainUrl;?>images/musicalloader.gif"/><br>
                                       Loading...
                                       <br><br> <br><br>
                              </center>
                        </div>

                       <div id="cards" style="display: none;">

                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">


                                  <?php

                                        $result = getTopDedicationsOfWeek();
                                        $count=0;

                                          if(!$result || mysqli_num_rows($result)==0)
                                             {
                                               echo '<center><br><br><br>None yet! Be the first one to dedicate.<br/> <br/><br/></center>';
                                             }
                                          else
                                          {
                                            while( ($row = $result->fetch_assoc() )&& $count<3)
                                             {

                                               $brCount = substr_count($row['dedicationLyrics'],"<br />");
                                               $brFillers = '';

                                               while($brCount<3)
                                                {
                                                  $brFillers ='<br />'.$brFillers.'<br />';
                                                  $brCount++;
                                                }

                                              if($count == 0)
                                                {
                                                 echo ' <div class="item active">';
                                                }
                                              else
                                                {
                                                 echo ' <div class="item ">';
                                                }


                                               $count++;
                                               $ps = trim($row["personalMessage"]);

                                               if($ps!="")
                                                 $ps = "PS : ".$row['personalMessage']."<br>";

                                               //print_r($row);

                                               echo '

                                        <div class="card  '.$row['cardColor'].' ">
                                          <div class="card-content black-text">
                                            <span class="card-title  '.explode(" ",trim($row['cardColor']))[0].' " >'.$row['dedicationTo'].'</span>
                                            <pre align="center"><font size="26px;">"</font>'.$row['dedicationLyrics'].'<font size="10px;">."</font></pre>
                                            <span style="float:right;" >-'.$row['dedicationBy'].'</span>
                                          </div>
                                          <div class="card-action" > '.$brFillers .'
                                            <center>
                                            <span id="likes'.$row['dedicationId'].'" class=" black-text badge alert-success" >'.$row['likes']. ' Likes</span>
                                            <button class="viewAll" style="text-decoration: none;" id="'.$row['dedicationId'].'"  onclick="process(this)">&nbsp;Like&nbsp;</button>
                                            <a href="'.$mainUrl.$row['dedicationId'].'/sharededication.htm"><button type="button"  class="viewAll ">Share</button></a>
                                            <br>
                                            <span class="white-text">'.$ps.'</span>
                                            <div class="white-text" style="font:bold;" id="likesError'.$row['dedicationId'].'"> </div>
                                                <br>
                                            </center>
                                          </div>
                                        </div>

                                                      ';

                                                      echo "</div>";
                                             }


                                          }
                                      ?>


                              </div>

                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                        </div>
                           <div class="clearfix">
                        <a href="<?php echo $mainUrl;?>dedicationWall.php" title="check out the dedication wall of this week."><span class="viewAll" style="float:right; margin-right:15px;"> &nbsp;View All&nbsp; </span></a>
                  </div>
                       </div>

                  </div>



                    <h1>Latest Albums </h1>
		<div class="bottom">

                         <?php
                          $latestAlbums = getLatestAlbumsForHomePage();
                          while($album = $latestAlbums->fetch_assoc())
                           {
                             echo '

                             <div class="bottom-grid wow fadeInUp" data-wow-delay="0.5s">
                             <a href="'.$mainUrl.$album['AlbumId'].'/'.str_replace(' ','-',$album['AlbumName']).'.htm" title="Check out the lyrics of songs of the album '.$album['AlbumName'].' ">
				<img src="'.$mainUrl.$album['AlbumImage'].'" alt="lyrics from the movie '.$album['AlbumName'].'" />
				 </a>
			       </div>

                               ';
                           }

                         ?>



			<div class="clearfix"> </div>
                        <a href="<?php echo $mainUrl;?>latest-albums.htm" title="check out all latest bollywood lyrics."><span class="viewAll" style="float:right; margin-right:15px;"> &nbsp;View All&nbsp; </span></a>
                    </div>


	
                   <br><br><br>

         </div>

        <?php @require('rightSidebar.php');?>

        </div>
 <!-- ENDS single -->


 </div>
 <!-- ENDS WRAP-->
