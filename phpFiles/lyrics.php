<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=730320697114786";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- WRAP-->
<div class="wrap">




<?php
global $songDetails;

?>
<!-- single -->
   <div class="container">
 <div class="col-md-8">
	  <h1>Hindi Lyrics of <?php echo $songDetails['SongName'].' | '.$songDetails['AlbumName']; ?></h1>
		<div class="bottom" >
		  <div class="col-md-4 ">
                      <div >
                          <img src="<?php echo $mainUrl.$songDetails['AlbumImage'];?>" alt="Hindi Lyrics of the movie <?php echo $songDetails['SongName'].'-'.$songDetails['AlbumName'].'-'.$songDetails['SongSinger'];?>" style=" width:160px; height:210px;" /> <br><br>
                      </div>

                      <div >
                          <strong> Song : </strong><?php echo $songDetails['SongName'];?>. <br>
                          <strong> Movie/Album : </strong><?php echo '<a href="'.$mainUrl.$songDetails['AlbumId'].'/'.str_replace(' ','-',$songDetails['AlbumName']).'.htm" title="Check out the hindi lyrics of songs of the album '.$songDetails['AlbumName'].' "><mark> '.$songDetails['AlbumName'];?>.</mark></a> <br>
                          <strong> Singer : </strong><?php echo $songDetails['SongSinger'];?>. <br>
                          <strong> Lyricist : </strong><?php echo $songDetails['SongLyricist'];?>. <br>
                          <strong> Music by : </strong><?php echo $songDetails['SongMusicBy'];?>. <br>
                          <strong> Description : </strong><p><?php echo "Check out the lyrics of '".$songDetails['SongName']."' song from the album ".$songDetails['AlbumName']." which is sung by ".$songDetails['SongSinger']." and music has been given by ".$songDetails['SongMusicBy']." and Lyricist is ".$songDetails['SongLyricist'].". "; ?></p> <br>

                            </div>

                      
                        <!--
                             <div class="webAds"> 
                             <script src="//go.padstm.com/?id=438884"></script>
                              </div>
                         -->
                      
                    </div>

                    <div class="col-md-8" align="center">
                           <!-- Begin BidVertiser code -->
                            <SCRIPT SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=702961&bid=1748881" TYPE="text/javascript"></SCRIPT>
                           <!-- End BidVertiser code --> 

                       <a href="<?php echo $mainUrl;?>?dedication=<?php echo $songDetails['SongId']; ?>" title="Dedicate the hindi lyrics of song <?php echo $songDetails['SongName'];?>"><span class="viewAll" > &nbsp;Dedicate this Song!&nbsp; </span></a>

                        <pre style="background:#f5f5f5; line-height:1.5em;" class="wow bounceIn" data-wow-delay="0.5s">

<?php echo $songDetails['SongLyrics'];?>

  </pre>
  

            <div class="fb-like" data-href="http://www.dedicatelyrics.com/<?php echo str_replace(' ','-',$songDetails['AlbumName']).'/'.$songDetails['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$songDetails['SongName'].' '.str_replace(',','',@$songDetails['SongSinger'])).'.htm'; ?>" data-layout="box_count"></div>
            <div class="fb-share-button" data-href="http://www.dedicatelyrics.com/<?php echo str_replace(' ','-',$songDetails['AlbumName']).'/'.$songDetails['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$songDetails['SongName'].' '.str_replace(',','',@$songDetails['SongSinger'])).'.htm'; ?>" data-layout="box_count"></div>
            <div class="fb-comments" data-href="http://www.dedicatelyrics.com/<?php echo str_replace(' ','-',$songDetails['AlbumName']).'/'.$songDetails['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$songDetails['SongName'].' '.str_replace(',','',@$songDetails['SongSinger'])).'.htm'; ?>" data-numposts="5" data-width="100%" ></div>

  

                    </div>

			<div class="clearfix"> </div>
                    </div>

         </div>

        <?php @require('rightSidebar.php');?>

        </div>
 <!-- ENDS single -->


 </div>
 <!-- ENDS WRAP-->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56725af42a147441" async="async"></script>
	