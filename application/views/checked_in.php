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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Client Checked In</title>
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
        height: 50px;
        line-height: 40px;
        text-align: center;
        cursor: pointer;
        /* margin: 1px; */
    }

    
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="">
  <div class="lockscreen-logo">
    <a href="<?=site_url()?>"><b>Salon</b></a>
</div>
<div class="text-center">
    <h4>Client Checked In | Return to <a href="<?=site_url()?>home">Home</a></h4>
</div>
   
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check fa-2x"></i>
            <h2> Successfull!</h2>
            <?=$client->first_name?> <?=$client->last_name?> was checked in successfully
        </div>
   
  
 <div class="lockscreen-footer text-center navbar-fixed-bottom">
    Copyright &copy; 2018-<?=Date('Y')?> The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Check_in]
    
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
