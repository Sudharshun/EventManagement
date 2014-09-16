<!doctype html>
 <head>
    <meta charset="utf-8">
    <title>HTGC Maharudram 2015 Facilities Team</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link href="bootstrap/css/jquery-ui.css" rel="stylesheet">  
    <script src="bootstrap/js/jquery.handsontable.full.js"></script>

    <link rel="stylesheet" media="screen" href="bootstrap/js/jquery.handsontable.full.css">
    <script src="bootstrap/js/jquery.chained.min.js"></script>
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
      

		.error{
			display: none;
			margin-left: 10px;
		}		
		
		.error_show{
			color: red;
			margin-left: 10px;
		}
		
		input.invalid, textarea.invalid{
			border: 2px solid red;
		}
		
		input.valid, textarea.valid{
			border: 2px solid green;
		}


    </style>

<script>
		$(document).ready(function() {
			<!-- Real-time Validation -->
		
	       $( "#accordion" ).accordion({
      		collapsible : true, active : false
   		 });
               
				<!--Name can't be blank-->
				$('#requestedBy').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});
				
				<!--Email must be an email -->
				$('#requestorEmail').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					if(is_email){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				
				$('#itemNeeded').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#qtyNeeded').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#dateItemNeededby').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#placeNeeded').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});


		
   				 $("#requestedOn").datepicker({
 				    showOn: "button",
  				    buttonImage: "bootstrap/img/calendar.gif",
     				    buttonImageOnly: true,
     				    minDate: "-2D", 
     				    maxDate: "+5D"
        
  				});

 				$( "#dateItemNeededby" ).datepicker({
    				  showOn: "button",
  				  buttonImage: "bootstrap/img/calendar.gif",
    				  buttonImageOnly: true,      
      				  changeMonth: true,
      				  changeYear: true,
                                  minDate: "-2D",
      				  maxDate: "+1Y +3M +10D"
   				 });
		});
	</script>



 </head>
