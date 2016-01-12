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


/************* SONGS *********************************/

function getTopHits()
{
  global $mysqli;
  global $songsAttribute;
  global $songsTable;
  global $albumTable;
  
  $query = "SELECT b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`,a.`AlbumName` FROM ".$songsTable." b, ".$albumTable ." a WHERE a.`AlbumId` = b.`AlbumId`  ORDER BY b.`TotalVisits` DESC LIMIT 50; ";
  
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;

}

function getTopHitsForHomePage()
{
  global $mysqli;
  global $songsAttribute;
  global $songsTable;
  global $albumTable;

  $query = "SELECT b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`,a.`AlbumName` FROM ".$songsTable." b, ".$albumTable ." a WHERE a.`AlbumId` = b.`AlbumId`  ORDER BY b.`TotalVisits` DESC LIMIT 8; ";
  
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   
   
   return NULL;

}


function getSongsDetailsById($songId)
{
  global $mysqli;
  global $songsAttribute;
  global $songsTable;
  global $albumTable;

  $songId = mysqli_real_escape_string($mysqli, $songId);

  $query = "SELECT b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`,a.`AlbumName`,a.`AlbumImage` FROM ".$songsTable." b, ".$albumTable ." a WHERE a.`AlbumId` = b.`AlbumId` AND `SongId` = ".$songId." ; ";
  
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result->fetch_assoc();
   }
   

   return NULL;
}


function getSongsOfThisAlbum($albumId)
{
  global $mysqli;
  global $songsAttribute;
  global $songsTable;
  global $albumTable;
  
   $albumId = mysqli_real_escape_string($mysqli, $albumId);

   $query = "SELECT * FROM ".$songsTable."  WHERE `AlbumId` = ".$albumId." ; ";
  
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   

   return NULL;
}



 function increaseLyricsVisitors($songId)
{
   global $mysqli;
   global $songsTable;


   $songId = mysqli_real_escape_string($mysqli, $songId);

   $query = "UPDATE ".$songsTable." SET `TotalVisits` = `TotalVisits`+1 WHERE `SongId`='".$songId."' ";
    $mysqli->query($query);

}


/*************ENDs SONGS *********************************/






/******************ALBUM********************************/
 function getAllLatestAlbums()
 {
   global $mysqli;
   global $albumTable;
   global $albumAttribute;

   $query = "SELECT * FROM ".$albumTable." ORDER BY `DateCreated` DESC LIMIT 25; ";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   

   return NULL;
 }
 
 function getLatestAlbumsForHomePage()
 {
   global $mysqli;
   global $albumTable;
   global $albumAttribute;

   $query = "SELECT * FROM ".$albumTable." ORDER BY `DateCreated` DESC LIMIT 10; ";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   

   return NULL;
 }


function getAlbumDetails($albumId)
{
   global $mysqli;
   global $albumTable;
   global $albumAttribute;

   $albumId = mysqli_real_escape_string($mysqli, $albumId);


   $query = "SELECT * FROM ".$albumTable." WHERE `AlbumId` = '".$albumId."' ";

  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result->fetch_assoc();
   }
   

   return NULL;
}

function getAlbumsStartingWith($startLetter)
{
 global $mysqli;
   global $albumTable;
   global $albumAttribute;



   $startLetter = mysqli_real_escape_string($mysqli, $startLetter);

   if($startLetter=='' or $startLetter == '_')
      return NULL;

   if( $startLetter == '0')
     $startLetter = "REGEXP '^[0-9]'";
   else
     $startLetter  = "LIKE '".$startLetter."%'";
   $query = "SELECT * FROM ".$albumTable." WHERE `AlbumName` ".$startLetter." ";
    //echo $query;
  $result = $mysqli->query($query);
  
  if ($result)
   {
     return $result;
   }
   

   return NULL;
}

function increaseAlbumVisitors($albumId)
{
   global $mysqli;
   global $albumTable;
   global $albumAttribute;

    $albumId = mysqli_real_escape_string($mysqli, $albumId);

   $query = "UPDATE ".$albumTable." SET `TotalVisits` = `TotalVisits`+1 WHERE `AlbumId`='".$albumId."' ";
    $mysqli->query($query);

}



 /******************ENDS ALBUM********************************/





/*******************index**************************/

