<meta name="robots" content="noindex,nofollow">
<?php


//@require_once($mainFolder.'dbconnect.php');

$errorMessageAddAlbum ='';
if(isset($_POST['addAlbumSubmit']))
 {

    $albumName = $_POST['addAlbumName'];
    
    
    
    if(!empty($_FILES['addAlbumImage']['name']))
       {
        $image = $_FILES['addAlbumImage'];
        $imageExtension = strtolower(substr($image['name'],strpos($image['name'],'.')+1));
        $imageLocation = '../lyricsAlbum/'.$albumName.'.'.$imageExtension;
        //validating the image
                      if(!empty($image) && ($imageExtension=='jpeg'||$imageExtension=='jpg'||$imageExtension=='png' )&& ($image['type']=='image/jpeg'||$image['type']=='image/png'))
                      {
                         //save image into images/astrologers/
                          if(move_uploaded_file($image['tmp_name'],$imageLocation))
                           {
                             //image saved
                           }
        
                      }
                      else
                      {
                        $errorMessageAddAlbum='Image must be jpg or png.';
                      }
  
       }
       
       

      //if image is uploaded successsfully the insert info to database
     if($errorMessageAddAlbum == '')
      {

        if(insertIntoAlbum($albumName , 'lyricsAlbum/'.$albumName.'.'.$imageExtension))
            $errorMessageAddAlbum ='Data Inserted Successfully. Albums ID is : '.getAlbumId('lyricsAlbum/'.$albumName.'.'.$imageExtension);
        else
            $errorMessageAddAlbum ='Error Occured, while connecting server!';
      }


 }

?>


<br>


<center>

<div class="label label-danger"  id="errorMessageAddAlbum"><?php echo $errorMessageAddAlbum;?></div>

<br><br>
<form class="form-horizontal" role="form" id="addAlbum" ENCTYPE="multipart/form-data" method="POST" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="addAlbumName">Album Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addAlbumName" name="addAlbumName" placeholder="Enter Album Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addAlbumImage">Upload Album Image(Jpeg min possible size):</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="addAlbumImage" name="addAlbumImage" placeholder="Enter password" required>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" id="addAlbumSubmit" name="addAlbumSubmit">
    </div>
  </div>
</form>

</center>
