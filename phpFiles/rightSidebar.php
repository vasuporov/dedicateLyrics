<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=730320697114786";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- put it inside container wrap -->
 <!-- col-md-3-->
            <div class="col-md-3">


                       <h4>Advertisement</h4>
                    <div  class="content">
                       <!-- Begin BidVertiser code -->
                       <SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=702961&bid=1748879" TYPE="text/javascript"></SCRIPT>
                       <!-- End BidVertiser code -->      
                    </div>


                       <h4>How to dedicate</h4>
                    <div  class="content">
                         <img src="http://www.dedicatelyrics.com/images/howitworks.gif" alt="how to dedicate" >
                     </div>

                       

            <?php

             global $hitsPageFlag;
             $hitSongs = getTopHitsForHomePage();
             if(!$hitsPageFlag)
              {
              echo '    <h3>Top Hits</h3>
                 <div  class="content">
                     <div class="hits">   ';



                       while($song = $hitSongs->fetch_assoc())
                        {
                          $songName = $song['SongName'];
                          if(strlen($song['SongName'])>25)
                              $songName =  substr($song['SongName'],0,25).'...';
                          echo '
                                <a href="'.$mainUrl.str_replace(' ','-',$song['AlbumName']).'/'.$song['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$song['SongName'].' '.str_replace(',','',@$song['SongSinger']) ).'.htm" title="Lyrics of '.$song['SongName'].' sung by '.$song['SongSinger'].' from the movie '.$song['AlbumName'].' " > <div class="hitsSideBar wow fadeInRight" data-wow-delay="0.5s"> '.$songName.' </div> </a>

                               ' ;
                        }


                  echo '

                     <center><a href="'.$mainUrl.'hit-songs.htm"> <span class="viewAll"> &nbsp;View All&nbsp; </div></a></center> ';
              }

                 ?>


            <?php

            /* global $hitsPageFlag;
             $hitSongs = getTopHitsForHomePage();
             if(!$hitsPageFlag)
              {
              echo '    <h3>Top Hits</h3>
                 <div  class="content">
                     <table class="hits">   ';



                       while($song = $hitSongs->fetch_assoc())
                        {
                          $songName = $song['SongName'];
                          if(strlen($song['SongName'])>25)
                              $songName =  substr($song['SongName'],0,25).'...';
                          echo '
                               <tr>
                                   <td> <a href="?'.str_replace(' ','-',$song['AlbumName']).'/'.$song['SongId'].'/lyrics-of/'.str_replace(' ','-',$song['SongName']).'.htm" title=" '.$song['SongName'].' sung by '.$song['SongSinger'].' from the movie '.$song['AlbumName'].' " >'.$songName.'</a></td>
                               </tr> 
                               ' ;
                        }


                  echo '
                     </table>
                     <center><a href="?hit-songs.htm"> <span class="viewAll"> &nbsp;View All&nbsp; </div></a></center> ';
              }
                    */
                 ?>
                 
                    <br><br>
	     </div>


    


                 <div  class="content">
                 <div class="fb-page" data-href="https://www.facebook.com/DedicateLyricscom-1693081050904972/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>

                </div>


             

          </div>
          
          <!-- col-md-3-->						