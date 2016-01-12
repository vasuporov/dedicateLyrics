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

ini_set('max_execution_time', 12000);
//Open a new connection to the MySQL server
$mysqli = new mysqli($hostname,$UserNAme,$PaSswoRd,$database);

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}



$get = file_get_contents('UpdatedLyrics2.xml');
$arr = simplexml_load_string($get);

//print_r($arr);
$ii=600;
foreach($arr->category as $category)
   {

     foreach($category->album as $album)
     {



        $albumName = $album->albumName;
        $albumImage = $album->albumImage;

        //$timestamp=time()+$ii;

        $result =  $mysqli->query("SELECT * FROM `lyrics`.`albums` WHERE `AlbumName` = '".$albumName."' ");

        //print_r($result);
        if ($result->num_rows != 0)
        {
           echo 'Already Present'.$albumName;
          //$mysqli->query("UPDATE  `u681566632_lyric`.`albums` SET `DateCreated` = CURRENT_TIMESTAMP  WHERE `AlbumName` = '".$albumName."'  ");
        }
        else
        {

              $mysqli->query("INSERT INTO  `u681566632_lyric`.`albums` (
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

               $result = $mysqli->query("SELECT `AlbumId` FROM  `albums` WHERE  `AlbumImage` =  '".$albumImage."' ");
               if($result)
                {
                  $row = $result->fetch_assoc();
                  $albumId = $row['AlbumId'];
                }
      
      
              echo $albumName.'<br>';

              foreach($album->song as $song)
               {
                 
                  $ii--;
                 $songName = $song->songName;
                 $songMovieName = $song->movieName;
                 $songMusicBy = $song->musicBy;
                 $songLyricist = $song->lyricist;
                 $songSinger = $song->singer;
                 $songLyrics = $song->lyrics;

                 echo '------------'.$songName.'<br>';

                 $result = $mysqli->query("SELECT * FROM `u681566632_lyric`.`songs` WHERE `SongName` = '".$songName."' ");
                 if($result->num_rows != 0)
                 {   $ii--;
                    $ii=0;
                   $mysqli->query("UPDATE `u681566632_lyric`.`songs` SET `DateCreated` = CURRENT_TIMESTAMP , `TotalVisits` = '".$ii."' WHERE `SongName` = '".$songName."' ");
                   echo 'Song Already Present - '.$songName.' - '.$ii.' \n\n';
                 }
                 else
                 {    $ii--;
                       $ii=0;
                 $mysqli->query("
                   INSERT INTO  `u681566632_lyric`.`songs` (
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
                      NULL ,  '".$songName."',  '".$albumId."',  '".$songMusicBy."',  '".$songLyricist."',  '".$songSinger."',  '".$songLyrics."',  '".$ii."',CURRENT_TIMESTAMP,
                      CURRENT_TIMESTAMP
                      );
      
      
                 ");
                 }
               }



     }
   }

?>