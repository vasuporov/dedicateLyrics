
<!-- WRAP-->
<div class="wrap">


<!-- container -->
   <div class="container">
	<div class="col-md-8">
	  <h1>Hit Songs  </h1>
		<div class="bottom">


                    <?php
                      $topHits=getTopHits();
                      $count = 1;
                      
                     while($song = $topHits->fetch_assoc())
                      {
                         if($count%2==0)
                            echo '
                             <div class="col-md-1">

                               </div>';
                         else
                            echo '<div class="col-md-12 " >';


                        $songName = $song['SongName'];
                        if(strlen($song['SongName'])>25)
                          $songName =  substr($song['SongName'],0,20).'...';
                          
                        echo '
                               <a href="'.$mainUrl.str_replace(' ','-',$song['AlbumName']).'/'.$song['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$song['SongName'].' '.str_replace(',','',@$song['SongSinger']) ).'.htm" title=" '.$song['SongName'].' sung by '.$song['SongSinger'].' from the movie '.$song['AlbumName'].' ">
                                <div class="col-md-5 hitMD">
                                    '.$songName.'
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
                    ?>



		</div>

                <!-- bottom -->
	 </div>
  <!-- col-md-9-->
	 


          <?php @require('rightSidebar.php');?>

       </div>
 <!-- ENDS container -->
 




 <br><br><br>
 </div>
 <!-- ENDS WRAP-->
