
<!-- WRAP-->
<div class="wrap">




<?php
$msgSubmit="";
  if(isset($_POST['form-submit']))
  {
    $ToEmail = 'contact@dedicatelyrics.com';
    $EmailSubject = $_POST['type'].$_POST['subject'];
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "Name: ".$_POST["name"].""; 
    $MESSAGE_BODY .= "Email: ".$_POST["email"].""; 
    $MESSAGE_BODY .= "Comment: ".nl2br($_POST["message"])."";
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
    $msgSubmit="Thanks! Your query has been sent, we will get back to you soon.";
  }

?>

<!-- single -->
   <div class="container">
   <div class="col-md-8">
	  <h1>Report US / Feedbacks</h1>
		 <div class="bottom" >
                     <div class="col-md-1"></div>

                      <div class="col-md-10" style="background:#f5f5f5;">

                          <form role="form" id="contactForm" data-toggle="validator" class="shake" action="#" method="post">
                              <div class="row">
                                  <div class="form-group col-sm-6">
                                      <label for="name" class="h4">Name</label>
                                      <input type="text" class="form-control" id="name" placeholder="Enter name" required data-error="NEW ERROR MESSAGE">
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-sm-6">
                                      <label for="email" class="h4">Email</label>
                                      <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>
                              
                              <div class="row">
                                   <div class="form-group col-sm-6">
                                      <label for="type" class="h4">Query Type</label>
                                      <select class="form-control "  id="type">
                                        <option value="Report Us : ">Report Us</option>
                                        <option value="Feedbacks/suggestions : ">Feedback/Suggestion</option>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-sm-6">
                                      <label for="subject" class="h4">Subject</label>
                                      <input type="text" class="form-control" id="subject" placeholder="Your subject goes here." required>
                                      <div class="help-block with-errors"></div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="message" class="h4 ">Message</label>
                                  <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
                                  <div class="help-block with-errors"></div>
                              </div>
                              <button type="submit" id="form-submit" class="btn viewAll btn-lg pull-right ">Submit</button>
                              <div id="msgSubmit" class="h3 text-center "><?php global $msgSubmit; echo $msgSubmit;?></div>
                              <div class="clearfix"></div>
                              <br />
                          </form>
                      </div>

			<div class="clearfix"> </div>


                </div>
    </div>
        <?php @require('rightSidebar.php');?>

   </div>
 <!-- ENDS single -->


 </div>
 <!-- ENDS WRAP-->
