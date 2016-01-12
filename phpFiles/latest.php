

<!-- WRAP-->
<div class="wrap">


<!-- container -->
   <div class="container">
	<div class="col-md-8">
	  <h1>Latest Albums  </h1>
		<div class="bottom">

                 <?php
                 
                  $allAlbums =  getAllLatestAlbums();
                  $count=0;
                  while($album = $allAlbums->fetch_assoc())
                           {
                              $count++;
                          echo '<div class="col-md-6 posts ">
                            <a href="'.$mainUrl.$album['AlbumId'].'/'.str_replace(' ','-',$album['AlbumName']).'.htm" title="Check out the lyrics of songs of the album '.$album['AlbumName'].' ">
                              <div class="col-md-4 wow bounceIn" data-wow-delay="0.3s">
                                  <img src="'.$mainUrl.$album['AlbumImage'].'" alt="lyrics from the movie '.$album['AlbumName'].'-Movie-album"  /> <br><br>
                              </div>
          
                              <div class="col-md-7">
                                  <strong> Movie/Album : </strong>'.$album['AlbumName'].'<br>
                                  <strong> Description : </strong><p>Check out the lyrics of songs from the album '.$album['AlbumName'].' </p> <br>

                              </div>
                             </a>
                           </div>

                           ';
                           
                           if($count%2==0)
                               echo '<div class="clearfix"> </div>';
                           
                           }

                 ?>



		  <Br><Br><br><br>
		</div>
                <!-- bottom -->
	 </div>
  <!-- col-md-9-->
	 
	 
          <?php @require('rightSidebar.php');?>

       </div>
 <!-- ENDS container -->
 




 </div>
 <!-- ENDS WRAP-->
