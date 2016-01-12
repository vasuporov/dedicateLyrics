

<!-- WRAP-->
<div class="wrap">


<!-- container -->
      <div class="container">
	<div class="col-md-8">
	  <h1>Albums starting with "<?php if ($_GET['pagination']=='0') echo '0-9'; else echo $_GET['pagination'];?>" </h1>
		<div class="bottom" align="center">

                 <?php
                  global $paginationValue;
                  $allAlbums =  getAlbumsStartingWith($paginationValue);
                  $count = 1;
                   
                  if($allAlbums == NULL or mysqli_num_rows($allAlbums) == 0)
                     {
                       echo '<br><br> Not found! <br><br>';
                     }
                  else
                    {
                     while($album = $allAlbums->fetch_assoc())
                      {
                         if($count%2==0)
                            echo '
                             <div class="col-md-1">

                               </div>';
                         else
                            echo '<div class="col-md-12 " >';


                        $albumName = $album['AlbumName'];
                        if(strlen($album['AlbumName'])>25)
                          $albumName =  substr($album['AlbumName'],0,20).'...';
                          
                        echo '
                               <a href="'.$mainUrl.$album['AlbumId'].'/'.str_replace(' ','-',$album['AlbumName']).'.htm"  title="Check out the lyrics of songs of the album '.$album['AlbumName'].' ">
                                <div class="col-md-5 hitMD">
                                     '.$albumName.'
                                </div>
                                </a>
                              ';
                              
                        if($count%2==0)
                            echo '
                               </div>';
                              
                        $count++;
                      }

                      if($count%2==0)
                         echo '
                               </div>';
                               
                    }

                 ?>




		</div>
                <!-- bottom -->
	 </div>
  <!-- col-md-9-->
	 

          <?php @require('rightSidebar.php');?>

       </div>
 <!-- ENDS container -->
 




 </div>
 <!-- ENDS WRAP-->
   <br><br>