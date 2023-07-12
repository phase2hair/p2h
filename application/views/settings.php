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



<?php $this->load->view('header')?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>User Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Modify Profile</h3>
        </div>
        <div class="box-body">
        <div class="text-center">
</div>
    <?php if(isset($error)){ ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?=$error?>
        </div>
    <?php }?>

     <?php if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Successfull!</h4>
            <?=$success?>
        </div>
    <?php }?>
    <form action="<?=site_url()?>admin/updateMe/<?=$client->id?>" method="post" style="margin-bottom: 50px">
        <div class="form-group">
            <label class="col-sm-12 control-label">First Name </label>

            <div class="col-sm-12">
                <input type="text" value="<?=$client->first_name?>" name="first_name" class="form-control" placeholder="First Name">
            </div>
        </div>  
        <div class="form-group">
            <label class="col-sm-12 control-label">Last Name </label>

            <div class="col-sm-12">
                <input type="text" value="<?=$client->last_name?>" name="last_name" class="form-control" placeholder="Last Name">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-12 control-label">Mobile Number </label>

            <div class="col-sm-12">
                <input type="text" value="<?=$client->phone?>" name="phone" class="form-control" placeholder="Mobile Number">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-12 control-label">Email </label>

            <div class="col-sm-12">
                <input type="email" value="<?=$client->email?>" name="email" class="form-control" placeholder="Email Address">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12 control-label">Password </label>

            <div class="col-sm-12">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Settings]
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=site_url()?>/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=site_url()?>/assets/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- AdminLTE App -->
<script src="<?=site_url()?>/assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=site_url()?>/assets/js/demo.js"></script>
</body>
</html>
