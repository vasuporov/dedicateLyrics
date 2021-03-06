


<script type="text/javascript" src="ajaxDedication.js"></script>


<link href='<?php echo $mainUrl;?>css/materializemin.css' rel='stylesheet' type='text/css'>


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "11a23d95-c220-493e-9bcc-0286629743a8", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>



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


<script>

function myAlertFunction() {
    var textComponent = document.getElementById('myText');
  var selectedText;
  // IE version
  if (document.selection != undefined)
  {
    textComponent.focus();
    var sel = document.selection.createRange();
    selectedText = sel.text;
  }
  // Mozilla version
  else if (textComponent.selectionStart != undefined)
  {
    var startPos = textComponent.selectionStart;
    var endPos = textComponent.selectionEnd;
    selectedText = textComponent.value.substring(startPos, endPos)
  }
  //alert("You selected: " + selectedText);
  var lines = selectedText.split("\n").length;
  var characters = selectedText.length;
  $("#myText").removeClass("error");
  $("#myText").removeClass("noerror");
  var tarea = document.getElementById('myText');
  if(lines >=2 && lines <= 4 && characters >=50 && characters <400)
  {
   tarea.className = tarea.className +"  noerror";
   document.getElementById('linesCharStats').innerHTML="<span class='label label-success'>Characters Selected : "+characters+"</span>";
  }
  else
  {
   tarea.className = tarea.className +"  error";
   document.getElementById('linesCharStats').innerHTML="<span class='label label-danger'>Characters Selected : "+characters+"</span>";
   $("#linesCharStats").delay(100).fadeOut().fadeIn('slow');
  }
   


  document.getElementById('youselected').innerHTML=selectedText;
}



  $(document).ready(function() {

    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');

        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });

    $('ul.setup-panel li.active a').trigger('click');

    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        var $dedicationText =  document.getElementById('youselected').innerText;
        $dedicationText = $dedicationText.trim();
        //alert($dedicationText);
        if($dedicationText == '' || $dedicationText == ' ' )
          alert('Please first select lines of song.');
        else if($dedicationText.split("\n").length > 4)
         {
          alert('Sorry! you can select maximun 4 lines.');
         }
        else if($dedicationText.split("\n").length < 2)
         {
           alert('Sorry! you have to select minimum 2 lines.');
         }
         else if($dedicationText.length < 50)
         {
            alert('Sorry! you can select minimum 50 characters.');
         }
         else if($dedicationText.length > 400)
         {
            alert('Sorry! you can select maximum 400 characters.');
         }
        else
         {
          $('ul.setup-panel li:eq(1)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-2"]').trigger('click');
          //$(this).remove();
         }
    })

    $('#activate-step-3').on('click', function(e) {
        //alert(document.getElementById('youselected').innerText);
         document.getElementById('error').innerText= "";
        if(validateForm())
         {
        document.getElementById('mainData').style.visibility='hidden';
        document.getElementById("loadedData").innerHTML = "<div align='center'><br><br><br><br><br><br><br><br><br><img src='images/musicalloader.gif' ><br> Please wait we are working on your dedication card... <br><br><br><br><br><br><br><br><br></div>";

        process();
         }
    })

});

function validateForm()
{

  document.getElementById('error').innerText= "";
  var $dedicationBy = document.getElementById('your-name').value;
  var $dedicationByEmail = document.getElementById('your-email').value;
  var $dedicationTo = document.getElementById('dedicated-to-name').value;
  var $category = document.getElementById('song-category').value;
  var $feedbacks = document.getElementById('suggestions').value;
  var $specialMessage = document.getElementById('special-message').value;

  var emailRegx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var nameRegx = /^[a-zA-Z\s]{3,20}$/;
  console.log("Your name test : "+nameRegx.test($dedicationBy)+" "+$dedicationBy);
  console.log("Email test : "+emailRegx.test($dedicationByEmail)+" "+$dedicationByEmail);

  if($dedicationBy.length < 3)
    {
      displayError("Your name must contain atleast 3 characters.");
      return false;
    }


  if(!nameRegx.test($dedicationBy))
     {
       displayError("Your name is invalid! only alpbhabets are allowed.");
       return false;
     }
     


   if(!emailRegx.test($dedicationByEmail))
     {
       displayError("Enter valid email Address.");
       return false;
     }
    
     if($dedicationTo.length < 3)
    {
      displayError("Dedicating to's name must contain atleast 3 characters.");
      return false;
    }

      if(!nameRegx.test($dedicationTo))
     {
       displayError("Dedicating to's name is invalid! only alpbhabets are allowed.");
       return false;
     }    
    
   if($category.trim() == "")
   {
      displayError("Please select song category.");
       return false;
   }

  return true;
}


