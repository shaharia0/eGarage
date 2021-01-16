<?php
include('dbconnection.php');
if(isset($_REQUEST['rSignup'])){
    // empty field checking
    if(($_REQUEST['rName'] == "")|| ($_REQUEST['rEmail']=="")||($_REQUEST['rPassword']=="")){
        $error_message = '<div class="alert alert-warning mt-2" role="alert">All Fields are required</div>';
    }
    else{
        // email already registered checking
        $sql = " SELECT user_email FROM user_registration_db where user_email='".$_REQUEST['rEmail']."' limit 1";
        $result = $conn-> query($sql);
        if($result->num_rows==1){
            $error_message = '<div class="alert alert-warning mt-2" role="alert">Email Id Already Registered</div>';
        }
        else{
            // assigning user values
            $userName = $_REQUEST['rName'];
            $userEmail = $_REQUEST['rEmail'];
            $userPassword = $_REQUEST['rPassword'];
            $sql = "INSERT INTO user_registration_db(user_namee,user_email,user_password) VALUES ('$userName','$userEmail','$userPassword')";
            if ($conn-> query($sql)==TRUE){
                $error_message = '<div class="alert alert-success mt-2" role="alert">Account created successfully!</div>';
            }
            else{
                $error_message = '<div class="alert alert-danger mt-2" role="alert">Unabel to create account!</div>';
            }
        }
    
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">
<title>Registration Page</title>
</head>
<body>
    <div class="mb-3 mt-4 text-center"  style="font-size:30px; font-weight:bold;" >
    <i class="fas fa-warehouse"></i>
    <span>EGARAGE</span>
    <i class="fas fa-warehouse"></i>
    <h6>An online vehicle repairing system</h6>
    </div>
<div class="container" id="registration">
<p class="text-center" style="font-size:20px; font-weight:bold;" ><i class="fas fa-user-cog text-info mr-2"></i>User Registration</p>
<div class="row mt-4 mb-4">
<div class="col-md-6 offset-md-3">
<form action="" class="shadow-lg p-4" method="POST">
<div class="form-group">
<i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
<input type="text" class="form-control" placeholder="Enter your Name" name="rName">
</div>
<div class="form-group">
<i class="fas fa-envelope-open"></i> 
</i> <label for="name" class="font-weight-bold pl-2">Email</label>
<input type="email" class="form-control" placeholder="Enter your Email" name="rEmail">
<small class="form-text">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
<i class="fas fa-key"></i>
</i> <label for="name" class="font-weight-bold pl-2">Password</label>
<input type="password" class="form-control" placeholder="Enter your Password" name="rPassword">
</div>
<button type="submit" class="btn btn-danger mt-3 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
<em style="font-size:10px;">Note - By clicking Sign Up , you agree to our Terms, Data policy and Cooike Policy </em>
<?php
if(isset($error_message)){
    echo $error_message; 
}
 ?>
</form>
<div class="text-center"><a href="index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
</div>
</div>
</div>
  <!-- javascript files -->
  <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>