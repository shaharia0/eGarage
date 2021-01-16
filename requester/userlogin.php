<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['rEmail'])){
    $userEmail=mysqli_real_escape_string ($conn, trim ($_REQUEST['rEmail']));
    $userPassword=mysqli_real_escape_string ($conn, trim ($_REQUEST['rPassword']));
    $sql = "SELECT user_email, user_password FROM user_registration_db WHERE user_email='".$_REQUEST['rEmail']."' AND user_password='".$_REQUEST['rPassword']."' limit 1 ";
    $result = $conn -> query ($sql);
    if($result->num_rows==1){
        $_SESSION['is_login']= true;
        $_SESSION['rEmail']=$userEmail;
    echo "<script>location.href='customerprofile.php';</script>";
    exit;
    }else{
        $message= '<div class="alert alert-warning mt-2"> Enter valid email and password</div>';
    }
    }
} else{
    echo "<script>location.href='customerprofile.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstarp css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--  fontawesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Login Page</title>
</head>
<body>
    <div class="mb-3 mt-5 text-center"  style="font-size:30px; font-weight:bold;" >
    <i class="fas fa-warehouse"></i>
    <span>EGARAGE</span>
    <i class="fas fa-warehouse"></i>
    <h6>An online vehicle repairing system</h6>
    </div>
    <p class="text-center" style="font-size:20px; font-weight:bold;" ><i class="fas fa-user-cog text-info mr-2"></i>Sign In Your Account</p>
    <div class="container-fluid">
    <div class="row justify-content-center mt-5">
    <div class="col-sm-6 col-md-4">
    <form action="" class="shadow-lg p-4" method="POST">
    <div class="form-group">
    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
    <input type="email" class="form-control" placeholder="Enter Your Email" name="rEmail" required>
    <small class="form-text">We'll never share your email with anyone else</small>
    </div>
    <div class="form-group">
    <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Password" name="rPassword" required>
    </div>
    <button type="submit" class="btn btn-success mt-4 font-weight-bold btn-block shadow-sm">Sign In </button>
    <?php if(isset($message)) {echo $message;} ?>
    </form>
    <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
    </div>
    </div>
    </div>
    <!-- javascript files -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>