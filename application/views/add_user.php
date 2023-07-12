 

    <?php $this->load->view('header')?>


<script>
    function letNumOnly(input) {
        var regex = /[^a-z0-9]/gi;
        input.value = input.value.replace(regex, "");
    }
    
    function letOnly(input) {
        var regex = /[^a-z-]/gi;
        input.value = input.value.replace(regex, "");
    }

    function numOnly(input) {
        var regex = /[^0-9]/gi;
        input.value = input.value.replace(regex, "");
    }
    
    function emailOnly(input) {
        var regex = /[^0-9a-z.@_-]/gi;
        input.value = input.value.replace(regex, "");
    }

    function postOnly(input) {
        var regex = /[^0-9a-z ]/gi;
        input.value = input.value.replace(regex, "");
    }
</script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">-->
    <!--  <h1>-->
    <!--    Stylists-->
    <!--    <small>Stylists Management</small>-->
    <!--  </h1>-->
    <!--  <ol class="breadcrumb">-->
    <!--    <li><a href="<?=site_url()?>admin/dashboard"><i class="fas fa-tachometer-alt fa-lg"></i> Dashboard Home</a></li>-->
    <!--    <li class="active">New Stylists</li>-->
    <!--  </ol>-->
    <!--</section>-->

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
          <h3 class="box-title">Add Stylists</h3>
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
    <form action="<?=site_url()?>admin/save_user" method="post" style="margin-bottom: 50px">
        <div class="form-group">
            <label class="col-sm-12 control-label">First Name </label>

            <div class="col-sm-12">
                <input type="text" name="first_name" onkeyup="letOnly(this)" class="form-control" placeholder="First Name">
            </div>
        </div>  
        <div class="form-group">
            <label class="col-sm-12 control-label">Last Name </label>

            <div class="col-sm-12">
                <input type="text" name="last_name" onkeyup="letOnly(this)" class="form-control" placeholder="Last Name">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-12 control-label">Type of account</label>

            <div class="col-sm-12">
               <select name="level" class="form-control">
                   <option value="0">Stylist</option>
                   <option value="2">Receptionist</option>
               </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-12 control-label">Level</label>

            <div class="col-sm-12">
               <select name="level" class="form-control">
                   <option value="0">Stylist</option>
                   <option value="1">Senior Stylist</option>
                   <option value="2">Senior Designer</option>
                   <option value="3">Non technical</option>
                   
               </select>
            </div>
        </div>
        
        <div class="form-group text-center">
            <button class="btn btn-primary"  style="margin-top: 20px;">Submit</button>
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
    Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> Add_User
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
