<?php
define('TITLE','Customer Profile');
define('PAGE','customerProfile');
include ('includes/sidebar.php');
include ('../dbconnection.php');
session_start();
if (isset($_SESSION['is_login'])){
 $userEmail =  $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userlogin.php'</script>";
}
$sql = "SELECT user_namee, user_email, user_phone , user_address FROM user_registration_db WHERE user_email= '$userEmail'";
$result = $conn-> query($sql);
if($result->num_rows==1){
  $row= $result->fetch_assoc();
  $userName = $row['user_namee'];
  $userPhone = $row['user_phone'];
  $userAddress = $row['user_address'];
}
if(isset($_REQUEST['updateButton'])){
  if($_REQUEST['userName']==""){
    $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields are Required </div>';
  }
  else{
      $userName = $_REQUEST['userName'];
      $userPhone = $_REQUEST['userPhone'];
      $userAddress = $_REQUEST['userAddress'];
      $sql= "UPDATE user_registration_db SET user_namee='$userName', user_phone='$userPhone', user_address='$userAddress' WHERE user_email='$userEmail'";
    
      if($conn->query($sql)==TRUE){
        $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully </div>' ;
      }else{
        $passmessage = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>' ;
      }
      }
 }
?>

    <!-- profile area start -->
    <div class="col-sm-6 mt-5">
    <form action="" method="POST" class="mx-5">
    <div class="form-group">
    <label for="userEmail">Email:</label>  <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $userEmail; ?>" readonly>
    </div>
    <div class="form-group">
    <label for="userName">Name:</label> <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $userName; ?>" placeholder="" >
    </div>
    <div class="form-group">
    <label for="userPhone">Phone:</label>
  <input type="text" class="form-control" name="userPhone" id="userPhone" placeholder=""  >
  </div>
    <div class="form-group">
    <label for="userAddress">Address:</label>
  <input type="text" class="form-control" name="userAddress" id="userAddress" placeholder="" style="height:60px;"  >
  </div>
  <button type="submit" class="btn btn-danger" name="updateButton">Update</button>
  <?php if(isset($passmessage)){echo $passmessage; } ?>
    </form>
    </div>
    <!-- profile area end -->
    <?php
        include('includes/footer.php');
    ?>