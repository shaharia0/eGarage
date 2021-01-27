<?php
session_start();
define('TITLE','Submit Request');
define('PAGE','submitRequest');
include ('includes/sidebar.php');
include ('../dbconnection.php');

if (isset($_SESSION['is_login'])){
 $userEmail =  $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userlogin.php'</script>";
}
if(isset($_REQUEST['submitrequest'])){
    // checking empty fields
    if(($_REQUEST['requestinfo'] =="") || ($_REQUEST['requestdescription']=="") || ($_REQUEST['inputName']=="") 
    || ($_REQUEST['inputAdress1']=="")|| ($_REQUEST['inputAdress2']=="")|| ($_REQUEST['inputZip']=="") 
    || ($_REQUEST['inputEmail']=="") || ($_REQUEST['inputPhone']=="")|| ($_REQUEST['inputDate']=="") ){
        $passmessage = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>
        All Fields are Required </div>";
    }else{
        $serviceInfo =  $_REQUEST['requestinfo'];
        $serviceDescription  = $_REQUEST['requestdescription'];
        $customerName = $_REQUEST['inputName'];
        $customerAddress1 = $_REQUEST['inputAdress1'];
        $customerAddress2 = $_REQUEST['inputAdress2'];
        $customerZip = $_REQUEST['inputZip'];
        $customerEmail = $_REQUEST['inputEmail'];
        $customerPhone = $_REQUEST['inputPhone'];
        $customerDate = $_REQUEST['inputDate'];

        $sql = "INSERT INTO submit_request_db (request_info, description_info, customer_name, customer_address, customer_area, customer_zip, customer_email, customer_phone, customer_date)
        VALUES ('$serviceInfo','$serviceDescription','$customerName','$customerAddress1',
        '$customerAddress2','$customerZip','$customerEmail','$customerPhone','$customerDate')";

        if($conn->query($sql)==TRUE){    
            $genid = mysqli_insert_id($conn);
            $passmessage = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>
            Request Submitted Successfully </div>";
             $_SESSION['myid'] = $genid;
            echo "<script>console.log($genid)</script>";
            echo "<script>location.href='requestsuccess.php'</script>";
        }else{
            $passmessage = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>
            Unable to Submit Your Request bro </div>";
        }

    }
}
?>
<!----service request column start -->
<div class="col-sm-9 col-md-10 mt-5 "> 
<form class="mx-5" action="" method="POST">
<div class="form-group">
<label for="inputRequestInfo">Request Info</label>
<input type="text" class="form-control" name="requestinfo" id="inputRequestInfo" 
placeholder="Request Info">
</div>
<div class="form-group">
<label for="inputRequestDescription">Service Description</label>
<input type="text" class="form-control" name="requestdescription" id="inputRequestDescription" 
placeholder="Describe your vehcle's problem">
</div>
<div class="form-group">
<label for="inputName">Name</label>
<input type="text" class="form-control" name="inputName" id="inputName" 
placeholder="Full Name">
</div>
<div class="form-row">
<div class="form-group col-md-5" >
<label for="inputAddress1">Address </label>
<input type="text" class="form-control" name="inputAdress1" id="inputAddress1" 
placeholder="House no/ Block/ Road">
</div>
<div class="form-group col-md-5" >
<label for="inputAddress2">Area</label>
<input type="text" class="form-control" name="inputAdress2" id="inputAddress2" 
placeholder="Shukrabad / Subhanbag / Dhanmondi 27">
</div>
<div class="form-group col-md-2" >
<label for="inputzip">Zip Code</label>
<input type="text" class="form-control" name="inputZip" id="inputzip" 
 onkeypress="isInputNumber(event)">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-4">
<label for="inputEmail">Email </label>
<input type="email" class="form-control" name="inputEmail" id="inputEmail" 
placeholder="abc@gmail.com">
</div>
<div class="form-group col-md-4">
<label for="inputPhone">Phone Number</label>
<input type="text" class="form-control" name="inputPhone" id="inputPhone" 
placeholder="0134525885" onkeypress="isInputNumber(event)">
</div>
<div class="form-group col-md-4">
<label for="inputDate">Date</label>
<input type="date" class="form-control" name="inputDate" id="inputDate" 
placeholder="dd/mm/yyyy">
</div>
</div>
<button type="submit" class="btn btn-primary" name="submitrequest">Submit</button>
<button type="reset" class="btn btn-danger">Reset</button>
</form>
<?php if(isset($passmessage)){ echo $passmessage; } ?>
</div>
<!----service request column end -->
<!-- input field number by javascript start-->
<script>
function isInputNumber(evt){
    var ch =String.fromCharCode(evt.which);
   if(!(/[0-9]/.test(ch))){
       evt.preventDefault();
   }
}
</script>
<!-- input field number by javascript end-->

<?php
include ('includes/footer.php');
?>