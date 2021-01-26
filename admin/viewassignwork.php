<?php
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminEmail'];
}else{
    echo "<script>location.href='adminlogin.php'</script>";
}
define('TITLE','Work Order');
define('PAGE','workorder');
include ('includes/adminsidebar.php');
include ('../dbconnection.php');
?>
<!-- view assign work list start scenod column -->
<div class="col-sm-6 mt-5 mx-3">
<h3 class="text-center">Assigned Work Details</h3>
<?php
  if(isset($_REQUEST['view'])){
      $sql = "SELECT * FROM assign_work_db WHERE service_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
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
    <div class="text-center mb-3">
    <form action="" class=" d-print-none d-inline">
    <input class="btn btn-danger mr-2" type="submit" value="Print" onclick="window.print()">
    </form>
    <form action="workorder.php" class=" d-print-none d-inline">
    <input class="btn btn-secondary" type="submit" value="close">
    </form>
    </div>
      <?php } ?>
</div>
<!-- view assign work list end scenod column -->
<?php
include('includes/adminfooter.php');
?>