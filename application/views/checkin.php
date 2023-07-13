<?php 
    $months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];
    $days = [
        31,29,31,30,31,30,31,31,30,31,30,31
    ]

?>
<?php 
$bg1='https://phase2hair.azurewebsites.net/assets/img/mar.jpg';

?>
<!DOCTYPE html>
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

  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/js/fullcalendar/fullcalendar.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
      .botn {
        height: 40px;
        line-height: 40px;
        text-align: center;
        cursor: pointer;
        background-color: #286090;
        /* margin: 1px; */
        color: #fff;
    }
    .botn:hover{
        color: #fff;
  background-color: #f0ad4e;
  border-color: #204d74;
    }
    
  </style>
</head>
<body class="hold-transition lockscreen" style="background-image: url(<?=$bg1?>); background-repeat: no-repeat;background-size: cover;background-position: center;">
<!-- Automatic element centering -->
<div class="">
  <div class="lockscreen-logo">
    <a href="<?=site_url()?>"><b> </b></a>
  </div>
  <div style="margin-top: 50px;">
  <h1 class="text-center">Salon</h1>
  <?php if(!isset($_GET['month'])){ ?>
    
    <!-- START LOCK SCREEN ITEM -->
    <div style="width: 100% !important;" class="months">
       <h3 class="text-center">
       <a href="<?=site_url()?>" class="fa fa-home btn btn-primary"></a>
       Select Your Month of Birth</h3>
  
       <div class="row">
           <?php for ($i=0; $i < 12; $i++) { ?>
              <div class="col-xs-4 botn <?=$i?>" onclick="setMonth(<?=$i?>)">
                  <?=$months[$i]?>
              </div>
           <?php } ?>
       </div>
    </div>
    <?php }?>
    <!-- START LOCK SCREEN ITEM -->
  
    <?php if(isset($_GET['month'])){ ?>
    
    <div style="width: 100% !important;" class="days">
       <h4 class="text-center">
       <a href="<?=site_url()?>" class="fa fa-home btn btn-primary"></a>
       <a href="<?=current_url()?>" class="fa fa-arrow-left btn btn-warning"></a>Select Your Day of Birth</h4>
  
       <div class="row">
           <?php for ($i=1; $i < $days[(int)$_GET['month']]+1; $i++) { ?>
              <div class="col-xs-2 botn btn-primary <?=$i?>" onclick="setDay(<?=$i?>, <?=$_GET['month']?>)">
                  <?=$i?>
              </div>
           <?php } ?>
       </div>
    </div>
   <p align="center"><font size="6" color="red"></font></p>
    <?php }?>
  </div>
 
 
 <div class="lockscreen-footer text-center navbar-fixed-bottom">
 Copyright &copy; The EasyPC Company <b>Lee Fowler</b><?=Date('Y')?> [Checkin]
  </div>
</div>

<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/bootstrap.min.js"></script>

<script>
     function setMonth(month) {
        location.href = location.href+'?month='+month;
     }

     function setDay(day, month) {
        
        location.href = "<?=site_url()?>home/getUsers/?month="+month+'&&day='+day;
     }

     
</script>
</body>
</html>
