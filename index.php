<?php
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */

include "detect.php";
$mainUrl='http://www.dedicatelyrics.com/'; /* while vchanging this do cange get request path also in js of ajaxlike n ajaxdedication */

$mainFolder='phpFiles/';

/*changin the cover based on the device type*/
if($browser_t == 'web')
   {
     $theme = $mainUrl.'images/cover-web.png';
     $themeForMiniHeader= $mainUrl.'images/cover-web-mini.png';
   }
else
   {
     $theme = $mainUrl.'images/cover-mob.png';
     $themeForMiniHeader=$mainUrl.'images/cover-mob-mini.png';
   }

$current_page_uri = $_SERVER['REQUEST_URI'];
$domain_removed_uri2 =substr($current_page_uri,1);
//$current_page_uri2 = explode("/", end($domain_removed_uri2));
$part_url = explode("/", $domain_removed_uri2);
$page_name = end($part_url);

/*
echo $current_page_uri.'<br> page name :'.$page_name.'<br> part url :  ';
print_r($part_url);
echo '<br> Domain removed : ';
print_r($domain_removed_uri2); die();*/

//print_r($part_url);
 @require($mainFolder.'dbconnect.php');

 
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
$extraStuff = "";
$metatags='
               <meta property="og:url" content="http://www.dedicatelyrics.com/" />
               <meta property="og:description" content="Lyrics are meant to be dedicated. So, Here you can find the hindi lyrics for the latest bollywood songs of all ages and genre.
Dedicatelyrics.com provides/offers you a wonderful experience which none other can!! You can associate hindi songs to people and make them realize how much you love them,
 with all your intense feelings with the hindi lyrics of bollywood hindi songs. " />
               <meta property="og:title" content="Lyrics of bollywood songs | DedicateLyrics.com"/>
               <meta property="og:image" content="http://www.dedicatelyrics.com/images/fbdl.png"/>
               <meta name="description" content="Lyrics are meant to be dedicated. So, Here you can find the hindi lyrics for the latest bollywood songs of all ages and genre & you can associate hindi songs to people and make them realize how much you love them.">
               
               <script>
                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
              
                ga("create", "UA-69418415-1", "auto");
                ga("send", "pageview");
              
              </script>
               ';
