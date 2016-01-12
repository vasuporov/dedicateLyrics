

<?php
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
$current_page_uri = $_SERVER['REQUEST_URI'];
$current_page_uri2 = explode("?", $current_page_uri);
$part_url = explode("/", end($current_page_uri2));
$page_name = end($part_url);

//print_r($part_url);
 @require('dbconnect.php');
 
 
 /*
 
   home.htm

hit-songs.htm

latest-albums.htm


indexe1        2      3          4
/lyrics/albumname/songid/songname-singer.htm
    
    
    1    2   3
/lyrics/id/albumname.htm

   1        2
/search/searchtag 2
 */

 $hitsPageFlag = false;
 $metatags="";

        if ($page_name == 'home.htm' || $page_name=='' || $page_name=='index.php' )
        {
                 $homePageFlag = true;
                 $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics | DedicateLyrics.com";
                 include '/header.php';
        	include '/home.php';

	}
	else if ($page_name == 'hit-songs.htm')
        {

            $hitsPageFlag = true; 
            $pageTitle = "Lyrics of Bollywoods Hit songs | DedicateLyrics.com";
             include '/header.php';
            include '/hits.php';
        }
        else if ($page_name == 'latest-albums.htm')
        {
             $latestAlbumPageFlag = true;
             $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics | DedicateLyrics.com";
             include '/header.php';
            include '/latest.php';
        }
        else if ( sizeof($part_url) == 4  && $part_url[2]=='lyrics-of') //its a song lyrics url
        {
            $songId = $part_url[1];
            $songDetails = getSongsDetailsById($songId);
            @increaseLyricsVisitors($songId);
            $metatags=' <meta property="og:url" content="http://www.dedicatelyrics/index.php?'.str_replace(' ','-',$songDetails['AlbumName']).'/'.$songDetails['SongId'].'/lyrics-of/'.str_replace(' ','-',$songDetails['SongName']).'.htm" />
   <meta property="og:description" content="Check out the lyrics of '.$songDetails['SongName'].' song from the album '.$songDetails['AlbumName'].' which is sung by '.$songDetails['SongSinger'].' and music has been given by '.$songDetails['SongMusicBy'].' and Lyricist is '.$songDetails['SongLyricist'].'." />
   <meta property="og:title" content="DedicateLyrics.com |'.$songDetails['SongName'].'"/>
   <meta property="og:image" content="'.$songDetails['AlbumImage'].'"/>';

            $pageTitle = "Lyrics of ".$songDetails['SongName']." from movie ".$songDetails['AlbumName'];
             include '/header.min.php';
            include '/lyrics.php';

        }
        else if ( sizeof($part_url) == 2  ) //its an album url or search
        {

            $albumId = $part_url[0];
            $pageTitle = "";
             include '/header.php';
           include '/album.php';

        }
        else if(sizeof($part_url) == 1)
        {
          if(isset($_GET['search']))
           {
             $searchTag = $_GET['search'];
             $advanceSearchFlag = 0; //1 only for song search , 3 only for artist , 5 only for album , 4 for song and artist , 6 for song and album
                                     // 8 for artist and album , 9 for all song artist album

             if(isset($_GET['f-song']))
              {
               $advanceSearchFlag += 1;
              }
              
              if(isset($_GET['f-artist']))
              {
               $advanceSearchFlag += 3;
              }
              
              if(isset($_GET['f-album']))
              {
               $advanceSearchFlag += 5;
              }
              
              if($advanceSearchFlag == 0)
                $advanceSearchFlag = 9;

            $pageTitle = "Lyrics search Results for ".$searchTag;
            include '/header.php';
            include '/search.php';
           }
           else if(isset($_GET['pagination']))
           {
              $paginationValue = $_GET['pagination'];
              $pageTitle = "Lyrics of albums starting with ".$paginationValue;
              include '/header.php';
             include '/albumsStartingWith.php';
           }
           else if(isset($_GET['dedication']))
           {

               $songId = $_GET['dedication'];
               $pageTitle = "Lyrics dedication wall of the week | DedicateLyrics.com";
                include '/header.php';
               include '/dedicate.php';
           }
           else if(isset($_GET['sharededication']))
           {

               $dedicationId = $_GET['sharededication'];
               $dedication = @getDedication($dedicationId);
               $metatags=' <meta property="og:url" content="http://www.dedicatelyrics/?sharededication'.$dedicationId.'" />
                           <meta property="og:description" content="'.str_replace('<br />',"\n",$dedication['dedicationLyrics']).' " />
                           <meta property="og:title" content="Dedication for '.$dedication['dedicationTo'].' | DedicateLyrics.com"/>
                           <meta property="og:image" content="images/fbdl.png"/>';
               $pageTitle = "Share your dedication.";
                include '/header.php';
               include '/shareDedication.php';
           }
           else
           {
              $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics | DedicateLyrics.com";
              include '/header.php';
              include '/404.php';
           }

        }
        else
        {
           $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics | DedicateLyrics.com";
           include '/header.php';
           include '/404.php';

        }
        

        include '/footer.php';



?>
