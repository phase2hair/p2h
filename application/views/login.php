<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url()?>/assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=site_url()?>/assets/fonts/font-awesome.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?=site_url()?>"><b>Salon</b></a>
  </div>


  <div class="lockscreen-name">ADMIN Signin</div>
  <?php if(isset($error)){ ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?=$error?>
        </div>
    <?php }?>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="margin-top: 40px;">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?=site_url()?>/assets/img/avatar2.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="<?=site_url()?>admin/login">
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="Access Code">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>

  
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" >
    Enter your Admin access code to access the command center <?=sha1('password')?>
  </div>



  <div class="lockscreen-footer text-center navbar-fixed-bottom">
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Login]
  </div>
</div>

<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="<?=site_url()?>/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=site_url()?>/assets/js/bootstrap.min.js"></script>
</body>
</html>
