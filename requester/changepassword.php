<?php
define('TITLE','Change Password');
define('PAGE','changePassword');
include('includes/sidebar.php');
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_login'])){
 $userEmail =  $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userlogin.php'</script>";
}
$userEmail =  $_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])){
  if($_REQUEST['rPassword'] == ""){
    $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 ">Fill the empty field</div>';
  }else{
    $userPassword = $_REQUEST['rPassword'];
    $sql = "UPDATE user_registration_db SET user_password = '$userPassword' 
    WHERE user_email = '$userEmail' ";
    if($conn->query($sql) == TRUE){
      $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2 ">Upadted Successfully </div>';
    }else{
      $passmessage = '<div class="alert alert-danger col-sm-6 ml-5 mt-2 "> Unable to update </div>';
    
    }

  }

}

?>
<!-- chnage password column start -->

<div class="col-sm-6">
<form class="mt-5 mx-5" action="" method="POST">
<div class="form-group">
<label for="inputEmail">Email</label>
<input type="email" class="form-control" id="inputEmail" value="<?php echo $userEmail; ?>" readonly>
</div>
<div class="form-group">
<label for="inputnewPassword">New password</label>
<input type="password" class="form-control" id="inputnewPassword" placeholder="New password" 
name="rPassword">
</div>
<button type="submit" class="btn btn-danger mr-4 mt-4 " name="passupdate">Update</button>
<button type="reset" class="btn btn-secondary mt-4 ">Reset</button>
<?php if(isset($passmessage)) {echo $passmessage;} ?>
</form>
</div>
<!-- chnage password column end -->

<?php
include ('includes/footer.php');
?>