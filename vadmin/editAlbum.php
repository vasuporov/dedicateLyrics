<meta name="robots" content="noindex,nofollow">
<?php


//@require_once($mainFolder.'dbconnect.php');

$errorMessageEditAlbum ='';
$editAlbumAttributeValue ='';
if(isset($_POST['editAlbumSubmit']))
 {

    $albumId = $_POST['editAlbumId'];
    $editAlbumAttribute = $_POST['editAlbumAttribute'];
    
    if($editAlbumAttribute == '3')
      {
        //echo 'here';
        $albumDetails = getAlbumDetails($albumId);
        $albumName = $albumDetails['AlbumName'];


         //unlink('../'.$albumDetails['AlbumImage']);
        if(!empty($_FILES['editAlbumImage']['name']))
       {
        $image = $_FILES['editAlbumImage'];
        $imageExtension = strtolower(substr($image['name'],strpos($image['name'],'.')+1));
        $finalImageLoc =  'lyricsAlbum/'.$albumName.'-'.time().'.'.$imageExtension;
        $imageLocation = '../'.$finalImageLoc;
        $editAlbumAttributeValue = $finalImageLoc;
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
                        $errorMessageEditAlbum='Image must be jpg or png.';
                      }
  
       }

      }
    else
     {
       $editAlbumAttributeValue = $_POST['editAlbumAttributeValue'];
     }

     if($errorMessageEditAlbum == '')
      {
        if(updateAlbum($albumId ,$editAlbumAttribute,$editAlbumAttributeValue) )
            $errorMessageEditAlbum ='Update Successfully';
        else
            $errorMessageEditAlbum ='Error Occured, while connecting server!';
      }

 }

?>


<br>


<center>

<div class="label label-danger"  id="errorMessageAddAlbum"><?php echo $errorMessageEditAlbum;?></div>

<br><br>
<form class="form-horizontal" role="form" id="editAlbum" ENCTYPE="multipart/form-data" method="POST" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="editAlbumId">Album Id:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="editAlbumId" name="editAlbumId" placeholder="Enter Album Id" required>
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="editAlbumAttribute">Select Attribute:</label>
    <div class="col-sm-10">
      <select class="form-control" id="editAlbumAttribute" name="editAlbumAttribute" onchange="changeValueDiv()" required >
        <option value="">none</option>
        <option value="1">Date Created (Latest albums displayed based on it)</option>
        <option value="2">Change Album name</option>
        <option value="3">Change Album Image</option>
      </select>
    </div>
  </div>
  
  <div class="form-group" >
    <label class="control-label col-sm-2" for="editAlbumAttributeValue">Value of attribute:</label>
    <div class="col-sm-10" id="attributeValueDiv">
      <input type="text" class="form-control" id="editAlbumAttributeValue" name="editAlbumAttributeValue" placeholder="Enter value for above album" required>
       <br>(date format :2015-10-11 14:36:01)
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" id="editAlbumSubmit" name="editAlbumSubmit">
    </div>
  </div>
</form>

</center>


<script type="text/javascript" >
function changeValueDiv()
{

  var divTag = document.getElementById('attributeValueDiv');
  var selectedAttribute = document.getElementById('editAlbumAttribute').value;
  console.log('selected value changed '+selectedAttribute);
  if(selectedAttribute == 3)
   {
     divTag.innerHTML = '\
                         <input type="file" class="form-control" id="editAlbumImage" name="editAlbumImage"  required>\
                         ';
   }
   else
   {
     divTag.innerHTML = '\
                          <input type="text" class="form-control" id="editAlbumAttributeValue" name="editAlbumAttributeValue" placeholder="Enter value for above album" required> \
       <br>(date format :2015-10-11 14:36:01)\
                         ';
   }
}

</script>
