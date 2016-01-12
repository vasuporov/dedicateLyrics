

<!-- WRAP-->
<div class="wrap">


<!-- container -->
   <div class="container">
	<div class="col-md-8">
	  <h1>Search Result for "<?php echo $searchTag;?>" </h1>
		<div class="bottom">

                 <?php
                  global $searchTag;
                  global $advanceSearchFlag;
                  $searchedSongs =  searchSong($searchTag,$advanceSearchFlag);

                  //print_r($searchedSongs);
                  $count = 1;
                  while($searchedSong = $searchedSongs->fetch_assoc())
                           {
                              $albumDetails =  getAlbumDetails($searchedSong['AlbumId']);
                              if($count%2==0) 
                               $color= 'style="background-color:#FFFAFA; margin-top:5px;"';
                              else 
                               $color= 'style="background-color:#EEE9E9; margin-top:5px;"';


                               if(trim($searchedSong['SongSinger']) == '')
                                  $searchedSong['SongSinger'] = ' - ';
                                  
                                  
                               if(trim($searchedSong['SongLyricist']) == '')
                                  $searchedSong['SongLyricist'] = ' - ';
                                  

                          echo '<div class="col-md-12 posts" '.$color.' >
                            <a href="'.$mainUrl.str_replace(' ','-',$albumDetails['AlbumName']).'/'.$searchedSong['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$searchedSong['SongName'].' '.str_replace(',','',$searchedSong['SongSinger']) ).'.htm" title="Lyrics of the song '.$searchedSong['SongName'].' sung by songer '.$searchedSong['SongSinger'].' from the movie '.$albumDetails['AlbumName'].' and lyrics of this song has been written by '.$searchedSong['SongLyricist'].'. ">
                              <div class="col-md-4">
                                  '.$searchedSong['SongName'].' <br><br>
                              </div>

                              <div class="col-md-8">
                                   <a href="'.$mainUrl.'?dedication='.$searchedSong["SongId"].'" title="Dedicate the hindi lyrics of song '.$searchedSong['SongName'].'"><span class="viewAll" > &nbsp;Dedicate this Song!&nbsp; </span></a><br>
                                  <strong> Movie/Album : </strong>'.$albumDetails['AlbumName'].' <br>
                                  <strong> Singer : </strong>'.$searchedSong['SongSinger'].'    <br>
                                  <strong> Lyricist : </strong>'.$searchedSong['SongLyricist'].'    <br> <br>
                              </div>
                             </a>
                           </div>';
                           

                           $count++;
                           
                           }

                 ?>




		</div>
                <!-- bottom -->

	 </div>
  <!-- col-md-9-->
	 

          <?php @require('rightSidebar.php');?>

       </div>
 <!-- ENDS container -->
 


    <Br><Br><br><br>

 </div>
 <!-- ENDS WRAP-->
