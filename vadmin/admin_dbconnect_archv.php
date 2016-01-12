<meta name="robots" content="noindex,nofollow">
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

  $indexAttribute = '`Id` ,
`Tag` ,
`SongId`,
`TagIs`';


function insertIntoAlbum($albumName , $albumImage)
{
  global $mysqli;

  return $mysqli->query("INSERT INTO  `albums` (
                `AlbumId` ,
                `AlbumName` ,
                `AlbumImage` ,
                `TotalVisits` ,
                `DateEdited`,
                `DateCreated`
                )
                VALUES (
                NULL ,  '".$albumName."',  '".$albumImage."',  '0',CURRENT_TIMESTAMP,
                CURRENT_TIMESTAMP
                );");
}

function getAlbumId($albumImage)
{
   global $mysqli;
  $result = $mysqli->query("SELECT `AlbumId` FROM  `albums` WHERE  `AlbumImage` =  '".$albumImage."' ");
               if($result)
                {
                  $row = $result->fetch_assoc();
                  $albumId = $row['AlbumId'];
                }
                
      return $albumId;
}



function insertIntoSong($songName , $albumId , $songMusicBy , $songLyricist , $songSinger , $songLyrics)
{

  global $mysqli;
 $result =  $mysqli->query("
                   INSERT INTO  `songs` (
                      `SongId` ,
                      `SongName` ,
                      `AlbumId` ,
                      `SongMusicBy` ,
                      `SongLyricist` ,
                      `SongSinger` ,
                      `SongLyrics` ,
                      `TotalVisits` ,
                      `DateEdited`,
                      `DateCreated`
                      )
                      VALUES (
                      NULL ,  '".$songName."',  '".$albumId."',  '".$songMusicBy."',  '".$songLyricist."',  '".$songSinger."',  '".$songLyrics."',  '0',CURRENT_TIMESTAMP,
                      CURRENT_TIMESTAMP
                      )");
                      
                      
                      indexSongToDb(getSongIndex($songName,$albumId,$songLyrics));
  return $albumId;
}

function getSongIndex($songName,$albumId,$songLyrics)
{
  global $mysqli;
   $result = $mysqli->query("SELECT `SongId` FROM  `songs` WHERE  `SongName` =  '".$songName."' AND `AlbumId`='".$albumId."'  AND `SongLyrics` = '".$songLyrics."'  ");
               if($result)
                {
                  $row = $result->fetch_assoc();
                  $SongId = $row['SongId'];
                }
                
      return $SongId;

}

function indexSongToDb($songId)
 {
    global $mysqli;
    global  $database;
    global $indexAttribute;
  // indexing our songs table
  //TagIs : 1 for song name , 2 for artist tag , 3 for album tag
     $query = "SELECT a.`SongName`,a.`SongId`,b.`AlbumName`,a.`SongSinger` FROM `songs` a, `albums` b WHERE a.`AlbumId` = b.`AlbumId` AND a.`SongId` = '".$songId."' ";


  $result = $mysqli->query($query);
  //echo 'index table';
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
 
 
 
 function updateDedication($dedicationId ,$dedicationAttribute,$dedicationAttributeValue)
 {
   global $mysqli;
   global $database;
   /*
     Mapping  $dedicationAttribute and dedication tables columns
                     1                           likes
                     2                        dedicationBy
                     3                        dedicationTo
                     4                             ps
                     5                            date
   */
   
   $dedicationTable = "dedication";
   $dedicationTableAttribute = " `dedicationId`, `dedicationLyrics`, `dedicationBy`, `dedicationTo`, `songId`, `songCategory`, `dedicationByEmail`, `personalMessage`, `dedicationDate`, `likes` , `feedback` ,`cardColor`";

   $mappedColumns = array('likes','dedicationBy','dedicationTo','personalMessage','dedicationDate');

   $result = $mysqli->query(
    "
      UPDATE `".$database."`.`".$dedicationTable."`  SET `".$mappedColumns[$dedicationAttribute-1]."` = '".$dedicationAttributeValue."'   WHERE `dedicationId` =  '".$dedicationId."'
    "
   );


   return $result;


 }



?>