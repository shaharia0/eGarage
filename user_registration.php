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
<div class="container pt-5" id="registration">
<h2 class="text-center">Create an Account</h2>
<div class="row mt-4 mb-4">
<div class="col-md-6 offset-md-3">
<form action="" class="shadow-lg p-4" method="POST">
<div class="form-group">
<i class="fas fa-user ">
</i> <label for="name" class="font-weight-bold pl-2">Name</label>
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
<button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
<em style="font-size:10px;">Note - By clicking Sign Up , you agree to our Terms, Data policy and Cooike Policy </em>
<?php
if(isset($error_message)){
    echo $error_message; 
}
 ?>
</form>
</div>
</div>
</div>
