
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


function searchSong2($searchTag,$advanceSearchFlag)
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


   $searchquery = "( CASE WHEN LOWER(".$concatCols.") LIKE '%".$searchTag."%' THEN 30 ELSE 0 END +  CASE WHEN LOWER(".$concatCols.") LIKE '".$searchTag."' THEN 10 ELSE 0 END +  CASE WHEN LOWER(a.`SongName`) LIKE '%".$searchTag."%' THEN 50 ELSE 0 END + CASE WHEN LOWER(a.`SongName`) LIKE '".$searchTag."' THEN 80 ELSE 0 END +  CASE WHEN LOWER(a.`SongName`) ='".$searchTag."' THEN 150 ELSE 0 END ";
   //$orderByQuery = " ORDER BY b.`SongName` LIKE '%".$searchTag."%' DESC ,b.`SongName` LIKE '".$searchTag."' DESC";
   $counter = 1;
   $lastPiece='';
   foreach($pieces as $piece)
   {

     if($piece != '' && $piece != ' ' && $piece != $searchTag )
       {
         $searchquery  = $searchquery." +  CASE WHEN  LOWER(".$concatCols.") LIKE '%".$piece."%' THEN 2 ELSE 0 END +  CASE WHEN  LOWER(".$concatCols.") LIKE '".$piece."' THEN 4 ELSE 0 END +  CASE WHEN LOWER(a.`SongName`) LIKE '%".$piece."%' THEN 2 ELSE 0 END +  CASE WHEN LOWER(a.`SongName`) LIKE '".$piece."' THEN 4 ELSE 0 END ";
         //$orderByQuery = $orderByQuery.", b.`SongName` LIKE '%".$piece."%' DESC";
         if($counter%2==0)
          {
            $searchquery  = $searchquery." +  CASE WHEN  LOWER(".$concatCols.") LIKE '%".$lastPiece." ".$piece."%' THEN 4 ELSE 0 END +  CASE WHEN  LOWER(".$concatCols.") LIKE '".$lastPiece." ".$piece."' THEN 8 ELSE 0 END  +  CASE WHEN LOWER(a.`SongName`) LIKE '%".$lastPiece." ".$piece."%' THEN 2 ELSE 0 END +  CASE WHEN LOWER(a.`SongName`) LIKE '".$lastPiece." ".$piece."' THEN 8 ELSE 0 END ";
          }
         $counter++;
         $lastPiece = $piece;
       }
   }

   $searchquery = $searchquery." ) ";
   



  $query = "SELECT  b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`  FROM  (SELECT ".$searchquery." AS numMatches, `SongId`  FROM `".$songsTable."` a, `".$albumTable."` b WHERE a.`AlbumId` = b.`AlbumId` ORDER BY `numMatches` DESC LIMIT 25) a,`".$songsTable."` b WHERE a.SongId = b.SongId  ";

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
  global $mysqli;
  global $songsTable;


   $searchTag = mysqli_real_escape_string($mysqli, $searchTag);
    $pieces = explode(" ",$searchTag);

   $searchquery = " ( `Tag` LIKE '%".$searchTag."%' ";
   $orderByQuery = " ORDER BY b.`SongName` LIKE '%".$searchTag."%' DESC ";
   foreach($pieces as $piece)
   {

     if($piece != '' && $piece != ' ' && $piece != $searchTag )
       {
         $searchquery  = $searchquery." OR `Tag` LIKE '%".$piece."%' ";
         $orderByQuery = $orderByQuery.", b.`SongName` LIKE '%".$piece."%' DESC";
       }
   }

   $searchquery = $searchquery." ) ";



  $query = "SELECT  b.`SongName`,b.`SongId`,b.`AlbumId`,b.`SongMusicBy` , b.`SongLyricist` ,b.`SongSinger` , b.`SongLyrics` ,b.`TotalVisits`  FROM  (SELECT `SongId`,COUNT(*) as `count` FROM `lyrics_indexed` WHERE ".$searchquery." GROUP BY `SongId` ORDER BY `count` DESC) a,`".$songsTable."` b WHERE a.SongId = b.SongId ".$orderByQuery." LIMIT 20 ";

  //echo $query; die();
  $result = $mysqli->query($query);


  if($result)
   {
    return $result;
   }

