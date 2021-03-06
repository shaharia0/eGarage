<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/custom.css">   
    <title><?php echo TITLE ?></title>
</head>
<body>
<!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow ">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 ml-4" 
    href="admindashboard.php">eGarage</a></nav>
<!-- container start -->
    <div class="container-fluid" style="margin-top: 50px;">
    <div class="row"> <!--row start--->
    <!-- side bar start -->
    <nav class="col-sm-2 bg-light sidebar py-5">
    <div class="sidebar-sticky">
    <ul class="nav flex-column nav-pills">
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='admindashboard') {echo 'active';} ?> " href="admindashboard.php" >
    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='servicerequest') {echo 'active';} ?> " href="servicerequest.php">
    <i class="fas fa-aligh center"></i>Service Request</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='workorder') {echo 'active';} ?>" href="workorder.php">
    <i class="fab fa-accessible-icon"></i>Work Order</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='customerlist') {echo 'active';} ?>" href="customerlist.php">
    <i class="fas fa-user"></i>Customer Details</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='technician') {echo 'active';} ?>" href="technician.php">
    <i class="fas fa-users"></i></i>Technician </a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(PAGE=='changeadminpassword') {echo 'active';} ?>" href="changeadminpassword.php">
    <i class="fas fa-key"></i>Change Password</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../logout.php">
    <i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="../index.php">
    <i class="fas fa-caret-square-left"></i>Home page</a>
    </li>
    </ul>
    </div>
    </nav> <!-- side bar end -->