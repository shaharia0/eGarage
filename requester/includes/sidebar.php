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
    <title> <?php echo TITLE   ?> </title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow ">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 ml-4" 
    href="customerprofile.php">eGarage</a></nav>
    <!-- container start -->
    <div class="container-fluid" style="margin-top: 50px;">
    <div class="row"> <!--row start--->
    <!-- side bar start -->
    <nav class="col-sm-2 bg-light sidebar py-5">
    <div class="sidebar-sticky">
    <ul class="nav flex-column nav-pills">
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='customerProfile'){echo 'active'; } ?>" href="customerprofile.php">
    <i class="fas fa-user"></i>Profile</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='submitRequest'){echo 'active'; } ?>" href="submitrequest.php">
    <i class="fab fa-accessible-icon"></i>Submit Request</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='checkStatus'){echo 'active'; } ?>" href="checkservicestatus.php">
    <i class="fas fa-aligh center"></i>Service Status</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='changePassword'){echo 'active'; } ?>" href="changepassword.php">
    <i class="fas fa-key"></i>Change Password</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../logout.php">
    <i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../gotodashboard.php">
    <i class="fas fa-caret-square-left"></i>Go to Dashboard</a>
    </li>
    </ul>
    </div>
    </nav> 
    <!-- side bar end -->
   