function displayError($errorText)
{

  document.getElementById('error').innerText= $errorText;
  $("#error").delay(1000).fadeOut().fadeIn('slow');
}


</script>



<?php
global $songId;
global $songDetails;

?>


<!-- WRAP-->
<div class="wrap">





<!-- container -->
   <div class="container" >
	<div class="col-md-8">
	  <h1>Dedicate Lyrics of "<?php echo $songDetails['SongName'];?>"</h1>
          
          <div id="loadedData"></div>



        <div id="mainData">
    	<div class="row form-group " >
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active">
                       <a href="#step-1">
                        <h4 class="list-group-item-heading">Select Lyrics</h4>
                        <p class="list-group-item-text">You just need to highlight/select the lines of song you want to dedicate!</p>
                    </a></li>
                    <li class="disabled"><a href="#step-2">
                        <h4 class="list-group-item-heading">Enter Details</h4>
                        <p class="list-group-item-text">How you want it to be displayed? whom you want to dedicate?</p>
                    </a></li>
                   <!-- <li class="disabled"><a href="#step-3">
                        <h4 class="list-group-item-heading">Publish</h4>
                        <p class="list-group-item-text">Share! Get max likes & your dedication will be on homepage!</p>
                    </a></li>  -->
                </ul>
            </div>
    	</div>
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center" align="center">
                   <!-- <h3> Lyrics of "<?php echo $songDetails['SongName'];?>"</h3> ->>

                     <!--<input type="text" id="myText" value="Some text.." onselect="myAlertFunction()">-->
                     <div id="linesCharStats" style="float:right"></div>
                    <textarea id="myText" onselect="myAlertFunction()" style="width:100%; height:350px;" readonly><?php echo $songDetails['SongLyrics'];?></textarea>
    
                    You have selected :
                    <pre id="youselected"></pre>
                    <button id="activate-step-2" class="btn btn-primary btn-lg">Next Step</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12 well" align="center">
                    <h3 class="text-center"> Fill Details</h3>
    
                      <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="your-name">Your Name* :</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" id="your-name" placeholder="Enter your Name(Minimum 3 characters) " maxlength="30" pattern="[A-Za-z]">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="your-email">Your email* :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="your-email" placeholder="Enter your email address (Link to ur dedication will be sent here)">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="dedicated-to-name" >Whom you are dedicating it* :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="dedicated-to-name" placeholder="Enter name to whom you are dedicating.(Minimum 3 characters)" maxlength="20">
                            </div>
                          </div>
                          

                          <input type="hidden" id="songId" value="<?php global $songId; echo $songId; ?>">
                          

                          <div class="form-group">
                            <label for="song-category" class="control-label col-sm-4">Categorize this song* :</label>
                            <div class="col-sm-8">
                              <select class="form-control "  id="song-category">
                                <option value="">select category</option>
                                <option value="Romantic">Romantic</option>
                                <option value="Sufi">Sufi</option>
                                <option value="Poetic">Poetic</option>
                                <option value="Sad">Sad</option>
                                <option value="Ghazal">Ghazal</option>
                                <option value="Remix">Remix</option>
                                <option value="Patriotic">Patriotic</option>
                                <option value="Motivational">Motivational</option>
                                <option value="Dance">Dance</option>
                                <option value="Religious">Religious</option>
                              </select>
                             </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="suggestions">Feedbacks/suggestion for us :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="suggestions" placeholder="Your suggestions and feedbacks are highly required." maxlength="160">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4" for="special-message">Special message for him/her :</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="special-message" placeholder="Any special message you want to displayed." maxlength="30">
                            </div>
                          </div>


                           <div class="g-recaptcha" data-sitekey="6LfzBw8TAAAAALZnEpwQ8gSK6M9puxWs3NG0Rm0S" align="center"></div>

                        </form>
    
    


                           <div class="label label-danger" id="error"></div>   <br>               <br>
                              <button id="activate-step-3" class="btn btn-primary btn-lg">Finish</button>
                                <br>
                                <span class="label label-default">(By clicking finish, you agree to our TOU.) </span>

                </div>
            </div>
        </div>

    </div>

  </div>

        <?php @require('rightSidebar.php');?>

        </div>
 <!-- ENDS container -->


 </div>

 <!-- ENDS WRAP-->
