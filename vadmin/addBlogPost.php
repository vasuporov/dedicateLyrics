<?php


//@require_once($mainFolder.'dbconnect.php');

$errorMessageAddBlogPost ='';
if(isset($_POST['addBlogPostSubmit']))
 {

    /*$addSongAlbumId = $_POST['addBlogPostTitle'];
    $addSongName =    $_POST['addBlogPostOneLiner'];
    $addSongMusicBy =   $_POST['addBlogPostAddedBy'];
    $addSongLyricsBy =   $_POST['addBlogPostCategory'];
    $addSongSinger =    $_POST['addBlogPostTags'];
    $addSongLyrics =    $_POST['addBlogPostPutOnCarousel'];
    $addSongLyrics =    $_POST['addBlogPostDescription'];
    $addSongLyrics =    $_POST['addBlogPostProfileImage'];
    addBlogPostCoverImage*/
    
    $coverImageLocation   = '';
    $profileImageLocation = '';
    
    
    if(!verifyTitle($_POST['addBlogPostTitle'])) //title must be unique
     {
       $errorMessageAddBlogPost ='Title should be unique';
     }


    $blogUrl = str_replace("'","",$_POST['addBlogPostTitle']);
    $blogUrl = str_replace('"',"",$blogUrl);
    $blogUrl = str_replace('!',"",$blogUrl);
    $blogUrl = str_replace(" ","-",$blogUrl);

    if($errorMessageAddBlogPost == '' && !empty($_FILES['addBlogPostProfileImage']['name']) && !empty($_FILES['addBlogPostCoverImage']['name']))
       {
        $profile = $_FILES['addBlogPostProfileImage'];
        $cover   = $_FILES['addBlogPostCoverImage'];
        $profileImageExtension = strtolower(substr($profile['name'],strpos($profile['name'],'.')+1));
        $coverImageExtension = strtolower(substr($cover['name'],strpos($cover['name'],'.')+1));
        $profileImageLocation = '../blog/images/'.$blogUrl.'-profile.'.$profileImageExtension;
        $coverImageLocation = '../blog/images/'.$blogUrl.'-cover.'.$coverImageExtension;
        $finalProfileImageLocation = 'images/'.$blogUrl.'-profile.'.$profileImageExtension;
        $finalCoverImageLocation   = 'images/'.$blogUrl.'-cover.'.$coverImageExtension;
        //validating the image
                      if(!empty($profile) && ($profileImageExtension=='jpeg'||$profileImageExtension=='jpg'||$profileImageExtension=='png' )&& ($profile['type']=='image/jpeg'||$profile['type']=='image/png'))
                      {
                         //save image into images/astrologers/
                          if(move_uploaded_file($profile['tmp_name'],$profileImageLocation))
                           {
                             //image saved
                           }
        
                      }
                      else
                      {
                        $errorMessageAddBlogPost='Image must be jpg or png.';
                      }
                      
                      if(!empty($cover) && ($coverImageExtension=='jpeg'||$coverImageExtension=='jpg'||$coverImageExtension=='png' )&& ($cover['type']=='image/jpeg'||$cover['type']=='image/png'))
                      {
                         //save image into images/astrologers/
                          if(move_uploaded_file($cover['tmp_name'],$coverImageLocation))
                           {
                             //image saved
                           }
        
                      }
                      else
                      {
                        $errorMessageAddBlogPost='Image must be jpg or png.';
                      }
  
       }
       
       

      //if image is uploaded successsfully the insert info to database
     if($errorMessageAddBlogPost == '')
      {

        if(insertIntoBlog($_POST['addBlogPostTitle'] , $_POST['addBlogPostOneLiner'] ,$_POST['addBlogPostAddedBy'] , $_POST['addBlogPostCategory'] , $_POST['addBlogPostTags'], $_POST['addBlogPostPutOnCarousel'],$finalProfileImageLocation , $finalCoverImageLocation  ,  $_POST['addBlogPostDescription']))
            $errorMessageAddBlogPost ='Data Inserted Successfully.';
        else
            $errorMessageAddBlogPost ='Error Occured, while connecting server!';
      }

 }

?>


<br>


<center>

