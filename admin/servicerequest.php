<?php
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminEmail'];
}else{
    echo "<script>location.href='adminlogin.php'</script>";
}
define('TITLE','Service Request');
define('PAGE','servicerequest');
include ('includes/adminsidebar.php');
include ('../dbconnection.php');
?>
<!-- 2nd column service request confirmation area start -->
<div class="col-sm-4 mb-5">
<?php 
  $sql = "SELECT request_id, request_info , description_info, customer_date FROM submit_request_db ";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          echo '<div class="card mt-5 mx-5">';
          echo '<div class="card-header">';
          echo 'Request ID: '.$row['request_id'];
          echo '</div>';
          echo '<div class="card-body">';
          echo '<h6 class="card-title "> Service Request Info: '.$row['request_info'];
          echo  '</h6>';
          echo '<p class="card-text ">'.$row['description_info'];
          echo '</p>';
          echo '<p class="card-text ">Request Date: '.$row['customer_date'];
          echo '</p>';
          echo '<div class="float-right">';
          echo '<form action="" method="POST">';
          echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
            echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
          echo '</form>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
  }
?>
</div>
<!-- 2nd column service request confirmation area end -->
<!-- database view and close and assign request area  -->
<?php
if (isset($_REQUEST['view'])){
  $sql = "SELECT * FROM submit_request_db WHERE request_id = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}
if (isset($_REQUEST['close'])){

  $sql = "DELETE FROM submit_request_db WHERE request_id = {$_REQUEST['id']}";
  if($conn->query($sql)== TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
  }else{
    echo "Unable to delete";
  }
}
if(isset($_REQUEST['assign'])){
  if(($_REQUEST['request_id']== "")|| ($_REQUEST['request_info']== "")|| ($_REQUEST['request_description']== "")
  || ($_REQUEST['input_name']== "")|| ($_REQUEST['inputAdress1']== "")|| ($_REQUEST['inputAdress2']== "")||
   ($_REQUEST['inputZip']== "")|| ($_REQUEST['inputEmail']== "")|| ($_REQUEST['inputPhone']== "")
   || ($_REQUEST['assignTechnician']== "")|| ($_REQUEST['inputDate']== "")){
    $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> All fields are required</div>';
  }else{
        $rid = $_REQUEST['request_id'];
        $rinfo = $_REQUEST['request_info'];
        $rdes = $_REQUEST['request_description'];
        $rname = $_REQUEST['input_name'];
        $raddress = $_REQUEST['inputAdress1'];
        $rarea = $_REQUEST['inputAdress2'];
        $rzip = $_REQUEST['inputZip'];
        $remail = $_REQUEST['inputEmail'];
        $rphone = $_REQUEST['inputPhone'];
        $rassigntech = $_REQUEST['assignTechnician'];
        $rdate = $_REQUEST['inputDate'];

        $sql = "INSERT INTO assign_work_db (service_id,service_info,service_description,
        service_cname,service_caddress,service_carea,service_czip,service_cemail,service_cphone,
        assign_technician,assign_date) VALUES ('$rid','$rinfo','$rdes','$rname','$raddress',
        '$rarea','$rzip','$remail','$rphone','$rassigntech','$rdate')";
        if($conn->query($sql) == TRUE){
            $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
             Worked Assigned Succesfully</div>';
        }else{
          $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
           Unable to assign work</div>';
        }
  }
}
?>
<!-- database view and close area end -->
<!-- 3rd column assign work area start here  -->
<div class="col-sm-5 mt-5 ">
  <form class="jumbotron" action="" method="POST">
  <h5 class="text-center">Assign Work Order Request</h5>
  <div class="form-group">
    <label for="request_id">Request ID</label>
    <input type="text" class="form-control" name="request_id" id="request_id" 
    value="<?php if(isset($row['request_id'])) echo $row['request_id']; ?>" readonly>
  </div>
  <div class="form-group">
    <label for="request_info">Request info</label>
    <input type="text" class="form-control" name="request_info" id="request_info" 
    value="<?php if(isset($row['request_info'])) echo $row['request_info']; ?>">
  </div>
  <div class="form-group">
    <label for="request_description">Service Description</label>
    <input type="text" class="form-control" name="request_description" id="request_description"
    value="<?php if(isset($row['description_info'])) echo $row['description_info']; ?>">
  </div>
  <div class="form-group">
    <label for="input_name">Name</label>
    <input type="text" class="form-control" name="input_name" id="input_name"
    value="<?php if(isset($row['customer_name'])) echo $row['customer_name']; ?>">
  </div>
  <div class="form-row">
<div class="form-group col-md-5" >
<label for="inputAddress1">Address </label>
<input type="text" class="form-control" name="inputAdress1" id="inputAddress1"
value="<?php if(isset($row['customer_address'])) echo $row['customer_address']; ?>">
</div>
<div class="form-group col-md-5" >
<label for="inputAddress2">Area</label>
<input type="text" class="form-control" name="inputAdress2" id="inputAddress2"
value="<?php if(isset($row['customer_area'])) echo $row['customer_area']; ?>">
</div>
<div class="form-group col-md-2" >
<label for="inputZip">Zip Code</label>
<input type="text" class="form-control" name="inputZip" id="inputZip" onkeypress="isInputNumber(event)"
value="<?php if(isset($row['customer_zip'])) echo $row['customer_zip']; ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-8">
<label for="inputEmail">Email </label>
<input type="email" class="form-control" name="inputEmail" id="inputEmail"
value="<?php if(isset($row['customer_email'])) echo $row['customer_email']; ?>">
</div>
<div class="form-group col-md-4">
<label for="inputPhone">Phone Number</label>
<input type="text" class="form-control" name="inputPhone" id="inputPhone" 
 onkeypress="isInputNumber(event)" 
 value="<?php if(isset($row['customer_phone'])) echo $row['customer_phone']; ?>">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="assignTechnician">Assign to Technician </label>
<input type="text" class="form-control" name="assignTechnician" id="assignTechnician">
</div>
<div class="form-group col-md-6">
<label for="inputDate">Date</label>
<input type="date" class="form-control" name="inputDate" id="inputDate">
</div>
</div>
<div class="float-right">
<button type="submit" class="btn btn-success" name="assign">Assign</button>
<button type="reset" class="btn btn-secondary" name="reset">Reset</button>
</div>
  </form>
  <?php if(isset($passmessage)) {echo $passmessage;} ?>
</div>
<!-- assign work area end here  -->
<script>
function isInputNumber(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
  }

}
</script>
<?php
include('includes/adminfooter.php');
?>