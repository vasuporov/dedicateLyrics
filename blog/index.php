<?php


   include('detect.php');
   include('dbconnect_blog.php');




$mainUrl='http://www.dedicatelyrics.com/blog/'; /* while vchanging this do cange get request path also in js of ajaxlike n ajaxdedication */
$mainUrl2='http://www.dedicatelyrics.com/';
/*changin the cover based on the device type*/
/*if($browser_t == 'web')
   {
     $theme = $mainUrl.'images/cover-web.png';
     $themeForMiniHeader= $mainUrl.'images/cover-web-mini.png';
   }
else
   {
     $theme = $mainUrl.'images/cover-mob.png';
     $themeForMiniHeader=$mainUrl.'images/cover-mob-mini.png';
   } */

$current_page_uri = $_SERVER['REQUEST_URI'];
$domain_removed_uri2 = explode('/blog/', $current_page_uri);
//$current_page_uri2 = explode("/", end($domain_removed_uri2));
$part_url = explode("?p=", end($domain_removed_uri2));
$page_name = $part_url[0];


/*
echo $current_page_uri.'<br> page name :'.$page_name.'<br> part url :  ';
print_r($part_url);
echo '<br> Domain removed : ';
print_r($domain_removed_uri2); die();
*/

 /*

   home.htm

   index.php

   bollywood-gosips
   
   bollywood-movies
   
   bollywood-music
   
   zingo-posts
   
   post'stitle
   
   $part_url[1] is the page number
 */


$hitsPageFlag = false;
$extraStuff = "";
$title = "Bollywood Gosips , News , Updates and Rumors | DedicateLyrics.com";
$metatags='
               <meta property="og:url" content="'.$mainUrl.'" />
               <meta property="og:description" content="All the bollywood news, gossips , updates , movie release , music releases , fights and rumors can be found here. It a one hub to stay updated with the bollywood happenings. " />
               <meta property="og:title" content="Bollywood Gosips , News , Updates and Rumors | DedicateLyrics.com"/>
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta property="og:image" content="http://www.dedicatelyrics.com/images/fbdl.png"/>
               <meta name="description" content="All the bollywood news, gossips , updates , movie release , music releases , fights and rumors can be found here. It a one hub to stay updated with the bollywood happenings. ">
               <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

               <script>
                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
              
                ga("create", "UA-69418415-1", "auto");
                ga("send", "pageview");
              
              </script>
               ';
               

$keywords="Blog, Latest , Bollywood , updates , movie , releases , musics , lyrics , posts , interesting ,  DedicateLyrics.com";

        if ($page_name == 'home.htm' || $page_name=='' || $page_name=='index.php' )
        {

            include "header.php";
            include "home.php";
            include "sidebar.php";
        }
        else if ($page_name == 'bollywood-gossips' || $page_name == 'bollywood-movies' || $page_name == 'bollywood-music' || $page_name == 'zingo-post')
        {

            $category =$page_name;
            $posts = @getLatestPostByCategory($category,12); //mximum 12 post will be retrieved
            include "header.php";
            include "category.php";
            include "sidebar.php";
        }
        else //main blog posts
        {
           /*
             firstly resolve the url of post if it exists the include post.php else pagenotfound 404.php
           */

           $post = @getDetailedPostByUrl($page_name);
           $post = $post->fetch_assoc();

           if($post!=Null)
            {
               //$post = $post->fetch_assoc();
               $title = $post['title'].' | DedicateLyrics.com';
               $metatags='
               <meta property="og:url" content="'.$mainUrl.'" />
               <meta property="og:description" content="'.$post['one_liner'].'" />
               <meta property="og:title" content="'.$title.'"/>
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta property="og:image" content="'.$mainUrl.$post['cover_image'].'"/>
               <meta name="description" content="'.$post['one_liner'].'">
               <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
               <script>
                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
              
                ga("create", "UA-69418415-1", "auto");
                ga("send", "pageview");
              
              </script>
               ';
               

               $keywords="Blog, Latest , Bollywood , updates , movie , releases , musics , lyrics , posts , interesting ,  DedicateLyrics.com";




               include "header.php";
               include "post.php";
               include "sidebar.php";
               echo '	<!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56725af42a147441" async="async"></script>';
    
            }
          else
           {
             include "header.php";
             include "404.php";
           }

        }
        

        include "footer.php";

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=730320697114786";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>