


  <?php $this->load->view('header')?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stylists
        <small>Stylist Management</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="<?=site_url()?>admin/dashboard?query="><i class="fa fa-dashboard"></i> Dashboard Home</a></li>
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
          <h3 class="box-title">Stylists</h3>
          <div class="box-tools pull-right">
            <a href="<?=site_url()?>admin/add_user" type="button" class="btn btn-box-tool" title="Add User">
              <i class="fa fa-plus"></i> New Stylist</a>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php if(is_array($clients)){ 

                if(count($clients)==0){ ?>
                    <tr>
            <td class="text-center" colspan="4">
                No Stylists found
            </td>
          </tr>
               <?php }
                foreach ($clients as $key ) { ?>
                  <tr>
                        <td><?=$key->first_name?></td>
                        <td><?=$key->last_name?></td>
                        <td>
                            <a href="<?=site_url()?>admin/modify_admin/<?=$key->id?>">Modify</a>
                        </td>
                    </tr> 
            <?php } ?>
          <?php }else{ ?>
          <tr>
            <td class="text-center" colspan="4">
                No Stylists found
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <?php 
          if($pages > 1){
          for ($i=1; $i < $pages+1; $i++) { 
            if($i == $current_page){
              $d = 'btn-warning';
            }else{
              $d = 'btn-default';
            } ?>
            
            <a href="<?=site_url()?>admin/users/<?=$i?>" class="btn  <?=$d?>"><?=$i?></a>
        <?php } }?>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Users]
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=assets_url()?>js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=assets_url()?>js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- AdminLTE App -->
<script src="<?=assets_url()?>js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=assets_url()?>js/demo.js"></script>
</body>
</html>
