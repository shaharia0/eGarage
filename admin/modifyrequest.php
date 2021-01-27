<?php
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $adminEmail = $_SESSION['adminEmail'];
}else{
    echo "<script>location.href='adminlogin.php'</script>";
}
define('TITLE','Customer Details');
define('PAGE','customerlist');
include ('includes/adminsidebar.php');
include ('../dbconnection.php');
?>
<!-- edit service reuqest form start -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Customer Information</h3>
<?php 
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM user_registration_db WHERE user_login_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
if(isset($_REQUEST['update'])){
    if(($_REQUEST['user_id']=="") ||($_REQUEST['user_name']=="") || 
    ($_REQUEST['user_email']=="")){
        $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">
        All Fields Required</div>';
    }else{
        $userid = $_REQUEST['user_id'];
        $username = $_REQUEST['user_name'];
        $useremail = $_REQUEST['user_email'];
       
        $sql = "UPDATE user_registration_db SET user_login_id = '$userid' , user_namee = '$username',
        user_email = '$useremail' WHERE user_login_id = '$userid' ";
        if($conn->query($sql) == TRUE){
            $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">
        Updated Successfully</div>';
        }else{
            $passmessage = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">
        Unable to Update</div>';
        }
    }
}
?>
<form action="" method="POST">
<div class="form-group">
<label for="user_id">Customer ID</label>
 <input type="text" name="user_id" id="user_id" class="form-control" 
 Value="<?php if(isset($row['user_login_id'])) {echo $row['user_login_id'];} ?>" readonly>
</div>
<div class="form-group">
<label for="user_name">Name</label>
 <input type="text" name="user_name" id="user_name" class="form-control" 
 Value="<?php if(isset($row['user_namee'])) {echo $row['user_namee'];} ?>" >
</div>
<div class="form-group">
<label for="user_email">Email</label>
 <input type="text" name="user_email" id="user_email" class="form-control" 
 Value="<?php if(isset($row['user_email'])) {echo $row['user_email'];} ?>" >
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger" id="update" name="update">Update</button>
<a href="customerlist.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($passmessage)) {echo $passmessage;} ?>
</form>
</div>
<!-- edit service reuqest form End -->
<?php
include('includes/adminfooter.php');
?>