<?php
// display form if user has not clicked submit
use \google\appengine\api\mail\Message;
date_default_timezone_set("America/Chicago");
$todayID = date("Y-m-d H:i:s");
$reqUniq=uniqid();
if (!isset($_POST["submit"])) {
  ?>

<div class="container">
<form  id="FacForm" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-facility">
<center><table><tr><td><img src="bootstrap/img/logo.jpg"/></td><td><img src="bootstrap/img/banner_htgc_1.jpg"/></td></tr></table></center>
<center><h2 class="form-facility-heading">Maharudram 2015 - Facilities Request Form</h2></center>
 <table class="table table-striped">
<tr><td>Comittee</td>
<td><select name="committee" id="committee">
  <option value="religious">Religious</option>
  <option value="annadanam">Annadanam</option>
  <option value="volunteer">Volunteer</option>
  <option value="parking">Parking Transport</option>
  <option value="ritwik">Ritwik Management</option>
  <option value="fundraising">Fundraising</option>
  <option value="vaidheekabhojanam">Vaidheeka Bhojanam</option>
  <option value="facilities">Facilities</option>
  <option value="audiovideotelecast">Audio video Telecast</option>
  <option value="finance">Finance</option>
  <option value="welcome">Welcome</option>
  <option value="prasadam">Prasadam</option>
  <option value="publicitymarketing">Publicity & Marketing</option>
  <option value="healthhumanitarian">Health & Humanitarian</option>
  <option value="devoteerelations">Devotee Relations</option>
  <option value="general">General</option>
</select>
</td></tr>
<tr><td>Requested by</td><td><input type="text" name="requestedBy" id="requestedBy" class="input-block-level" placeholder="Requestor Name"></td></tr>
<tr><td>Request Approver</td><td>
<select name="approvedBy" id="approvedBy">
<option value="Lakshman-Agadi" class="general">Lakshman Agadi</option>
<option value="Ananth-Subramanian-Mani" class="religious">Ananth Subramanian-Mani</option>
<option value="RV-Padmanabhan" class="ritwik">RV Padmanabhan</option>
<option value="Sivaraman-Sivasubramanian" class="fundraising">Sivaraman Sivasubramanian</option>
<option value="Dr-Vijaya-Sarma" class="finance">Dr.Vijaya Sarma</option>
<option value="Sriram-Sankaran" class="general">Sriram Sankaran</option>
<option value="Vishy-Viswanath" class="annadanam">Vishy Viswanath</option>
<option value="Jayashree-Subramanian" class="general">Jayashree Subramanian</option>
<option value="Lalitha-Rajagopal" class="general">Lalitha Rajagopal</option>
<option value="Uday-Betkari" class="audiovideotelecast">Uday Betkari</option>
<option value="Sanjeev-Garg" class="audiovideotelecast">Sanjeev Garg</option>
<option value="Dr-Uma-Srinivasan" class="welcome">Dr.Uma Srinivasan</option>
<option value="Jayanthi-Mittur" class="welcome">Jayanthi Mittur</option>
<option value="Geetha-Papineni" class="general">Geetha Papineni</option>
<option value="Karthik-Subramanian" class="parking">Karthik Subramanian</option>
<option value="Dr-Sudha" class="healthhumanitarian">Dr.Sudha</option>
<option value="KGopalakrishnan" class="facilities">K.Gopalakrishnan</option>
<option value="Kaushik-Bhupendra" class="volunteer">Kaushik Bhupendra</option>
</select>
</td></tr>
<tr><td>Requested on</td><td><input type="text" name="requestedOn" id="requestedOn" readonly></td></tr>
<tr><td>Requestor Mail id</td><td><input type="email" name="requestorEmail" id="requestorEmail" class="input-block-level"></td></tr>
</table>
<br/>
 <h3>Copy or Enter Multiple or Large Requests using Below Request Table</h3><b>&nbsp;&nbsp;&nbsp;<a href='bootstrap/docs/MultiItemRequest.xlsx' target="_blank">Use Template</a></b>
<br/>
<br/>
<div id="dataTable" class="table table-striped"></div>
<br/>
<h3>Click on Prepare Data!</h3>
<a type="button" class="btn btn-large btn-primary" href="#" onclick="sai_ready();">Prepare Data!</a>
<br/>
<br/>
<textarea name="sai" id="sai" class="input-xlarge row-fluid" rows="15" readonly></textarea>
<br/>
<br/>
<br/>
<div id="accordion">
  <h3>Single Requests</h3>
  <div>
<br/>
<a type="button" class="btn btn-large btn-primary" href="#add_item" data-toggle="modal">Add Item</a>
<br/>
<br/>
</div>
  <h3>How To Send these Requests???Help!!!</h3>
  <div>
<iframe width="560" height="315" src="//www.youtube.com/embed/MZAf5q99e6w" frameborder="0" allowfullscreen></iframe>
</div>
</div>
<br/>
<br/>
<h3>Click on Submit! to Send your Data for Approval and Processing!</h3>
<br/>
<button class="btn btn-large btn-primary" name="submit" type="submit">Submit!</button>
<BR/>
<br/>
<script>
  $("#dataTable").handsontable({
  data: [],
  dataSchema: {eventName: null, itemName: null,qty: null,dateNeed: null, placeNeed: null},
  startRows: 10,
  startCols: 4,
  colHeaders: ['Event Name', 'Item Neeeded', 'Quantity', 'Date Needed','Place Needed'],
  columns: [
    {data: "eventName"},
    {data: "itemName"},
    {data: "qty"},
    {data: "dateNeed"},
    {data: "placeNeed"}
  ],
  minSpareRows: 1,
  fillHandle: true

  });
</script>
<script type="text/javascript">
function sai_ready(){

$('#sai').val('');

var $containerT = $("#dataTable");
var handsontable = $containerT.data('handsontable');
var num_rows = $containerT.handsontable('countRows');
if(num_rows>1){

var multiMessage="";

for (i = 0; i < num_rows; i++) { 
if(!empty(handsontable.getDataAtRowProp(i, 'eventName')) && !empty(handsontable.getDataAtRowProp(i, 'itemName'))){
multiMessage="~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-"+"\n"+
"For Event:"+handsontable.getDataAtRowProp(i, 'eventName') +"\n"+
"Item:"+handsontable.getDataAtRowProp(i, 'itemName')+"\n"+
"Quantity:"+handsontable.getDataAtRowProp(i, 'qty')+"\n"+
"Date Needed by:"+handsontable.getDataAtRowProp(i, 'dateNeed')+"\n"+
"Place Needed in:"+handsontable.getDataAtRowProp(i, 'placeNeed')+"\n";

$('#sai').val($('#sai').val()+multiMessage);
}    
}

}
}

function empty(e) {
                    switch(e) {
                        case "":
                        case 0:
                        case "0":
                        case null:
                        case false:
                        case typeof this == "undefined":
                            return true;
                                default : return false;
                    }
                }
</script>
</form>
</div> 
<div class="modal fade" id="add_item">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Add an Item for Facilities Request!</h3>
  </div>
  <div class="modal-body">
<table class="table table-striped">
<tr><td> For Event</td>
<td>
<select id="eventNeeded">
<option>Maharudram</option>
<option>Lalithashasaramam</option>
<option>Chandi Homam</option>
<option>Navagraha Homam</option>
<option>Others</option>
</select>
</td></tr>
<tr><td>Item</td><td><input id="itemNeeded" class="input-block-level" type="text" placeholder="Item"></td></tr>
<tr><td>Quantity</td><td><input id="qtyNeeded" class="input-block-level" type="text" placeholder="Qty"></td></tr>
<tr><td>Date needed</td><td><input id="dateItemNeededby" type="text" placeholder="Date Needed by" readonly></td></tr>
<tr><td>Place Needed</td><td><input type="text" id="placeNeeded"  class="input-block-level" placeholder="Place Needed"></td></tr>
d</table>
</div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="#" id="addItemModal" class="btn btn-primary">Add Item!</a>
  </div>
</div>
<script>	
$('#addItemModal').on('click', function (e) {

var itemNeed=document.getElementById("itemNeeded").value;
var qtyNeed=document.getElementById("qtyNeeded").value;
var dateItemNeedby=document.getElementById("dateItemNeededby").value;
var placeNeed=document.getElementById("placeNeeded").value;
var eventNeedValue = $("#eventNeeded option:selected").text();

var message="~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-"+"\n"+
"For Event:"+eventNeedValue +"\n"+
"Item:"+itemNeed+"\n"+
"Quantity:"+qtyNeed+"\n"+
"Date Needed by:"+dateItemNeedby+"\n"+
"Place Needed in:"+placeNeed+"\n";

$('#sai').val($('#sai').val()+message); 
$('#add_item').modal('hide');

itemNeed="";
qtyNeed="";
dateItemNeedby="";
placeNeed="";
eventNeedValue="";

document.getElementById("itemNeeded").value="";
document.getElementById("qtyNeeded").value="";
document.getElementById("dateItemNeededby").value="";
document.getElementById("placeNeeded").value="";

});

</script>
<script>
		$(document).ready(function() {
	$("#approvedBy").chained("#committee");
        
});
	</script>
  <?php 
} else {    // the user has submitted the form

?>
<?php 

  // Check if the "from" input field is filled out
    $committee=$_POST["committee"];
    $requestedBy = $_POST["requestedBy"];
    $requestedApprovedBy = $_POST["approvedBy"];
    $requestedOn = $_POST["requestedOn"];
    $requestorEmail = $_POST["requestorEmail"];  
    $messageToSend = $_POST["sai"];
    $reqUniq=substr($committee,0,3)."-".$reqUniq;
    $messageWithoutLink=$messageToSend;
    $messageToSend ='<pre>'.$messageToSend.'</pre>';
    $messageToSendWithlink='<pre>'.$messageWithoutLink.'</pre>'.'<a href="http://maharudramapproval2015.appspot.com/index.php?reqno='.$todayID.'&reqby='.$requestedBy.'&reqapprover='.$requestedApprovedBy.'&reqemailer='.$requestorEmail.'">Click to Approve Request!!</a>';
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    // send mail
    
    $messagePrefix='Facility request from '.$committee.' -Requested by   '.$requestedBy.'-To be Approved by '.$requestedApprovedBy.' - on'. $requestedOn.' -Req Generated at:['.$todayID.']-Req Id:'.$reqUniq;

    $WithdisclaimerNoLink=$messagePrefix.'<br/><br/><pre>'.$messageToSend.'</pre><br/><br/><br/><br/>This is a Auto Generated Message Kindly Do Not reply';

    $WithdisclaimerLink=$messagePrefix.'<br/><br/><pre>'.$messageToSendWithlink.'</pre><br/><br/><br/><br/>This is a Auto Generated Message Kindly Do Not reply';



try
{
  $message = new Message();
  $message->setSender("htgcmaharudram2015@gmail.com");
  $message->addTo("htgcmaharudram2015@gmail.com");
  $message->addTo("sudharshun@gmail.com");
  
  if(!empty($requestorEmail)){
  $message->addTo($requestorEmail);
  }
  $message->setSubject("You Raised a Facility request from $committee -To be Approved by $requestedApprovedBy - on $requestedOn -Req Generated at:[$todayID]-Req Id:$reqUniq");



  $message->setHtmlBody($WithdisclaimerNoLink);

  $message->send();
 

 $message->setSender("htgcmaharudram2015@gmail.com");
 $message->addTo("sudharshun@gmail.com");
 $message->addTo("abhishek.gawasane@gmail.com");
 $message->addTo("gopalakrishnank@comcast.net");

 if($requestedApprovedBy == "K.Gopalakrishnan" ) {
 $message->addTo("gopalakrishnank@comcast.net");
 }

  if(strcmp($requestedApprovedBy,'Ananth-Subramanian-Mani')==0){
  $message->addTo("mani.jaya@gmail.com");
  }


 $message->setSubject("Facility request from $committee -Requested by   $requestedBy-To be Approved by $requestedApprovedBy - on $requestedOn -Req Generated at:[$todayID]-Req Id:$reqUniq");
 $message->setHtmlBody($WithdisclaimerLink);
 $message->send();
  
 echo "Thank you for sending us your Request";

} catch (InvalidArgumentException $e) {
     echo "Error Occured sending mail";
     echo $e->getMessage();

}



  }
?>


