<?php


//@require_once($mainFolder.'dbconnect.php');

$errorMessageAddSong ='';
if(isset($_POST['addSongSubmit']))
 {

    $addSongAlbumId = $_POST['addSongAlbumId'];
    $addSongName =    $_POST['addSongName'];
    $addSongMusicBy =   $_POST['addSongMusicBy'];
    $addSongLyricsBy =   $_POST['addSongLyricsBy'];
    $addSongSinger =    $_POST['addSongSinger'];
    $addSongLyrics =    $_POST['addSongLyrics'];
    

        if(insertIntoSong($addSongName , $addSongAlbumId , $addSongMusicBy , $addSongLyricsBy , $addSongSinger , $addSongLyrics))
            $errorMessageAddSong ='Data Inserted Successfully.';
        else
            $errorMessageAddSong ='Error Occured, while connecting server!';


 }

?>


<br>


<center>

<div class="label label-danger"  id="errorMessageAddSongs"><?php echo $errorMessageAddSong;?></div>
<form class="form-horizontal" role="form" id="addSong" ENCTYPE="multipart/form-data" method="POST" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongAlbumId">Album Id</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addSongAlbumId" name="addSongAlbumId" placeholder="Enter Album Id" required> <br>
      (go to album page eg:http://www.dedicatelyrics.com/<STRONG>4105</STRONG>/Prem-Ratan-Dhan-Payo.htm , here 4105 is id of album)
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongName">Songs Name :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="addSongName" name="addSongName" placeholder="Enter Songs name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongMusicBy">Music By :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="addSongMusicBy" name="addSongMusicBy" placeholder="Enter Music given by" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongLyricsBy">Lyrics By :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="addSongLyricsBy" name="addSongLyricsBy" placeholder="Enter Lyrics given by" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongSinger">Singer Name :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="addSongSinger" name="addSongSinger" placeholder="Enter singers name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addSongLyrics">Lyrics :</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" rows="7" id="addSongLyrics" name="addSongLyrics"></textarea>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" id="addSongSubmit" name="addSongSubmit">
    </div>
  </div>
</form>

</center>
