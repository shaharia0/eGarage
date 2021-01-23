<?php
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminEmail'];
}else{
    echo "<script>location.href='adminlogin.php'</script>";
}
define('TITLE','Admin Dashboard');
define('PAGE','admindashboard');
include ('includes/adminsidebar.php');
include ('../dbconnection.php');

?>





    <div class="col-sm-9 col-md-10"> <!------sidebar second column start-->
    <div class="row text-center mx-5">
    <div class="col-sm-4 mt-5">
    <div class="card text-white font-weight-bold bg-info mb-3" style="max-width: 18rem;">
    <div class="card-header">Request Received</div>
    <div class="card-body">
    <h4 class="card-title">33</h4>
    <a class="btn text-white" href="#">View</a>
    </div>
    </div>
    </div>
    <div class="col-sm-4 mt-5">
    <div class="card text-white font-weight-bold bg-danger mb-3" style="max-width: 18rem;">
    <div class="card-header">Assigned Work</div>
    <div class="card-body">
    <h4 class="card-title">27</h4>
    <a class="btn text-white" href="#">View</a>
    </div>
    </div>
    </div>
    <div class="col-sm-4 mt-5">
    <div class="card text-white font-weight-bold bg-primary mb-3" style="max-width: 18rem;">
    <div class="card-header">No of Technician</div>
    <div class="card-body">
    <h4 class="card-title">3</h4>
    <a class="btn text-white" href="#">View</a>
    </div>
    </div>
    </div>
    </div>
<div class="mx-4 mt-4 text-center">
<p class="bg-dark text-white p-2">List of Customers</p>
<?php
$sql = "SELECT * FROM user_registration_db";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo '
    <table class="table">
    <thead>
    <tr>
    <th scope="col"> Customer Id </th>
    <th scope="col"> Name </th>
    <th scope="col"> Email </th>        
    </tr>
    </thead>
    <tbody>';
      while ($row = $result->fetch_assoc()){
    echo  '<tr>';
        echo '<td>'.$row["user_login_id"].'</td>';
        echo '<td>'.$row["user_namee"].'</td>';
        echo '<td>'.$row["user_email"].'</td>';
    echo '</tr>' ;}
    echo '</tbody>
    </table>';
    }else{
        echo ' found 0 results!';
    }
 ?>
</div>
    </div><!------sidebar second column end-->
<?php
include('includes/adminfooter.php');
?>