<div class="label label-danger"  id="errorMessageAddBlogPost"><?php echo $errorMessageAddBlogPost;?></div>
<form class="form-horizontal" role="form" id="addSong" ENCTYPE="multipart/form-data" method="POST" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostTitle">Blog Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addBlogPostTitle" name="addBlogPostTitle" placeholder="Enter title for blog" <?php if(isset($_POST['addBlogPostTitle'])) echo 'value = "'.$_POST['addBlogPostTitle'].'"';?> required> <br>
      (No special chars only ' or " Try to keep it 50-70 characters maximum having the keywords as well.)
      </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostOneLiner">One Liner :</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="addBlogPostOneLiner" name="addBlogPostOneLiner" placeholder="Enter one liner" <?php if(isset($_POST['addBlogPostOneLiner'])) echo 'value = "'.$_POST['addBlogPostOneLiner'].'"';?> required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostAddedBy">Added By :</label>
    <div class="col-sm-10"> 
       <select class="form-control" id="addBlogPostAddedBy" name="addBlogPostAddedBy" <?php if(isset($_POST['addBlogPostTitle'])) echo $_POST['addBlogPostOneLiner'];?> required>
        <option value="Vasu Porov"    <?php if(isset($_POST['addBlogPostAddedBy'])){if($_POST['addBlogPostAddedBy']=='Vasu Porov') echo 'SELECTED';} ?> >Vasu Porov</option>
        <option value="Anant Agarwal" <?php if(isset($_POST['addBlogPostAddedBy'])){if($_POST['addBlogPostAddedBy']=='Anant Agarwal') echo 'SELECTED';} ?> >Anant Agarwal</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostCategory">Category :</label>
    <div class="col-sm-10"> 
      <select class="form-control" id="addBlogPostCategory" name="addBlogPostCategory" required>
        <option value="bollywood-gossips" <?php if(isset($_POST['addBlogPostCategory'])){if($_POST['addBlogPostCategory']=='bollywood-gossips') echo 'SELECTED';} ?> >bollywood-gossips</option>
        <option value="bollywood-movies"  <?php if(isset($_POST['addBlogPostCategory'])){if($_POST['addBlogPostCategory']=='bollywood-movies') echo 'SELECTED';} ?> >bollywood-movies</option>
        <option value="bollywood-music"   <?php if(isset($_POST['addBlogPostCategory'])){if($_POST['addBlogPostCategory']=='bollywood-music') echo 'SELECTED';} ?> >bollywood-music</option>
        <option value="zingo-post"        <?php if(isset($_POST['addBlogPostCategory'])){if($_POST['addBlogPostCategory']=='zingo-post') echo 'SELECTED';} ?> >zingo-post</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostTags">Tags(keywords) :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="addBlogPostTags" name="addBlogPostTags" placeholder="Enter tags for the blog" <?php if(isset($_POST['addBlogPostTags'])) echo 'value = "'.$_POST['addBlogPostTags'].'"';?> required>
      (Add multiple by using semicolon in between like arijit;music;soch )
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostPutOnCarousel">Put on carousel homepage :</label>
    <div class="col-sm-10"> 
      <select class="form-control" id="addBlogPostPutOnCarousel" name="addBlogPostPutOnCarousel" required>
        <option value="0" <?php if(isset($_POST['addBlogPostPutOnCarousel'])){if($_POST['addBlogPostPutOnCarousel']=='0') echo 'SELECTED';} ?> >No</option>
        <option value="1" <?php if(isset($_POST['addBlogPostPutOnCarousel'])){if($_POST['addBlogPostPutOnCarousel']=='1') echo 'SELECTED';} ?> >Yes</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostCoverImage">Upload Cover Image(Jpeg min possible size 600x300):</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="addBlogPostCoverImage" name="addBlogPostCoverImage"  required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostProfileImage">Upload Profile Image(Jpeg min possible size 150x200):</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="addBlogPostProfileImage" name="addBlogPostProfileImage"  required>
    </div>
  </div>
  

  <div class="form-group">
    <label class="control-label col-sm-2" for="addBlogPostDescription">Description :</label>
    <div class="col-sm-10"> 
      <textarea class="form-control" rows="7" id="addBlogPostDescription" name="addBlogPostDescription"><?php if(isset($_POST['addBlogPostDescription'])) echo $_POST['addBlogPostDescription'];?></textarea> <br/>
        Tips: Its better to have 2-3 lines of small para so use blank lines in between <br />use &lt;br /&gt; to add a blank line <br/>  &lt;u&gt;<u>For underlined text</u> &lt;/u&gt;  &lt;b&gt;<b>For bold text</b>&lt;/b&gt; &lt;i&gt;<i>For italic text</i>&lt;/i&gt;
    </div>
  </div>


  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" id="addBlogPostSubmit" name="addBlogPostSubmit">
      <input type="reset" class="btn btn-default" name="Reset" >
    </div>
  </div>
</form>

</center>
	