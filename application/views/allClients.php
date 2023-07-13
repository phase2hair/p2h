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
  <title>Booked Clients</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
        /* margin: 1px; */
    }

    
  </style>
  <?php 
$bg1='https://phase2hair.azurewebsites.net/assets/img/mar.jpg';

?>
</head>
<body class="hold-transition lockscreen"
style="background-image: url(<?=$bg1?>); background-repeat: no-repeat;background-size: cover;background-position: center;">
<!-- Automatic element centering -->
<div class="">
  <div class="lockscreen-logo">
    <a href="<?=site_url()?>"><b>Clients</b></a>
  </div>
  <div class="table-responsive" style="background-color: #fff;">
  <h3>
  Booked Clients for Today
  <a href="<?=site_url()?>" class="fa fa-home btn-xs btn btn-primary pull-right"></a>
  </h3>
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
            foreach ($clients as $key ) { 
                $post_code = preg_replace('/\s+/', '', $key->postal_code);
                $var = $post_code;
                
            if(strlen($post_code)==6){
                $post_code = 'XXX '.substr($post_code, -3);
            }else if(strlen($post_code)==7){
                $post_code = 'XXXX '.substr($post_code, -3);
            }else {
                $post_code = 'XX '.substr($post_code, -3);
            }
            
            
            
            ?>
               <tr>
                    <td><?=$key->first_name?></td>
                    <td><?=$key->last_name?></td>
                    <td><i class="fas fa-map-marked-alt fa-lg"></i> &nbsp<?=$post_code?></td>
                    <td>
                        <a href="<?=site_url()?>admin/modify_client/<?=$key->Id?>?client=yes"><i class="fas fa-flag-checkered fa-lg"></i> &nbspCHECK-IN</a>
                    </td>
                </tr> 
        <?php } ?>
      <?php }else{ ?>
      <tr>
        <td class="text-center" colspan="4">
            No Clients born on <?=$months[$_GET['month']]?>, <?=$_GET['day']?> are booked for today
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <p align="center">
<i>In compliance with GDPR and DATAPROTECTION, full postal information will not be fully displayed.</i>
 </p>
    </div>
    <p align="center"><a href="javascript:history.back()" style="margin-top: 20px;" class="btn btn-md btn-danger"><i class="fas fa-backward -fa-lg"></i>&nbsp Previous Screen</a></p>
 <div class="lockscreen-footer text-center navbar-fixed-bottom">
 Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [AllClients]
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
         var today = new Date().getDate();
        location.href = "<?=site_url()?>home/getUsers/?month="+month+'&&day='+day+'&&today='+today;
     }

     
</script>
</body>
</html>
