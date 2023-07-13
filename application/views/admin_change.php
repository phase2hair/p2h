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
        Stylists
        <small>Stylists Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>admin/dashboard"><i class="fas fa-tachometer-alt fa-lg"></i> Dashboard Home</a></li>
        <li class="active">Modify</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">





                    <a  href="<?=site_url()?>admin/dashboard" class="btn btn-warning">DASHBOARD</a>
                    &nbsp&nbsp
                
                    <a  href="<?=site_url()?>admin/stylist-records" class="btn btn-success">STYLIST RECORDS</a>
                    &nbsp&nbsp
                
                    <a  href="<?=site_url()?>home/register_new_client" class="btn btn-primary">REGISTER A CLIENT</a>
                    &nbsp&nbsp
                
                
                    <a  href="<?=site_url()?>admin/dashboard" class="btn btn-danger" disabled>BOOK A CLIENT - Disabled</a>
                    &nbsp&nbsp
                
                <!--
                    <a  href="<?=site_url()?>admin/dashboard" class="btn btn-default" disabled>Beauty & Theorpy - Disabled</a>
                    &nbsp&nbsp
                -->
                <!--    
                    <a  href="<?=site_url()?>admin/dashboard" class="btn btn-info" disabled>Tanning - Disabled</a>
                    &nbsp&nbsp
                    
                    stylist-records
                -->    
                    
                    <br>







      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Modify User</h3>
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
    <form action="<?=site_url()?>admin/updateUser/<?=$client->id?>" method="post" style="margin-bottom: 50px">
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
            <label class="col-sm-12 control-label">Type of account</label>

            <div class="col-sm-12">
               <select name="type" class="form-control">
                   <option value="0" <?php echo  set_select('type', '0', TRUE); ?>>Stylist</option>
                   <option value="2" <?php echo  set_select('type', '2', TRUE); ?>>Receptionist</option>
               </select>
            </div>
        </div>
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label class="col-sm-12 control-label">Level</label>

            <div class="col-sm-12">
               <select name="level" class="form-control">
                   <option value="0" <?php echo  set_select('level', '0', TRUE); ?>>Stylist</option>
                   <option value="1" <?php echo  set_select('level', '1', TRUE); ?>>Senior Stylist</option>
                   <option value="2" <?php echo  set_select('level', '2', TRUE); ?>>Senior Designer</option>
                   <option value="3" <?php echo  set_select('level', '3', TRUE); ?>>Non technical</option>
                   
               </select>
            </div>
        </div>
        
        
        <div class="form-group text-center">
            <button class="btn btn-primary" style="margin-top: 15px;">Submit</button>
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
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Admin_Change]
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- AdminLTE App -->
<script src="https://phase2hair.azurewebsites.net/assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://phase2hair.azurewebsites.net/assets/js/demo.js"></script>
</body>
</html>
