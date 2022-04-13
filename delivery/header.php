<?php session_start();?>
<?php
  include("../connectdb.php");
  $sn=$_SESSION['sno'];
  if(!isset($_SESSION['user']))
  {
    header('location:login.php');
  }
  else
  {
    $name=$_SESSION['user'];
    $sql=mysqli_query($con,"SELECT name from deliveryboy where name='$name'" )or die('ERROR-:'.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Ordering Delivery</title>
  <!-- plugins:css -->
  
  
  <link rel="stylesheet" href="../admin/assets/css/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="../admin/assets/images/logo.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../admin/assets/images/logo.png" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a  href="login.php">
              <span class="nav-profile-name">Logout</span>
            </a>
           
          </li>
          
          
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel" style="width: 100%">
        <div class="content-wrapper">