x<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/fonts/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
 <?php 
 $bg1='https://phase2hair.azurewebsites.net/assets/img/mar.jpg';
?>

  <style>
      .botn {
        height: 30px;
        line-height: 15px;
    }
  </style>
  
  
  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 260px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -130px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>


<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>  
  
  
  
  
  
  
  
  
</head>
<body class="hold-transition lockscreen" style="background-image: url(<?=$bg1?>); background-repeat: no-repeat;background-size: cover;background-position: center;">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?=site_url()?>"><b></b></a>
  </div>

  <div class="text-center" style="margin-top: 50px;">

    <img src="https://phase2hair.azurewebsites.net/assets/img/logo.png" width="400" height="150">
  </div>

  <div>


    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <a  href="<?=site_url()?>home/register_new_client" class="btn btn-block btn-success botn"><b>NEW</B> Client Check In</a>
    </div>
    
      <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <a  href="<?=site_url()?>home/check_in" class="btn btn-block btn-primary botn"><b>EXISTING</b> Client Check In</a>
    </div>
  
  <br>
  
  <div class="text-center">
  <div class="popup" onclick="myFunction()">
      <h3><font color="white">DISCLAIMER</font></h3>
  <span class="popuptext" id="myPopup">This is a database for recording hair colouring levels only, your information will not be shared or used for any other purpose</span>
  </div>
</div>

  
 <br><br>
      <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <a href="<?=site_url()?>admin/dashboard?query=" class="btn btn-block btn-danger botn"><b>ADMIN</b> Log in</a>
    </div>










    <!-- START LOCK SCREEN ITEM -->
    <!-- 
    <div class="text-center" style="margin-top: 80px;">
      <a href="<?=site_url()?>home/signin_as_admin"  class="btn btn-warning botn">Signin as an Admin</a>
    </div>
  </div>
 -->
 
  <div class="box-group hidden" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Checked In clients
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                    <div class="table-responsive text-center" style=" background-color: #fff">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Postal Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                           
                            <tbody>
                                <?php if(is_array($clients)){ 
                                    foreach ($clients as $key ) { ?>
                                    <tr>
                                            <td><?=$key->first_name?></td>
                                            <td><?=$key->last_name?></td>
                                            <td><?=$key->postal_code?></td>
                                            <td>
                                                <a href="<?=site_url()?>home/check_out/<?=$key->Id?>">Check out</a>
                                            </td>
                                        </tr> 
                                <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td class="text-center" colspan="4">
                                    No Clients Checked in at this moment
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                            </div>
                    </div>
                  </div>
                </div>
                
              </div>

  
  
  <div class="lockscreen-footer text-center navbar-fixed-bottom">
    Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <a href="<?=site_url()?>admin/dashboard?query="><?=Date('Y')?></a> [Welcome]
  </div>
</div>


<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/bootstrap.min.js"></script>
</body>
</html>
