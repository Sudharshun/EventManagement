<!doctype html>
 <head>
    <meta charset="utf-8">
    <title>HTGC Maharudram 2015 Facilities Team-Approval</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link href="bootstrap/css/jquery-ui.css" rel="stylesheet">  
    <script src="bootstrap/js/jquery.handsontable.full.js"></script>

    <link rel="stylesheet" media="screen" href="bootstrap/js/jquery.handsontable.full.css">
    
<style type="text/css">
      
     body{
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-facility {
        max-width: 898px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }

      #dataTable{
      width:750px;

      }
      

    </style>
<script type="text/javascript">
$(function(){
    $("#requestedOn").datepicker({
  showOn: "button",
      buttonImage: "bootstrap/img/calendar.gif",
      buttonImageOnly: true      
    
  });
 $( "#dateItemNeededby" ).datepicker({
      showOn: "button",
      buttonImage: "bootstrap/img/calendar.gif",
      buttonImageOnly: true,      
      changeMonth: true,
      changeYear: true
    });

 });
</script>

 </head>
<?php
// display form if user has not clicked submit
use \google\appengine\api\mail\Message;

$todayID = date("Y-m-d H:i:s");

if (!isset($_POST["submit"])) {
?>

<div class="container">
<form  id="FacForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-facility">
<center><table><tr><td><img src="bootstrap/img/logo.jpg"/></td><td><img src="bootstrap/img/banner_htgc_1.jpg"/></td></tr></table></center>
<center><h2 class="form-facility-heading">Maharudram 2015 - Facilities Approval Form</h2></center>
 <table class="table table-striped">
<tr><td>Approve request</td>
<td><select name="approval">
  <option>Yes</option>
  <option>No</option>
</select>
</td></tr>
<tr><td>Request#</td><td><input type="text" name="requestNo" class="input-block-level" value="<?php echo $_GET['reqno'];?>"></td></tr>
<tr><td>Requested by</td><td><input type="text" name="requestedBy" class="input-block-level" value="<?php echo $_GET['reqby'];?>"></td></tr>
<tr><td>Request Approver</td><td><input type="text" name="requestedApproved" class="input-block-level"  value="<?php echo $_GET['reqapprover'];?>"></td></tr>
</table>
<input type="hidden" name="reqEmailer" value="<?php echo $_GET['reqemailer'];?>">
<br/>
<h3>Comments Below</h3>
<br/>
<textarea name="sai" id="sai" class="input-xlarge row-fluid" rows="15"></textarea>
<br/>
<br/>
<h3>Click on Submit! to Send your Approval and Processing!</h3>
<br/>
<button class="btn btn-large btn-primary" name="submit" type="submit">Submit!</button>
<BR/>
<br/>
</form>
</div> 
  <?php 
} else {    // the user has submitted the form

?>
<?php 

  // Check if the "from" input field is filled out
    $approvalStatus=$_POST["approval"];
    $requestedBy = $_POST["requestedBy"];
    $requestedApprovedBy = $_POST["requestedApproved"];
    $messageToSend = $_POST["sai"];
    $requestNo=$_POST["requestNo"];
    $requestEmailer=$_POST["reqEmailer"];
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    // send mail



try
{
  $message = new Message();
  $message->setSender("htgcmaharudram2015@gmail.com");
  $message->addTo("htgcmaharudram2015@gmail.com");
  $message->addTo("sudharshun@gmail.com");
  $message->addTo($requestEmailer);

 
   if(strcmp($approvalStatus,'Yes')==0){
      $message->setSubject("Approved Facility request-Request $requestNo -Approved by -$requestedApprovedBy");
    }else{
      $message->setSubject("Rejected Facility request-Request $requestNo -Declined by -$requestedApprovedBy");
    }

  $message->setTextBody($messageToSend);
  $message->send();
    echo "Thank you for sending us your Decision!!!";

} catch (InvalidArgumentException $e) {
     echo "Error Occured sending mail";
     echo $e->getMessage();

}



  }
?>


