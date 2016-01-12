

<!-- WRAP-->
<div class="wrap">

<?php
   global $albumId;
   $albumsSongs = @getSongsOfThisAlbum($albumId);
   //print_r($albumsSongs);
   global $albumDetails;
   @increaseAlbumVisitors($albumId);
?>

<!-- container -->
   <div class="container">
	<div class="col-md-8">
	  <h1>Songs of <?php  echo @$albumDetails['AlbumName']; ?> </h1>
		<div class="bottom" >

                    <div class="col-md-4">
                        <img src="<?php echo @$mainUrl.@$albumDetails['AlbumImage'];?>" alt="Lyrics of movie <?php echo @$albumDetails['AlbumName'];?>" style=" width:80%; height:230px;" /> <br><br>
                    </div>

                    <div class="col-md-8">
                        <div style="display:none;"><strong> Description : </strong><p>Check out the lyrics of songs from the movie"<b> <?php echo @$albumDetails['AlbumName']; ?> </b>" .</p> </div>


                             <div  class="content" align="center">


                                <?php
                                     global    $albumSong;
                                     $count=1;

                                   while( @$albumSong = @$albumsSongs->fetch_assoc())
                                    {

                                   echo ' <a href="'.$mainUrl.str_replace(' ','-',@$albumDetails['AlbumName']).'/'.@$albumSong['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',@$albumSong['SongName'].' '.str_replace(',','',@$albumSong['SongSinger']) ).'.htm"  title="Lyrics of the song '.@$albumSong['SongName'].' sung by '.@$albumSong['SongSinger'].' from the movie '.@$albumDetails['AlbumName'].' " >
                                          <div class="col-md-12 hitMD wow bounceIn" data-wow-delay="0.5s" > '.$count.'. '.@$albumSong['SongName'].'  - '.$albumSong['SongSinger'].' </div>


                                         
                                         </a>
                                     ';
                                    $count++;
                                    }
                                    
                                    if($count==1)
                                     {
                                       echo 'Lyrics of Songs from the album '.@$albumDetails['AlbumName'].' are not released yet! Stay tuned to dedicate them :)';
                                     }
                                    
                                    ?>

                               

	                  </div>
                    </div>

			<div class="clearfix"> </div>
                    </div>

         </div>

        <?php @require('rightSidebar.php');?>

        </div>
 <!-- ENDS container -->





 </div>
 <!-- ENDS WRAP-->
   <br><br><br><br>