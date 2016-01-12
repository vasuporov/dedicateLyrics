<?php
 
 
$hostname = "mysql.hostinger.in";
  $UserNAme = "u681566632_vasu";
  $PaSswoRd = 'vasuPOROV123';             
  $database = 'u681566632_lyric';
 
/*

$hostname = "localhost";
  $UserNAme = "root";
  $PaSswoRd = '';              //pwd at mysql hostinger for Gaana vp2913
  $database = 'lyrics';
*/

//Open a new connection to the MySQL server
$mysqli = new mysqli($hostname,$UserNAme,$PaSswoRd,$database);

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}



/*
function insertIntoBlog($title , $oneLiner ,$addedBy , $category , $tags, $putOnCarousel,$profileImageLocation , $coverImageLocation  ,  $description)
{
  global $database;
  global $blogtable;

  $query = "INSERT INTO `".$database."`.`".$blogtable."` (".$blogAttribute.") VALUES (NULL, '', '', '', '', '', '0', 'images/default-cover.png', 'images/default-profile.png', '', '', '', '0')";
}
*/

/*

function getLatestPosts()
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;


  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` ORDER BY ";

  if($result = $mysqli->query($query);)
    {
      return $result;
    }
  else
    {
      return False;
    }

}

function getDetailedPostByUrl($url)
{
 mysqli_real_escape_string($mysqli, $url)
}

function getAllTimePopularPosts()
{

}

function getLatestPopularPosts()
{

}

function getPostsByCategory($category)
{

}
*/



 $blogAttribute = "`id`, `title`, `one_liner`, `date_added`, `added_by`, `category`, `hits`, `cover_image`, `profile_image`, `description`, `url`, `tags`, `put_on_carousel`";
 $blogMiniAttribute = "`id`, `title`, `one_liner`, `date_added`, `added_by`, `category`, `cover_image`,`profile_image`,  `url`";
 $blogtable     = "blog_post";





function getLatestPostByCategory($category,$noOfPostToRetrive)
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;

  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` WHERE `category` = '".$category."' ORDER BY `date_added` DESC  LIMIT ".$noOfPostToRetrive." ";

  $result = $mysqli->query($query);
  
  if ($result)
   {

     return $result;
   }
   

   return NULL;

}



function getDetailedPostByUrl($blogUrl)
{
  global $database;
  global $blogtable;
  global $blogAttribute;
  global $mysqli;


  $query = "SELECT ".$blogAttribute." FROM `".$database."`.`".$blogtable."` WHERE `url` = '".mysqli_real_escape_string($mysqli, $blogUrl)."' ";

  //echo $query;

  //$mysqli->query("SET NAMES 'utf8'");
  
$result = $mysqli->query($query);

  if ($result)
   {
     return $result;
   }

   
   return NULL;

}

function getLatestMiniPost($noOfPostToRetrive)
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;

  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` ORDER BY `date_added` DESC  LIMIT ".$noOfPostToRetrive." ";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;

}

function getLatestPopularMiniPost($noOfPostToRetrive)
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;

  $greaterThenDate = time()-30*24*60*60;   // latest means popular in last 30 days

  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` WHERE `date_added` > '".$greaterThenDate ."'  ORDER BY `hits` DESC LIMIT ".$noOfPostToRetrive." ";
  //echo $query;
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;
}

function getAllTimePopularMiniPost($noOfPostToRetrive)
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;

  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` ORDER BY `hits` DESC LIMIT ".$noOfPostToRetrive." ";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;
}

function getCarouselMiniPost()
{
  global $database;
  global $blogtable;
  global $blogMiniAttribute;
  global $mysqli;

  $query = "SELECT ".$blogMiniAttribute." FROM `".$database."`.`".$blogtable."` WHERE `put_on_carousel` = '1' ORDER BY `date_added` DESC LIMIT 3";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }

   
   return NULL;
}





/************************Song's Lyrics ************************************/


$songsTable = 'songs';
$albumTable = 'albums';
$indexTable = 'songs_indexed';

$albumAttribute = '`AlbumId` ,
          `AlbumName` ,
          `AlbumImage` ,
          `TotalVisits` ,
           `DateEdited`,
          `DateCreated`';

$songsAttribute = '`SongId` ,
                `SongName` ,
                `AlbumId` ,
                `SongMusicBy` ,
                `SongLyricist` ,
                `SongSinger` ,
                `SongLyrics` ,
                `TotalVisits` ,
                `DateEdited`,
                `DateCreated`';
                
$indexAttribute = '`Id` ,
`Tag` ,
`SongId`,
`TagIs`';

function getLatestLyrics()
{
  global $mysqli;
  global $songsAttribute;
  global $songsTable;
  global $albumTable;
  
  $query = "SELECT b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`,a.`AlbumName`,a.`AlbumImage` FROM ".$songsTable." b, ".$albumTable ." a WHERE a.`AlbumId` = b.`AlbumId`  ORDER BY b.`DateCreated` DESC LIMIT 10; ";
  
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;

}

/*************************************************************************/



?>