/* depracated
function searchSong($searchTag,$advanceSearchFlag)
{
   global $indexTable;
  global $indexAttribute;
  global $database;
  global $mysqli;
  global $songsTable;


   $searchTag = mysqli_real_escape_string($mysqli, $searchTag);
   $advanceSearchFlag = mysqli_real_escape_string($mysqli, $advanceSearchFlag);

   $pieces = explode(" ",$searchTag);
   $advanceFilter = "";

   $searchquery = " ( `Tag` LIKE '%".$searchTag."%'  OR `Tag` LIKE '".$searchTag."' ";
   $orderByQuery = " ORDER BY b.`SongName` LIKE '%".$searchTag."%' DESC ,b.`SongName` LIKE '".$searchTag."' DESC";
   foreach($pieces as $piece)
   {

     if($piece != '' && $piece != ' ' && $piece != $searchTag )
       {
         $searchquery  = $searchquery." OR `Tag` LIKE '%".$piece."%' ";
         $orderByQuery = $orderByQuery.", b.`SongName` LIKE '%".$piece."%' DESC";
       }
   }

   $searchquery = $searchquery." ) ";
   
   if($advanceSearchFlag == 1)
    {
      $advanceFilter = " AND ( `TagIs` = '1') ";   //tagis 1 for song names tag
    }
   else if($advanceSearchFlag == 3)
    {
      $advanceFilter = " AND (`TagIs` = '2' )";   //tagis 2 for artist names tag
    }
    else if($advanceSearchFlag == 5)
    {
      $advanceFilter = " AND (`TagIs` = '3') ";   //tagis 3 for album names tag
    }
    else if($advanceSearchFlag == 4)
    {
      $advanceFilter = " AND ( `TagIs` = '1' OR `TagIs` = '2') ";   // for both song & artist names tag
    }
    else if($advanceSearchFlag == 8)
    {
      $advanceFilter = " AND ( `TagIs` = '2' OR `TagIs` = '3') ";   // for both album & artist names tag
    }
    else if($advanceSearchFlag == 6)
    {
      $advanceFilter = " AND ( `TagIs` = '1' OR `TagIs` = '3') ";   // for both song & album names tag
    }
    else if($advanceSearchFlag == 9)
    {
      $advanceFilter = "";
    }



  $query = "SELECT  b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`  FROM  (SELECT `SongId`,COUNT(*) as `count` FROM `".$indexTable."` WHERE ".$searchquery." ".$advanceFilter." GROUP BY `SongId` ORDER BY `count` DESC) a,`".$songsTable."` b WHERE a.SongId = b.SongId ".$orderByQuery." LIMIT 20 ";

  //echo $query; die();
  $result = $mysqli->query($query);


  if($result)
   {
    return $result;
   }

return Null;
}
*/

function searchSong($searchTag,$advanceSearchFlag)
{
   global $indexTable;
  global $indexAttribute;
  global $database;
  global $mysqli;
  global $songsTable;
  global $albumTable;


   $searchTag = strtolower(mysqli_real_escape_string($mysqli, $searchTag));
   $advanceSearchFlag = mysqli_real_escape_string($mysqli, $advanceSearchFlag);

   $pieces = explode(" ",$searchTag);
   $concatCols = "";

    if($advanceSearchFlag == 1)
    {
      $concatCols = "a.`SongName` ";   //tagis 1 for song names tag
    }
   else if($advanceSearchFlag == 3)
    {
      $concatCols = "a.`SongSinger`";   //tagis 2 for artist names tag
    }
    else if($advanceSearchFlag == 5)
    {
      $concatCols = "b.`AlbumName`";   //tagis 3 for album names tag
    }
    else if($advanceSearchFlag == 4)
    {
      $concatCols = " CONCAT_WS(' ', `a.SongName`, a.`SongSinger`, a.`SongLyrics`) ";   // for both song & artist names tag
    }
    else if($advanceSearchFlag == 8)
    {
      $concatCols = " CONCAT_WS(' ', b.`AlbumName`, a.`SongSinger`, ) ";   // for both album & artist names tag
    }
    else if($advanceSearchFlag == 6)
    {
      $concatCols = " CONCAT_WS(' ', a.`SongName`, b.`AlbumName`, a.`SongLyrics`) ";   // for both song & album names tag
    }
    else if($advanceSearchFlag == 9)
    {
      $concatCols = "CONCAT_WS(' ', a.`SongName`, a.`SongLyrics` , a.`SongSinger`, b.`AlbumName`)";
    }


   $searchquery = "( CASE WHEN LOWER(".$concatCols.") LIKE '%".$searchTag."%' THEN 3 ELSE 0 END +  CASE WHEN LOWER(".$concatCols.") LIKE '".$searchTag."' THEN 5 ELSE 0 END ";
   //$orderByQuery = " ORDER BY b.`SongName` LIKE '%".$searchTag."%' DESC ,b.`SongName` LIKE '".$searchTag."' DESC";
   $counter = 1;
   $lastPiece='';
   foreach($pieces as $piece)
   {

     if($piece != '' && $piece != ' ' && $piece != $searchTag )
       {
         $searchquery  = $searchquery." +  CASE WHEN  LOWER(".$concatCols.") LIKE '%".$piece."%' THEN 1 ELSE 0 END ";
         //$orderByQuery = $orderByQuery.", b.`SongName` LIKE '%".$piece."%' DESC";
         if($counter%2==0)
          {
            $searchquery  = $searchquery." +  CASE WHEN  LOWER(".$concatCols.") LIKE '%".$lastPiece." ".$piece."%' THEN 2 ELSE 0 END ";
          }
         $counter++;
         $lastPiece = $piece;
       }
   }

   $searchquery = $searchquery." ) ";
   



  $query = "SELECT  b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`  FROM  (SELECT ".$searchquery." AS numMatches, `SongId`  FROM `".$songsTable."` a, `".$albumTable."` b WHERE a.`AlbumId` = b.`AlbumId` ORDER BY `numMatches` DESC , a.`DateCreated` DESC) a,`".$songsTable."` b WHERE a.SongId = b.SongId   LIMIT 20 ";

  //echo $query; die();
  $result = $mysqli->query($query);


  if($result)
   {
    return $result;
   }

return Null;
}

function searchSongLyrics($searchTag,$advanceSearchFlag)
{
   global $indexTable;
  global $indexAttribute;
  global $database;
  glo