return Null;
}


 function indexDB($startFromAlbumId,$endAtAlbumId)
 {
    global $mysqli;
    global $songsTable;
    global  $database;
    global $indexAttribute;
    global $albumTable;
  // indexing our songs table
  //TagIs : 1 for song name , 2 for artist tag , 3 for album tag
  if($startFromAlbumId==0 && $endAtAlbumId == 0)
      $query = "SELECT a.`SongName`,a.`SongId`,b.`AlbumName`,a.`SongSinger` FROM `".$songsTable."` a, `".$albumTable."` b WHERE a.`AlbumId` = b.`AlbumId` ";
  else
      $query = "SELECT a.`SongName`,a.`SongId`,b.`AlbumName`,a.`SongSinger` FROM `".$songsTable."` a, `".$albumTable."` b WHERE a.`AlbumId` = b.`AlbumId` AND a.`AlbumId` > ".$startFromAlbumId." AND a.`AlbumId` <= ".$endAtAlbumId." ";
 //echo $query;
  $result = $mysqli->query($query);
  echo 'index table';
  //print_r($result);
  while($row = $result->fetch_assoc())
   {
     //adding song name tag to db
     $name = $row['SongName'];
     echo $row['SongId'];
     $mysqli->query("INSERT INTO  `".$database."`.`songs_indexed` (".$indexAttribute.")VALUES (NULL ,  '". $name."',  '".$row['SongId']."' , '1' );");
     $tags = explode(" ",trim($name));
     foreach($tags as $tag)
     {
       $mysqli->query("INSERT INTO  `".$database."`.`songs_indexed` (".$indexAttribute.")VALUES (NULL ,  '".$tag."',  '".$row['SongId']."' , '1' );");
     }
     
     //adding singers name tag
     $name = $row['SongSinger'];
     $tags = explode(" ",trim($name));
     foreach($tags as $tag)
     {
       $mysqli->query("INSERT INTO  `".$database."`.`songs_indexed` (".$indexAttribute.")VALUES (NULL ,  '".$tag."',  '".$row['SongId']."' , '2' );");
     }
     
     //adding album names tag
     $name = $row['AlbumName'];
     $tags = explode(" ",trim($name));
     foreach($tags as $tag)
     {
       $mysqli->query("INSERT INTO  `".$database."`.`songs_indexed` (".$indexAttribute.")VALUES (NULL ,  '".$tag."',  '".$row['SongId']."' , '3' );");
     }
   }

 }
 

 function indexLyricsToDB()
 {
    global $mysqli;
    global $songsTable;
    global  $database;
    global $indexAttribute;
    global $albumTable;
  // indexing our songs table
  //TagIs : 1 for song name , 2 for artist tag , 3 for album tag
 $query = "SELECT `SongLyrics`,`SongId` FROM `".$songsTable."` ";
 echo $query;
  $result = $mysqli->query($query);
  echo 'index table';
  //print_r($result);
  while($row = $result->fetch_assoc())
   {
     //adding song name tag to db
     $name = $row['SongLyrics'];
     $tags = explode(" ",trim($name));
     foreach($tags as $tag)
     {
       if($tag != "")
         $mysqli->query("INSERT INTO  `".$database."`.`lyrics_indexed` (`Id`, `Tag`, `SongId`)VALUES (NULL ,  '".$tag."',  '".$row['SongId']."' );");
     }

   }

 }


 function clearIndexTable()
 {
    global $mysqli;
    global $songsTable;
    global  $database;
    global $indexTable;

  // indexing our songs table
 $query = "DELETE  FROM ".$indexTable." ";
  $mysqli->query($query);
 }
 
 function clearLyricsIndexTable()
 {
    global $mysqli;
    global  $database;

  // indexing our songs table
 $query = "DELETE  FROM `lyrics_indexed` ";
  $mysqli->query($query);
 }

/*******************index**************************/




/************dedication*****************************/

$dedicationTable = "dedication";
$dedicationTableAttribute = " `dedicationId`, `dedicationLyrics`, `dedicationBy`, `dedicationTo`, `songId`, `songCategory`, `dedicationByEmail`, `personalMessage`, `dedicationDate`, `likes` , `feedback` ,`cardColor`";

function insertIntoDedication($deicationLyrics,$dedicationBy,$dedicationTo,$songId,$songCategory,$dedicationByEmail,$personalMessage,$feedback,$color)
{
  global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;


  $deicationLyrics = mysqli_real_escape_string($mysqli, $deicationLyrics);
  $dedicationBy = mysqli_real_escape_string($mysqli, $dedicationBy);
  $dedicationTo = mysqli_real_escape_string($mysqli, $dedicationTo);
  $songId = mysqli_real_escape_string($mysqli, $songId);
  $songCategory = mysqli_real_escape_string($mysqli, $songCategory);
  $dedicationByEmail = mysqli_real_escape_string($mysqli, $dedicationByEmail);
  $personalMessage = mysqli_real_escape_string($mysqli, $personalMessage);
  $feedback = mysqli_real_escape_string($mysqli, $feedback);
  $color = mysqli_real_escape_string($mysqli, $color);


  $query = "INSERT INTO `".$database."`.`".$dedicationTable."` (".$dedicationTableAttribute.") VALUES (NULL, '".$deicationLyrics."' , '".$dedicationBy."' ,'".$dedicationTo."' , '".$songId."' , '".$songCategory."' , '".$dedicationByEmail."' , '".$personalMessage."' , NOW(), '0' , '".$feedback."' , '".$color."' );";
  //echo $query; die();
  return $mysqli->query($query);

}


