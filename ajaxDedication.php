<?php


      $error = "";

// getting the captcha
    $captcha = "";
    if (isset($_GET["captchaResponse"]))
        $captcha = $_GET["captchaResponse"];

    if (!$captcha)
        $error= "not ok";
    // handling the captcha and checking if it's ok
    $secret = "6LfzBw8TAAAAAK7kriYImP4liteL6gB6pR0q3QnD";
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

    if ($response["success"] == false)
     {
       $error="Invalid captcha!";
     }

  require('phpFiles/dbconnect.php');


  header('Content-Type: text/xml');

  $colors = array('red lighten-4',
'pink lighten-2',
 'pink lighten-3',
  'red accent-2',
   'pink accent-2',
    'deep-purple lighten-3',
    'purple lighten-3 #ce93d8',
    'deep-purple accent-1',
    'blue lighten-4',
    'cyan lighten-4',
    'green lighten-3',
    'teal lighten-3',
    'green accent-2',
    'teal accent-2',
    'lime lighten-3',
    'deep-orange lighten-3');

    $a = mt_rand(0,15); 

  echo '<response>';

      $dedicationBy =  trim($_GET['dedicationBy']);
      $dedicationLyrics = trim($_GET['dedicationLyrics']);
      $dedicationByEmail =  trim($_GET['dedicationByEmail']);
      $dedicationTo =  trim($_GET['dedicationTo']);
      $songCategory = trim($_GET['songCategory']);
      $feedback =  trim($_GET['suggestions']);
      $personalMessage =  trim($_GET['specialMessage']);
      $songId =  trim($_GET['songId']);


         /****SERVER SIDE VALIDATION ***********/


           if($error == "")
           {
             $numberOfLinesLyrics = substr_count($dedicationLyrics,"<br />");
             if($numberOfLinesLyrics < 1)
              {
                 $error = $error."\nInvalid lyrics selected! minimum 2 lines required.";
              }
             else if($numberOfLinesLyrics > 4)
              {
                 $error = $error."\nInvalid lyrics selected! maximum 4 lines.";
              }
             else if(strlen($dedicationLyrics) < 50)
             {
                $error = $error."\nInvalid lyrics selected! minimum 50 characters.";
             }
             else if(strlen($dedicationLyrics) > 400)
             {
                $error = $error."\nInvalid lyrics selected! maximum 400 characters.";
             }
    
           }
    
           if($error == "")
            {
                 $rexSafety = "/^[a-zA-Z ]*$/";
          
                 if($dedicationBy != "")
                 {
                   if (!preg_match($rexSafety, $dedicationBy ))
                    {
                       $error = $error."\nYour name is invalid! only alpbhabets are allowed.";
          
            
                    }
                    if(strlen($dedicationBy)<3)
                    {
                      $error = $error."\nYour name must contain atleast 3 characters.";
                    
                    }
                 }
                 else
                 {
                   $error = $error."\nYour name is required.";
                    
                 }
          
                if($dedicationByEmail != "")
                 {
                  if (!filter_var($dedicationByEmail, FILTER_VALIDATE_EMAIL))
                    {
                      $error = $error."\nEnter valid email Address.";
                      
                    }
                 }
                 else
                 {
                   $error = $error."\nYour email is required.";
                    
                 }
          
                 if($dedicationTo != "")
                 {
                    if (!preg_match($rexSafety, $dedicationTo ))
                    {
                       $error = $error."\nDedicating to's name is invalid! only alpbhabets are allowed.";
                    
            
                    }
                    if(strlen($dedicationTo)<3)
                    {
                      $error = $error."\nDedicating to's name must contain atleast 3 characters.";
                    
                    }
                 }
                 else
                 {
                   $error = $error."\nDedicating to's name is required.";
                    
                 }
          
          
          
                 
          
                  if(trim($songCategory)=="")
                  {
                    $error = $error."\nPlease select song category.";
          
                  }
                  
            }
          /****SERVER SIDE VALIDATION ***********/


          $error=trim($error);
          //echo $error."#".$errorCounter."#";
          if($error == "")
          {
            //echo "inserting";
            insertIntoDedication($dedicationLyrics,$dedicationBy,$dedicationTo,$songId,$songCategory,$dedicationByEmail,$personalMessage,$feedback,$colors[$a]);
            echo  mysqli_insert_id($mysqli);
          }
          else
          {
            echo "ERROR:#~:";
            echo $error;
          }
          




  echo '</response>';
?>