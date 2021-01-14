<?php
include ('../dbconnection.php');
session_start();
if (isset($_SESSION['is_login'])){
 $userEmail =  $_SESSION['rEmail'];
}else{
  echo "<script>location.href='userloginphp'</script>";
}
$sql = "SELECT user_namee, user_email FROM user_registration_db WHERE user_email= '$userEmail'";
$result = $conn-> query($sql);
if($result->num_rows==1){
  $row= $result->fetch_assoc();
  $userName = $row['user_namee'];
}
if(isset($_REQUEST['updateButton'])){
  if($_REQUEST['userName']==""){
    $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All Fields Required </div>';
  }
  else{
      $userName = $_REQUEST['userName'];
      $sql= "UPDATE user_registration_db SET user_namee='$userName' WHERE user_email='$userEmail'";
      if($conn->query($sql)==TRUE){
        $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully </div>' ;
      }else{
        $passmessage = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>' ;
      }
      }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/custom.css">
    <title>Customer Profile</title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow ">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 ml-4" 
    href="customerprofile.php">eGarage</a></nav>
    <!-- container start -->
    <div class="container-fluid" style="margin-top: 50px;">
    <div class="row">
    <!-- side bar start -->
    <nav class="col-sm-2 bg-light sidebar py-5">
    <div class="sidebar-sticky">
    <ul class="nav flex-column nav-pills">
    <li class="nav-item">
    <a class="nav-link active" href="customerprofile.php">
    <i class="fas fa-user"></i>Profile</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fab fa-accessible-icon"></i>Submit Request</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fas fa-aligh center"></i>Service Status</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fas fa-key"></i>Change Password</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
    </ul>
    </div>

    </nav> 
    <!-- side bar end -->
    <!-- profile area stat -->
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
  <input type="tel" class="form-control" name="userPhone" id="userPhone" placeholder="" pattern="+88" >
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
    </div>
    </div>
    <!-- container  end -->

    <!-- javascript -->
     <script src="../js/jquery.min.js"></script>
     <script src="../js/popper.min.js"></script>
     <script src="../js/all.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>
</html>