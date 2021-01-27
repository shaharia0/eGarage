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
if(isset($_REQUEST['reqsubmit'])){
    if(($_REQUEST['user_name']=="")||($_REQUEST['user_email']=="")||($_REQUEST['user_password']=="")){
        $passmessage = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">
        All fields are Required</div>';
    }else{
        $username = $_REQUEST['user_name'];
        $useremail = $_REQUEST['user_email'];
        $userpassword = $_REQUEST['user_password'];
        $sql = "INSERT INTO user_registration_db(user_namee,user_email,user_password) VALUES 
        ('$username','$useremail','$userpassword')";
        if($conn->query($sql) == TRUE){
            $passmessage = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">
            Added Successfuly</div>';
        }else{
            $passmessage = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">
            Unable to Add</div>';
        }

    }
}
?>
<!-- add customer second column start -->
<div class="col-sm-6 mt-5 mx-3 jumbotron"> 
<h3 class="text-center">Add New Customer</h3>
<form action="" method="POST">
    <div class="form-group">
    <label for="user_name">Name</label>
    <input type="text" name="user_name" id="user_name" class="form-control" >
    </div>
    <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" id="user_email" class="form-control" >
    </div>
    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" id="user_password" class="form-control" >
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
    <a href="customerlist.php" class="btn btn-secondary">Close</a>
    </div>
     <?php if(isset($passmessage)) {echo $passmessage;} ?>
</form>
</div>
<!-- add customer second column End -->
<?php
include('includes/adminfooter.php');
?>