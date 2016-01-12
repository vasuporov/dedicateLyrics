<meta name="robots" content="noindex,nofollow">
<?php


//@require_once($mainFolder.'dbconnect.php');

$errorMessageDedication ='';
if(isset($_POST['dedicationSubmit']))
 {

    $dedicationId = $_POST['dedicationId'];
    $dedicationAttribute = $_POST['dedicationAttribute'];
    $dedicationAttributeValue = $_POST['dedicationAttributeValue'];

     if($errorMessageDedication == '')
      {
        if(updateDedication($dedicationId ,$dedicationAttribute,$dedicationAttributeValue) )
            $errorMessageDedication ='Update Successfully';
        else
            $errorMessageDedication ='Error Occured, while connecting server!';
      }


 }

?>


<br>


<center>

<div class="label label-danger"  id="errorMessageDedication"><?php echo $errorMessageDedication;?></div>

<form class="form-horizontal" role="form" id="dedication" ENCTYPE="multipart/form-data" method="POST" action="#">
  <div class="form-group">
    <label class="control-label col-sm-2" for="dedicationId">Dedication Id:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dedicationId" name="dedicationId" placeholder="Enter dedication id" required><br>
      (click on share button of dedication and check the link for id. eg : http://www.dedicatelyrics.com/<strong>55</strong>/sharededication.htm  )
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="dedicationAttribute">Select Attribute:</label>
    <div class="col-sm-10">
      <select class="form-control" id="dedicationAttribute" name="dedicationAttribute" required>
        <option value="">none</option>
        <option value="1">Change Number of Likes</option>
        <option value="2">Change dedication by name</option>
        <option value="3">Change dedication to name</option>
        <option value="4">Change PS</option>
        <option value="5">Change date</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="dedicationAttributeValue">Value of attribute:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dedicationAttributeValue" name="dedicationAttributeValue" placeholder="Enter value for above dedication" required>
       <br>(date format :2015-10-11 14:36:01)
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" id="dedicationSubmit" name="dedicationSubmit">
    </div>
  </div>
</form>

</center>
