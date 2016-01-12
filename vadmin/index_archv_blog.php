<script>

    function process()
    {

    }

</script>




<?php

   require('admin_dbconnect.php');
  $startingUrl = '/lyrics'; //keep it blank when putting it live on server

  $msg = '';
  // Start the session
  session_start();
  if(!isset($_POST['addAlbumSubmit']) && !isset($_POST['addSongSubmit']) && !isset($_POST['dedicationSubmit']) && !isset($_POST['editAlbumSubmit']) && isset($_SESSION['loggedIn']))
   {
    unset($_SESSION['loggedIn']);
   }

  if(isset($_POST['form-submit']))
   {

     $user = $_POST['inputUsername'];
     $pass = $_POST['inputPassword'];
      
      if($user=='vasuanant' && $pass == 'va5102015' )
      {
        $_SESSION['loggedIn'] = 'vasuanant';
        $msg ='Logged In!!! Refreshing will log you out!';
      }
      else
      {
        $msg ='Wrong username or password.';
      }
   }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
     <meta name="robots" content="noindex,nofollow">
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <title> Admin portal Dedicatelyrics.com</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo $startingUrl; ?>/css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
      .menu{
        height:12em;
        text-align: center;
        font-size:1.2em;
      }

    </style>
  </head>

  <body>

    <div class="container">


       <div class="col-md-6 col-md-offset-3">

            <center><h1 class="label-lg label-info">Welcome Admin!</h1></center>
            <?php
             global $msg;
               if(!isset($_SESSION['loggedIn']))
               {
                 echo '
                  <form class="form-signin" action="#" method="post">
                    <h4 class="form-signin-heading">Please Login</h4>
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="name" id="inputUsername" name="inputUsername" class="form-control" placeholder="User Name" required autofocus> <br />
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required> <br />
                    <center> <span class="label-md label-danger">'.$msg.'</span> </center>
                    <button class="btn btn-lg btn-primary btn-block" name="form-submit" type="submit">Sign in</button>
        
                  </form> ';
               }
             ?>

        </div>
        

       </center>


    </div> <!-- /container -->


       
           <?php
                 if(isset($_SESSION['loggedIn']))
                 {
                   
                   


                          
                          echo '<div class="container">

                                    <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">Add Album</a></li>
                                      <li><a data-toggle="tab" href="#menu1">Add Song</a></li>
                                      <li><a data-toggle="tab" href="#menu2">Dedication Admin</a></li>
                                      <li><a data-toggle="tab" href="#menu3">Approval</a></li>
                                      <li><a data-toggle="tab" href="#menu4">Edit Album Details</a></li>
                                    </ul>
                                  
                                    <div class="tab-content">
                                    
                                      <div id="home" class="tab-pane fade in active">
                                         ';
                                         
                                       include('addAlbum.php');

                         echo '       </div>

                                      
                                      <div id="menu1" class="tab-pane fade">
                                        ';
                                          include('addSongs.php');
                        echo '        </div>

                                      
                                      <div id="menu2" class="tab-pane fade"> ';
                                        
                                        include('dedicationAdmin.php');
                         echo '       </div>
                                      

                                      <div id="menu3" class="tab-pane fade">
                                        COMING SOON!
                                      </div>
                                      
                                      <div id="menu4" class="tab-pane fade"> ';
                                        
                                        include('editAlbum.php');
                         echo '       </div>

                                    </div>
                                    
                                   </div>
                                  ';      
                                  
                                  
                 }
                 
            ?>
          

    




  </body>
</html>
