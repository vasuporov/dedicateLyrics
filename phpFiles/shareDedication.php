<style>
      pre {
        //font-family: 'Pacifico', cursive;
        font-family: 'Dancing Script', cursive;
        font-size: 20px;
        line-height:2em;
        background:none;
      }
  </style>
<link href='<?php echo $mainUrl;?>css/materializemin.css' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="<?php echo $mainUrl;?>js/jquery2.js"></script>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "11a23d95-c220-493e-9bcc-0286629743a8", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=730320697114786";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style>
      .card-title {
      font-family: 'Oswald', sans-serif;
      		position: relative;
	width: 50%;
	font-size: 1em;
	font-weight: bold;
	padding: 6px 10px 6px 70px;
	margin: 0px 10px 5px -70px;
	color: #555;
	background-color: #999;
	text-shadow: 0px 1px 2px #bbb;
	-webkit-box-shadow: 0px 2px 4px #000;
	-moz-box-shadow: 0px 2px 4px #000;
	box-shadow: 0px 2px 4px #000;
      }


       .card:hover{
           box-shadow: 0 5px  5px 0 rgba(0,0,0,0.16),5px 10px 10px 5px rgba(0,0,0,0.12);
       }

    </style>

  <script type="text/javascript" src="<?php echo $mainUrl;?>ajaxLikes.js"></script>


   <?php
     global  $dedication;
     if(isset($_GET['info']))
     {
       
       echo "<script>
               $( document ).ready( function() {
            $( '#myModal' ).modal( 'toggle' );
        });  </script>";
     }
   ?>

    <!-- container -->
   <div class="container" >
 

	<div class="col-md-8">
	  <h1>Share your dedication!</h1>
            <center><h5> <span class="label label-danger " >&nbsp;&nbsp;Save your dedication's link :&nbsp;&nbsp;</span><br><span class="label label-danger " >www.dedicatelyrics.com/<?php echo $dedication['dedicationId'];?>/sharededication.htm</span></h5> </center>

            <div class="card  <?php echo $dedication['cardColor'];?> wow bounceIn" data-wow-delay="0.5s" >
                        <div class="card-content black-text">
                          <span class="card-title <?php echo explode(" ",trim($dedication['cardColor']))[0];?>" ><?php echo $dedication['dedicationTo'];?></span>
                          <pre align="center"><font size="26px;">"</font><?php echo $dedication['dedicationLyrics'];?><font size="10px;">."</font></pre>
                          <span style="float:right;" >-<?php echo $dedication['dedicationBy'];?></span>
                        </div>
                        <div class="card-action" >

                          <div id="likes<?php echo $dedication['dedicationId'];?>" class=" black-text badge alert-success" style="float:right;"><?php echo $dedication['likes']?> Likes</div><br>
                          <center>
                          <button class="viewAll" style="text-decoration: none;" id="<?php echo $dedication['dedicationId'];?>"  onclick="process(this)">&nbsp;Like&nbsp;</button>
                          <button type="button"  class="viewAll " data-toggle="modal" data-target="#myModal1">Share</button>
                          <button type="button"  class="viewAll " data-toggle="modal" data-target="#myModal2">Send as message</button>
                          <br>
                          <span class="white-text"><?php $ps = trim($dedication['personalMessage']); if($ps!='') echo 'PS : '.$dedication['personalMessage'];?> </span>
                          <div class="white-text" style="font:bold;" id="likesError<?php echo $dedication['dedicationId'];?>"> </div>
                          </center>
                        </div>

            </div> 
            <br><br><br><br>
            <div class="fb-like" data-href="http://www.dedicatelyrics.com/<?php echo $dedication['dedicationId'];?>/sharededication.htm" data-layout="box_count"></div>
            <div class="fb-share-button" data-href="http://www.dedicatelyrics.com/<?php echo $dedication['dedicationId'];?>/sharededication.htm" data-layout="box_count"></div>

            <div class="fb-comments" data-href="http://www.dedicatelyrics.com/<?php echo $dedication['dedicationId'];?>/sharededication.htm" data-numposts="5" data-width="100%"></div>
         </div>

        <?php @require('rightSidebar.php');?>

         <!-- Modal -->
              <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Share it.</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                             <span class='st_googleplus_large' displayText='Google +'></span>
                              <span class='st_facebook_large' displayText='Facebook'></span>
                              <span class='st_twitter_large' displayText='Tweet'></span>
                              <span class='st_pinterest_large' displayText='Pinterest'></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              
                </div>
              </div>
           <!-- Modal -->
           
           
           
           
           <!-- Modal -->
              <div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Send it to whom you dedicated.</h4>
                      </div>
                      <div class="modal-body">
                        <div>

                              <span class='st_fbsend_large' displayText='Facebook Send'></span>
                              <span class='st_whatsapp_large' displayText='WhatsApp'></span>
                              <span class='st_email_large' displayText='Email'></span>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
              
                </div>
              </div>
           <!-- Modal -->

        </div>
 <!-- ENDS container -->



 </div>
 <!-- ENDS WRAP-->
 
 <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display: none;">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Congratulations your dedication has been posted!</h4>
      </div>
      <div class="modal-body">
         <h3>What to do next?</h3>
         <ul>
             <li>Save your dedication's link <span class="label label-danger " >www.dedicatelyrics.com/<?php echo $dedication['dedicationId'];?>/sharededication.htm<span> </li>
             <li>Get maximum likes and your dedication will be on our homepage for the whole week.</li>
             <li>Send the dedication to whom you dedicated using our social plugins.</li>
             <li>Share the link with your friends, ask them to give it a shot.</li>
             <li>You can checkout the <a href="/dedicationWall.php">dedication wall<a> anytime</li>
         <ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
 <br/><br/><br/>  <br/><br/>