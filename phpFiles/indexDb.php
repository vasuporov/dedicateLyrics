<meta name="robots" content="noindex">
<?php

ini_set('max_execution_time', 12000);

    require('dbconnect.php');
    clearIndexTable();
    indexDB(0,0);
    
    /*
      indexDB() takes two parameters
      startingalbumid and endingid
      since the server was unable to process the queries for longer time
      so we will process the indexing in two parts
      firstly we will index albums from id 1 to 2000
      then we will remove the clearIndexTable() then indexDB(2000,4189(whatever the max number of albums present));
    */
?>