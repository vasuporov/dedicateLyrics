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


function process()
{

   if(xmlHttp.readyState ==4 || xmlHttp.readyState ==0)
    {
      //console.log('inside process');
      var dedicationBy = document.getElementById("your-name").value;
      //alert(dedicationBy);
      var dedicationByEmail = document.getElementById("your-email").value;
      var dedicationTo = document.getElementById("dedicated-to-name").value;
      var songCategory = document.getElementById("song-category").value;
      var suggestions = document.getElementById("suggestions").value;
      var songId = document.getElementById("songId").value;
      var specialMessage = document.getElementById("special-message").value;
      var dedicationLyrics = document.getElementById("youselected").innerText;
      var captchaResponse = $("#g-recaptcha-response").val();
      //alert(dedicationLyrics);
      //console.log("ajaxDedication.php?dedicationBy="+dedicationBy+"&dedicationLyrics="+dedicationLyrics+"&dedicationByEmail="+dedicationByEmail+"&dedicationTo="+dedicationTo+"&songCategory="+songCategory+"&suggestions="+suggestions+"&specialMessage="+specialMessage+"&songId="+songId);
      //console.log('sending get request'+"ajaxDedication.php?dedicationBy="+dedicationBy+"&dedicationLyrics="+nl2br(dedicationLyrics));
      //alert('none');
      xmlHttp.open("GET","ajaxDedication.php?dedicationBy="+dedicationBy+"&dedicationLyrics="+nl2br(dedicationLyrics)+"&dedicationByEmail="+dedicationByEmail+"&dedicationTo="+dedicationTo+"&songCategory="+songCategory+"&suggestions="+suggestions+"&specialMessage="+specialMessage+"&songId="+songId+"&captchaResponse="+captchaResponse,true);
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
         console.log('got response' );
         xmlResponse =xmlHttp.responseXML;
         //alert(xmlResponse);
         xmlDocumentElement = xmlResponse.documentElement;
         message = xmlDocumentElement.firstChild.data;
         //alert(message);
         if(message.indexOf("ERROR:#~:") > -1)
          {
           document.getElementById('mainData').style.visibility='visible';
           document.getElementById("loadedData").innerHTML = "";
            grecaptcha.reset();
           console.log("Error "+message);
           errorMsg = message.split(":#~:")[1].replace("\n", '');
           displayError(errorMsg);
          }
         else
          {
           document.getElementById("mainData").innerHTML = "<div></div>";
           window.location.href = "/"+message+"/sharededication.htm?info=true";
          }


         //setTimeout('process()',1000);
       }
       else
       {
         alert('something went wrong');
       }
   }
}


function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}