function increaseLikesCount($dedicationId)
{
  
  global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;
  
  
  $dedicationId = mysqli_real_escape_string($mysqli, $dedicationId);

  $query = " UPDATE `".$database."`.`".$dedicationTable."`  SET `Likes` = `Likes`+1   WHERE `dedicationId` =  '".$dedicationId."' ";
  return $mysqli->query($query);
}

function getDedication($dedicationId)
{

  global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;
  
  
  $dedicationId = mysqli_real_escape_string($mysqli, $dedicationId);

  $query = " SELECT * FROM `".$database."`.`".$dedicationTable."`  WHERE `dedicationId` =  '".$dedicationId."' ";
  $result=$mysqli->query($query);
  return $result->fetch_assoc();
}


function getDedicationsOfWeek($page)
{
  global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;

   $page = mysqli_real_escape_string($mysqli, $page);

  $dedicationsInPage = 6;
  $toSkip = ($page-1)*$dedicationsInPage;

  $query = " SELECT * FROM `".$database."`.`".$dedicationTable."` WHERE WEEK(`dedicationDate`) = WEEK(CURRENT_TIMESTAMP) AND  YEAR(`dedicationDate`) = YEAR(CURRENT_TIMESTAMP) ORDER BY `likes` DESC LIMIT ".$toSkip.", ".$dedicationsInPage."";
  //echo $query;
  $result=$mysqli->query($query);
  return $result;

}



function getTopDedicationsOfWeek()
{
  global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;


  $query = " SELECT * FROM `".$database."`.`".$dedicationTable."` WHERE WEEK(`dedicationDate`) = WEEK(CURRENT_TIMESTAMP) AND  YEAR(`dedicationDate`) = YEAR(CURRENT_TIMESTAMP) ORDER BY `likes` DESC LIMIT 3";
  //echo $query;
  $result=$mysqli->query($query);
  return $result;

}

function getLikes($dedicationId)
{
   global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;


  $dedicationId = mysqli_real_escape_string($mysqli, $dedicationId);
  

  $query = " SELECT `likes` FROM `".$database."`.`".$dedicationTable."`  WHERE `dedicationId` =  '".$dedicationId."' ";
  $result=$mysqli->query($query);
  $row = $result->fetch_assoc();
  return $row['likes'];
}


function getTotalNumberOfDedicationOfWeek()
{
 global $dedicationTable;
  global $dedicationTableAttribute;
  global $database;
  global $mysqli;


  $query = " SELECT COUNT(*) FROM `".$database."`.`".$dedicationTable."` WHERE WEEK(`dedicationDate`) = WEEK(CURRENT_TIMESTAMP) AND  YEAR(`dedicationDate`) = YEAR(CURRENT_TIMESTAMP) ";
  //echo $query;
  $result=$mysqli->query($query);
  $row= $result->fetch_assoc();
  return $row['COUNT(*)'];
}
/******************dedication ends*******************/






/*************LIkes **********************************/

$likesTable = "likes";
$likesTableAttributes = "`likesId`, `ip`, `dedicationId`, `dateAdded`";

function addLike($ip,$dedicationId)
{
  global $likesTable;
  global $likesTableAttributes;
  global $database;
  global $mysqli;


  $ip = mysqli_real_escape_string($mysqli, $ip);
  $dedicationId = mysqli_real_escape_string($mysqli, $dedicationId);


  $query = "SELECT * FROM `".$database."`.`".$likesTable."` WHERE `ip` = '".$ip."' AND `dedicationId` = '".$dedicationId."' "  ;
  $result = $mysqli->query($query);
  if(mysqli_num_rows($mysqli->query($query)) == null)
   {
    $query = "INSERT INTO `".$database."`.`".$likesTable."` (".$likesTableAttributes.") VALUES (NULL, '".$ip."', '".$dedicationId."', CURRENT_TIMESTAMP);";
    
    if($mysqli->query($query))
      {
        increaseLikesCount($dedicationId);
      }
   }



  return getLikes($dedicationId);
}


/*******************likes ends ****************************/




?>