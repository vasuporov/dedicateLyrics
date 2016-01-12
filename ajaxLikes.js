var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject()
{
  var xmlHttp;
  
  if(window.ActiveXObject)
  {
    try
     {
         xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

     }
     catch(e)
     {
       xmlHttp = false;
     }
  }
  else
  {
      try
      {
        xmlHttp = new XMLHttpRequest();
      }
      catch(e)
      {
        xmlHttp = false;
      }
  }
  
  if(!xmlHttp)
    alert('Cant create that object!');
  else
    return xmlHttp;

}


function process(dedication)
{

   if(xmlHttp.readyState ==4 || xmlHttp.readyState ==0)
    {
      console.log('inside process');
      var dedicationId = dedication.id;
      console.log('sending get request');
      console.log("www.dedicatelyrics.com/ajaxLikes.php?dedicationId="+dedicationId);
      xmlHttp.open("GET","../ajaxLikes.php?dedicationId="+dedicationId,true);
      xmlHttp.onreadystatechange = handleServerResponse;
      xmlHttp.send(null);

    }
    else
    {
      setTimeout('process()',1000);
    }
}

function handleServerResponse()
{
  if(xmlHttp.readyState==4)
   {
     if(xmlHttp.status==200)
       {
         console.log('got response');
         xmlResponse =xmlHttp.responseXML;
         console.log(';;;;'+xmlResponse);
         xmlDocumentElement = xmlResponse.documentElement;
         message = xmlDocumentElement.firstChild.data;
         console.log(message);
         $previousLikes = document.getElementById("likes"+message.trim().split("#")[1]).innerHTML;
         $previousLikes = $previousLikes.split(" ")[0];
         $currentLikes = message.trim().split("#")[0];
         $likeId = message.trim().split("#")[1];

         console.log($previousLikes+" : "+$currentLikes);
         if($previousLikes == $currentLikes)
            {
              document.getElementById("likesError"+$likeId).innerHTML = "You already liked it";
              $("#likesError"+$likeId).delay(2000).fadeIn();
               $("#likesError"+$likeId).delay(2000).fadeOut('slow') ;
            }
         document.getElementById("likes"+message.trim().split("#")[1]).innerHTML = $currentLikes+" Likes";
         $("#likes"+message.trim().split("#")[1]).delay(100).fadeOut().fadeIn('slow');
         //setTimeout('process()',1000);
       }
       else
       {
         alert('something went wrong');
       }
   }
}