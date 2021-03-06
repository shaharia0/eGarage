<?php
session_start();
if (isset($_SESSION['is_login'])){
 $userEmail =  $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userlogin.php'</script>";
}
define('TITLE','Service Status');
define('PAGE','checkStatus');
include ('includes/sidebar.php');
include ('../dbconnection.php');
?>
<!-- checK status second column start -->
<div class="col-sm-6 mt-5 mx-3">
<form action="" method="post" class="form-inline d-print-none">
<div class="form-group mr-3 font-weight-bold">
<label for="checkid">Enter Service Request ID: </label>
<input type="text" class="form-control ml-3" name="search" id="checkid" onkeypress="isInputNumber(event)">
</div>
<button type="submit" class="btn btn-danger">Search</button>
</form>
<?php
if(isset($_REQUEST['search'])){
    if($_REQUEST['search'] == ""){
        $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill the field first</div>';
    }else{
        $id = $_REQUEST['search'];
        $sql = "SELECT * FROM assign_work_db WHERE service_id = $id";
        $assignresult = $conn->query($sql);
        $row = $assignresult->fetch_assoc();
        // $temp = ['service_id'];
        // print_r($row) ;
        if((!is_null($row)) && ($row['service_id'] == $_REQUEST['search'])){ 
    ?>
    <h3 class="text-center mt-5">Assigned Work Details</h3>
    <table class="table table-bordered">
    <tbody>
    <tr>
    <td>Request ID</td>
    <td><?php if(isset($row['service_id'])) {echo $row['service_id'];} ?></td>
    </tr>
    <tr>
    <td>Request Info</td>
    <td><?php if(isset($row['service_info'])) {echo $row['service_info'];} ?></td>
    </tr>
    <tr>
    <td>Service Description</td>
    <td><?php if(isset($row['service_description'])) {echo $row['service_description'];} ?></td>
    </tr>
    <tr>
    <td>Name</td>
    <td><?php if(isset($row['service_cname'])) {echo $row['service_cname'];} ?></td>
    </tr>
    <tr>
    <td>address</td>
    <td><?php if(isset($row['service_caddress'])) {echo $row['service_caddress'];} ?></td>
    </tr>
    <tr>
    <td>Area</td>
    <td><?php if(isset($row['service_carea'])) {echo $row['service_carea'];} ?></td>
    </tr>
    <tr>
    <td>Zip Code</td>
    <td><?php if(isset($row['service_czip'])) {echo $row['service_czip'];} ?></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><?php if(isset($row['service_cemail'])) {echo $row['service_cemail'];} ?></td>
    </tr>
    <tr>
    <td>Phone Number</td>
    <td><?php if(isset($row['service_cphone'])) {echo $row['service_cphone'];} ?></td>
    </tr>
    <tr>
    <td>Assign Technician</td>
    <td><?php if(isset($row['assign_technician'])) {echo $row['assign_technician'];} ?></td>
    </tr>
    <tr>
    <td>Assign Date</td>
    <td><?php if(isset($row['assign_date'])) {echo $row['assign_date'];} ?></td>
    </tr>
    </tbody>
    </table>
    <div class="text-center">
    <form action="" class="mb-3 d-print-none">
    <input class="btn btn-danger mr-2" type="submit" value="Print" onclick="window.print()">
    <input class="btn btn-secondary" type="submit" value="close">
    </form>
    </div>
    <?php }
    else{
     echo '<div class="alert alert-info mt-4">Your Request is Still Pending</div>';
     }
   }
}
?>
<?php if(isset($passmessage)) {echo $passmessage;} ?>
</div>
<!-- checK status second column end -->
<!-- only number inout fields -->
<script>
function isInputNumber(evt){
    var ch =String.fromCharCode(evt.which);
   if(!(/[0-9]/.test(ch))){
       evt.preventDefault();
   }
}
</script>
<?php
include ('includes/footer.php');
?>