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
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;500;700;900&display=swap" rel="stylesheet">
    <title>VRMS</title>
</head>
<body>
<!-- start nav bar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-primary pl-5 fixed-top">
<a href="index.php" class="navbar-brand">eGarage</a>
<span class="navbar-text">A vehicle repairing workshop</span>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myMenu">
    <ul class="navbar-nav pl-5 custom-nav">
    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
    <!-- <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Login</a></li> -->
    </ul>
</div>
<div class="collapse navbar-collapse" id="myMenu">
<ul class="navbar-nav pl-5 custom-nav">
<li class="nav-item"><a href="user_registration.php" class="nav-link">Registration</a></li>
    <li class="nav-item"><a href="requester/userlogin.php" class="nav-link">Sign In</a></li>
    </ul>
</div>
</nav>
<!-- end nav bar -->
<!-- start header jumbotron -->
<header class="jumbotron background-image" style="background-image:url(images/banner1.jpg);">
<div class="myclass main-heading">
    <h1 class="text-uppercase  text-dark font-weight-bold">Welcome to eGarage</h1>
    <p class="font-italic">Customer's happiness is our aim</p>
    <a href="requester/userlogin.php" class="btn btn-success mr-4">Sign In</a>
    <a href="user_registration.php" class="btn btn-danger mr-4">Sign up</a>
</div>

</header>
<!-- end header jumbotron -->
<!-- vrsm services part start -->
<div class="container">
<div class="jumbotron">
<h3 class="text-center"> VRSM Services</h3>
<p>Chowdhury workshop is a vehicle servicing workshop,
 offering you the best service of the town.We focus on 
 enhancing your uses experience by offering world-class 
 services. Our motto is <b>" Take care of your vehicle
  and the vehicle will care you in the highway "</b>  
  Our mechanics are well trained and maintain customer
   satisfaction.Now you can book your service online by doing Registration.</p>
</div>
</div>
<!-- vrsm services part end -->
<!-- our services part start -->
<div class="container text-center border-bottom" id="services">
<h2>Our Services</h2>
<div class="row mt-4">
<div class="col-sm-4 mb-4"> 
<a href="#"><i class="fas fa-wrench fa-6x text-success"></i></a>
<h4 class="mt-4">Experienced Mechanics</h4>
</div>
<div class="col-sm-4 mb-8">
<a href="#"><i class="fas fa-cogs fa-6x text-primary"></i></a>
<h4 class="mt-4">Quality Service</h4>
</div>
<div class="col-sm-4 mb-4"> 
<a href="#"><i class="fas fa-tags fa-6x text-info"></i></a>
<h4 class="mt-4">Affordable Prices</h4>
</div>
</div>
</div>
<!-- our services part end -->
<!-- our mechanic part start -->
<div class="jumbotron bg-info">
<div class="container">
<h2 class="text-center text-white"> Our Mechanics</h2>
<div class="row mt-5">
<div class="col-lg-3 col-sm-6">
<div class="card shadow-lg mb-2">
<div class="card-body text-center">
<img src="images/p1.jpg" class="img-fluid" style="border-radius:100px;" alt="shaharia">
<h4 class="card-title">Mr Rahim</h4>
<p class="card-text">Inspect vehicle systems to repair, maintain and upgrade!</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card shadow-lg mb-2">
<div class="card-body text-center">
<img src="images/p2.jpg" class="img-fluid" style="border-radius:100px;" alt="shaharia">
<h4 class="card-title">Mr Karim </h4>
<p class="card-text">Conduct routine maintenance work and replacing fluids, </p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card shadow-lg mb-2">
<div class="card-body text-center">
<img src="images/p3.jpg" class="img-fluid" style="border-radius:200px;" alt="shaharia">
<h4 class="card-title">Mr Rafiq</h4>
<p class="card-text">Repair or replace broken or dysfunctional parts and fix issues (e.g. leaks)!</p>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="card shadow-lg mb-2">
<div class="card-body text-center">
<img src="images/p4.jpg" class="img-fluid" style="border-radius:100px;" alt="shaharia">
<h4 class="card-title"> Mr Safiq</h4>
<p class="card-text">Provide accurate estimates (cost, time, effort) for a repair or maintenance job!</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- our mechanic part end -->
<!-- conatct us start -->
<div class="container" id="contact">
<h2 class="text-center mb-4">Contact Us</h2>
<div class="row">
<?php include('contactform.php') ?>
<!-- address area start -->
<div class="col-md-4 text-center">
<strong>Headquarter:</strong><br>
Chowdhury group & Industry,<br>
Dhanmondi 27,<br>
Dhaka -1209, Bangladesh <br>
Phone: +8801680848558 <br>
<a href="https://www.facebook.com/shaharia0/">www.Chowdhuryindustry.com</a><br>
<br> <br>
<strong>Branch:</strong><br>
Chowdhury group & Industry,<br>
Gulshan 2,<br>
Dhaka -1212, Bangladesh <br>
Phone: +880758339563 <br>
<a href="https://www.facebook.com/shaharia0/">www.Chowdhuryindustry.com</a><br>
</div>
<!-- address area end -->
</div>
</div>
<!-- conatct us end -->
<!-- Footer area start -->
<footer class="container-fluid bg-dark mt-5 text-white">
<div class="container">
<div class="row  py-3">
<div class="col-md-6">
<span class="pr-2">Follow us :</span>
<a href="https://www.facebook.com/shaharia0/" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
<a href="https://www.instagram.com/chowdhury_shahariaa/" class="pr-2 fi-color"><i class="fab fa-instagram"></i></a>
<a href="https://www.linkedin.com/in/shahariar-chowdhury-5bb7b4165/" class="pr-2 fi-color"><i class="fab fa-linkedin-in"></i></i></a>
<a href="https://www.youtube.com/watch?v=HRvabYOgTZg" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
</div>
<!-- second column -->
<div class="col-md-6 text-right" >
<small>Copyright@2021, All rights reserved by Shaharia Chowdhury</small>
<small class="ml-2"><a href="Admin/adminlogin.php" style="color:black;">Admin Login</a></small>
</div>
</div>
</div>
</footer>
<!-- Footer area  end -->


 <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>