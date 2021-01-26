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
<!-- start work order second column -->
<div class="col-sm-9 col-md-10 mt-5">
<?php 
 $sql = "SELECT * FROM assign_work_db";
 $result = $conn->query($sql);
 if($result->num_rows > 0 ){
   echo '<table class="table">';
   echo '<thead>';
   echo '<tr>';
   echo '<th scope="col">Request ID</th>';
   echo '<th scope="col">Request Info</th>';
   echo '<th scope="col">Name</th>';;
   echo '<th scope="col">Area</th>';
   echo '<th scope="col">Email</th>';
   echo '<th scope="col">Phone Number</th>';
   echo '<th scope="col">Technician</th>';
   echo '<th scope="col">Servicing Date</th>';
   echo '<th scope="col">Action</th>';
   echo '</tr>';
   echo '</thead>';
   echo '<tbody>';
   while($row = $result->fetch_assoc()){
     echo '<tr>';
     echo '<td>'.$row['service_id'].'</td>';
     echo '<td>'.$row['service_info'].'</td>';
     echo '<td>'.$row['service_cname'].'</td>';
     echo '<td>'.$row['service_carea'].'</td>';
     echo '<td>'.$row['service_cemail'].'</td>';
     echo '<td>'.$row['service_cphone'].'</td>';
     echo '<td>'.$row['assign_technician'].'</td>';
     echo '<td>'.$row['assign_date'].'</td>';
     echo '<td>';
     echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
     echo '<input type="hidden" name="id" value='.$row['service_id'].'><button class="btn btn-info" 
     name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
     echo '</form>';
     echo '<form action=" " method="POST" class="d-inline mr-2">';
     echo '<input type="hidden" name="id" value='.$row['service_id'].'><button class="btn btn-secondary" 
     name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
     echo '</form>';
     echo '</td>';
     echo '</tr>';
   }
   echo '</tbody>';
   echo '</table>';
 }else{
   echo 'result 0 !!';
 }
 if(isset($_REQUEST['delete'])){
   $sql = "DELETE FROM assign_work_db WHERE service_id = {$_REQUEST['id']}";
   if($conn->query($sql)== TRUE){
     echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>';
   }else{
     echo "Unable to Delete data";
   }
 }
?>
</div>
<!-- end work order second column -->
<?php
include('includes/adminfooter.php');
?>