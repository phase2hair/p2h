<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=site_url()?>/assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="<?=site_url()?>/assets/js/datepicker/datepicker3.css">
  <link rel="stylesheet" type="text/css" href="<?=site_url()?>/assets/bootstrap-clockpicker.min.css">
  <link rel="stylesheet" type="text/css" href="<?=site_url()?>/assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  
  
  

          
</head>

<body class="hold-transition skin-blue sidebar-collapse ">
<!-- Site wrapper -->
<div class="wrapper">
<?php if(!isset($_GET['client'])){ ?>
     <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url()?>admin/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
          
          
          
          
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PHASE 2 HAIR.</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
            
         <!-- User Account: style can be found in dropdown.less -->
          
          
          
          <?php if(isset($_SESSION['loggedIn'])){?>
            <li class="dropdown user user-menu">
            <a href="<?=site_url()?>admin/dashboard?query=">
              <img src="<?=site_url()?>/assets/img/avatar2.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['user']->first_name?> <?=$_SESSION['user']->last_name?></span>
            </a>
            
            
            
        <li>
            <a href="<?=site_url()?>"><i class="fa fa-home fa-lg"></i> Check-in</a>
          </li>






            
            
            
            <ul class="dropdown-menu">
              <!-- User image -->
            

            
             

              
            </ul>
          </li>
          
          
         <li>
            <a href="<?=site_url()?>admin/users"><i class="fa fa-users fa-lg"></i> Stylists</a>
          </li>
          
          
          
          <!--
          <li>
            <a href="<?=site_url()?>admin/settings"><i class="fa fa-gears"></i></a>
          </li>
         -->  
         
         
         
         
          <li>
            <a href="<?=site_url()?>admin/logout"><i class="fas fa-sign-out-alt fa-lg"></i> Exit</a>
          </li>
        
          <?php }?>
        

          
        </ul>
      </div>
    </nav>
  </header>    
<?php }?>
  

  <!-- =============================================== -->
  
  
  
  