$keywords="Lyrics, Bollywood, song , Latest, Hindi, Movies , Albums, Dedicate, DedicateLyrics.com, Hit";

        if ($page_name == 'home.htm' || $page_name=='' || $page_name=='index.php' )
        {
                 $homePageFlag = true;
                 $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
                 //$keywords not defined by default value will be used
                 $extraStuff = '
                               <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                               <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                               ';
                 include $mainFolder.'header.php';
        	 include $mainFolder.'home.php';

	}
	else if ($page_name == 'hit-songs.htm')
        {

            $hitsPageFlag = true; 
            $pageTitle = "Lyrics of Bollywoods Hit songs | DedicateLyrics.com";  
            //$keywords not defined by default value will be used
            include $mainFolder.'header.php';
            include $mainFolder.'hits.php';
        }
        else if ($page_name == 'latest-albums.htm')
        {
             $latestAlbumPageFlag = true;
             $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
             //$keywords not defined by default value will be used
             include $mainFolder.'header.php';
             include $mainFolder.'latest.php';
        }
        else if ( sizeof($part_url) == 4  && $part_url[2]=='hindi-lyrics-of') //its a song lyrics url
        {
            $songId = $part_url[1];
            $songDetails = @getSongsDetailsById($songId);
            if($songDetails==NULL )
             {
               $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
               $metatags= $metatags.'  <meta name="robots" content="noindex">';
               //$keywords not defined by default value will be used
               include $mainFolder.'header.php';
               include $mainFolder.'404.php';
             }
            else
              {

                @increaseLyricsVisitors($songId);
                $metatags='  
                           <meta property="og:url" content="http://www.dedicatelyrics.com/'.str_replace(' ','-',$songDetails['AlbumName']).'/'.$songDetails['SongId'].'/hindi-lyrics-of/'.str_replace(' ','-',$songDetails['SongName'].' '.str_replace(',','',$songDetails['SongSinger'])).'.htm" />
                           <meta property="og:description" content="Check out the lyrics of '.$songDetails['SongName'].' song from the album '.$songDetails['AlbumName'].' which is sung by '.$songDetails['SongSinger'].' and music has been given by '.$songDetails['SongMusicBy'].' and Lyricist is '.$songDetails['SongLyricist'].'." />
                           <meta property="og:title" content="Lyrics of '.$songDetails['SongName'].'"/>
                           <meta property="og:image" content="http://www.dedicatelyrics.com/'.$songDetails['AlbumImage'].'"/>
                           <meta property="og:image:secure_url" content="https://www.dedicatelyrics.com/'.$songDetails['AlbumImage'].'" />
                           <meta property="og:image:type" content="image/jpeg" />
                           <meta property="og:image:width" content="400" />
                           <meta property="og:image:height" content="300" />
                           <meta property="fb:app_id" content="730320697114786" />
                           <meta property="og:type" content="article" />
                           <meta property="og:site_name" content="DedicateLyrics.com"/>
                           <meta name="description" content="Check out the hindi lyrics of '.$songDetails['SongName'].' song from the album '.$songDetails['AlbumName'].' which is sung by '.$songDetails['SongSinger'].' and music has been given by '.$songDetails['SongMusicBy'].' and Lyricist is '.$songDetails['SongLyricist'].'.">

                            <script>
                              (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                              })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
                            
                              ga("create", "UA-69418415-1", "auto");
                              ga("send", "pageview");
                            
                            </script>
                            ';
    
                $keywords=" Lyrics , hindi , bollywood , of, song , movie , album ,".$songDetails['SongName']." , ".$songDetails['AlbumName']." , ".$songDetails['SongSinger']." , ".$songDetails['SongLyricist']." , ".$songDetails['SongMusicBy'];
                $pageTitle = "Lyrics of ".$songDetails['SongName']." from ".$songDetails['AlbumName'];
                
                include $mainFolder.'header.min.php';
                include $mainFolder.'lyrics.php';
              }

        }
        else if ( sizeof($part_url) == 2  ) //its an album url or search
        {
          

           if(strpos($part_url[1],'sharededication.htm') !== false)
            {

               $dedicationId = $part_url[0];
               $dedication = @getDedication($dedicationId);
               if($dedication==NULL)
               {
                 $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
                 $metatags= $metatags.'  <meta name="robots" content="noindex">';
                 //$keywords not defined by default value will be used
                 include $mainFolder.'header.php';
                 include $mainFolder.'404.php';
               }
              else
                {
                   $metatags=' <meta property="og:url" content="http://www.dedicatelyrics.com/'.$dedicationId.'/sharededication.htm" />
                               <meta property="og:description" content="'.str_replace('<br />',"\n",$dedication['dedicationLyrics']).' " />
                               <meta property="og:title" content="Dedication for '.$dedication['dedicationTo'].' | DedicateLyrics.com"/>
                               <meta property="og:image" content="http://www.dedicatelyrics.com/images/fbdl.png"/>
                               <meta name="robots" content="noindex">
                               
                               <script>
                                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
                              
                                ga("create", "UA-69418415-1", "auto");
                                ga("send", "pageview");
                              
                              </script>

                               ';

                   $pageTitle = "Share your dedication.";
                   //$keywords not defined by default value will be used
                    include $mainFolder.'header.php';
                   include $mainFolder.'shareDedication.php';
                }
            }
           else
             {

                $albumId = $part_url[0];
                $albumDetails = @getAlbumDetails($albumId);
                if($albumDetails==NULL)
                 {
                   $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
                   $metatags= $metatags.'  <meta name="robots" content="noindex">';
                   //$keywords not defined by default value will be used
                   include $mainFolder.'header.php';
                   include $mainFolder.'404.php';
                 }
                else
                  {
                    $pageTitle = "Lyrics of songs of the movie/album ".$albumDetails['AlbumName'];
                    $keywords=" Lyrics , hindi , bollywood , of, song , movie , album ,".$albumDetails['AlbumName'];
                    include $mainFolder.'header.php';
                    include $mainFolder.'album.php';
                  }
             }

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

            $metatags= $metatags.'  <meta name="robots" content="noindex">';
            $pageTitle = "Lyrics search Results for ".$searchTag;
            //$keywords not defined by default value will be used
            include $mainFolder.'header.php';
            include $mainFolder.'search.php';
           }
           else if(strpos($page_name,'dedicationWall.php') !== false)
           {
            //alll the metatags and keywords title are set statically inside the dedicationwall.php becuase it doesnt include header as it is
            include $mainFolder.'dedicationWall.php';
           }  
           else if(strpos($page_name,'disclaimer-privacy-policy.php') !== false)
           {            
            $pageTitle = "Disclaimer & Privacy policy of dedicatelyrics.com";
            include $mainFolder.'header.min.php';
            include $mainFolder.'disclaimer-privacy-policy.php';
           }
           else if(strpos($page_name,'report-feedback.php') !== false)
           {
            $pageTitle = "Report Us, Give Feedbacks or Suggestion | DedicateLyrics.com";
            include $mainFolder.'header.min.php';
            include $mainFolder.'report-feedback.php';
           }
           else if(isset($_GET['pagination']))
           {
              $paginationValue = $_GET['pagination'];
              $metatags= $metatags.'  <meta name="robots" content="noindex">';
              $pageTitle = "Lyrics of albums starting with ".$paginationValue;
              //$keywords not defined by default value will be used
              include $mainFolder.'header.php';
             include $mainFolder.'albumsStartingWith.php';
           }
           else if(isset($_GET['dedication']))
           {

               $songId = $_GET['dedication'];
               $songDetails = getSongsDetailsById($songId);
               $pageTitle = "Dedicate the lyrics of song ".$songDetails['SongName']." ";
               $metatags= $metatags.'  <meta name="robots" content="noindex">';
               //$keywords not defined by default value will be used
                $extraStuff = '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
                include $mainFolder.'header.php';
            			//include the Solve Media library
               include $mainFolder.'dedicate.php';
           }

           else
           {
              $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics ";
              $metatags= $metatags.'  <meta name="robots" content="noindex">';
              //$keywords not defined by default value will be used
              include $mainFolder.'header.php';
              include $mainFolder.'404.php';
           }

        }
        else
        {
           $pageTitle = "Lyrics of latest bollywood songs & dedicate song's lyrics";
           $metatags= $metatags.'  <meta name="robots" content="noindex">';
           //$keywords not defined by default value will be used
           include $mainFolder.'header.php';
           include $mainFolder.'404.php';

        }
        

        include $mainFolder.'footer.php';



?>