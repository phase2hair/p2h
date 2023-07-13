<?php $this->load->view('header')?>

<?php 
$bg1=https://phase2hair.azurewebsites.net/assets/img/mar.jpg';

$page = $_SERVER['PHP_SELF'];
$sec = "30";

?>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">-->
    <!--  <h1>-->
    <!--    Clients-->
    <!--    <small>Client Management</small>-->
    <!--  </h1>-->
    <!--  <ol class="breadcrumb">-->
    <!--    <li class="active"><a href="<?=site_url()?>admin/dashboard"><i class="fas fa-tachometer-alt fa-lg"></i> Dashboard Home</a></li>-->
    <!--  </ol>-->
    <!--</section>-->

    <!-- Main content -->
    <section class="content" style="background-image: url(<?=$bg1?>); background-repeat: no-repeat;background-size: cover;background-position: center;">
  
  
      
      
      <!-- SEARCH BOX SEARCH BOX SEARCH BOX SEARCH BOX SEARCH BOX -->      
      
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



      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class='fa fa-users fa-lg'></i> Last Visit Older than 1 year</h3>
        </div>
        <div class="box-body">
        <?php if(count($previous)!==0){ ?>
                <tr>
        <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>First Name</th>
            <th><i class="fas fa-sort-down fa-lg"></i> Last Name</th>
            <th>Email</th>
            <th>Postal Code</th>
            <th>Last Visit</th>
            <th>Delete User</th>
          </tr>
        </thead>
        <tbody>
            <?php if(is_array($previous)){ 
               if(count($previous)==0){ ?>
                <tr>
        <td class="text-center" colspan="4">
            No Users found
        </td>
      </tr>
           <?php }
                foreach ($previous as $key ) { ?>
                  <tr>
                       
                        <td><?=$key->first_name?></td>
                        <td><?=$key->last_name?></td>
                        <td><?=$key->email_address?></td>
                        <td><i class="fas fa-map-marked-alt fa-lg"></i> &nbsp <?=$key->postal_code?></td>
                        <td><i class="far fa-calendar-alt fa-lg"></i> &nbsp <?=$key->last_visit?$key->last_visit:'No Visits Yet'?></td>
                        <td><a href="javascript::void(0)" onclick="return delete_user('<?=site_url()?>admin/delete_client/<?=$key->Id?>', '<?=$key->first_name.' '.$key->last_name?>')">Delete User</a></td>
                    </tr> 
            <?php } ?>
          <?php }else{ ?>
          <tr>
            <td class="text-center" colspan="4">
                No Clients found
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
          <?php } ?>
        </div>
        
      </div>
      <!-- /.box -->







      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Dash]
  </footer>
















  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Book <span id="name"></span> for a visit</h4>
      </div>
      <div class="modal-body">
        <form action="<?=site_url()?>admin/book_client" method="post">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <label>Set Appointment Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" placeholder="Enter Date DD/MM/YYYY" name="booked_for" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <div class="form-group">
                <label for="">Pick Appointment Time:</label>
                <div class="input-group clockpicker">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
                  <input type="text" name="booked_time" class="form-control" value="09:30">
              </div>
              </div>

               <div class="form-group">
                  <label>Hair Requirements</label>
                  <textarea class="form-control" rows="3" name="requirement" placeholder="Add Requirements ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Book Now</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>

  </div>
</div>

<div id="reqModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Requirements for <span id="name2"></span>'s visit</h4>
      </div>
      <div class="modal-body">
          <!-- i need this to show the stylist name, but currentky it keeps showing the no6 -->
        Last Stylist: &nbsp <i class="fas fa-cut fa-lg"></i> &nbsp <span id="stylist"></span>
        <p id="requirement"></p>
    </div>

  </div>
</div>

</div>
<!-- ./wrapper -->

<div id="viewFileModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="width: 335px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <img id="image-preview" style="width: 300px; height: 400px"/>
      </div>

  </div>
</div>

</div>







<!-- jQuery 2.2.3 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://phase2hair.azurewebsites.net/assets/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- AdminLTE App -->
<script src="https://phase2hair.azurewebsites.net/assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="https://phase2hair.azurewebsites.net/assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://phase2hair.azurewebsites.net/assets/jquery.inputmask.js"></script>
<script src="https://phase2hair.azurewebsites.net/assets/js/demo.js"></script>
<script type="text/javascript" src="https://phase2hair.azurewebsites.net/assets/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker({
      donetext: 'Done'
    });

      
</script>
<script>
  function requir(key){
      
    $('#name2').text($('#user'+key).text());
    $('#stylist').text($('#stylist'+key).text());
    $('#requirement').html($('#treatment'+key).text());
    $("#reqModal").modal()
  }
 
  function book(id, name) {
    $('#id').val(id);
    $('#name').text(name);
    $("#myModal").modal()
  }
  
  function delete_user(del_link, client){
      var r = confirm("Are you sure to delete "+client+"?");
        if (r == true) {
            location.href=del_link;
        } else {
            return false;
        }
  }
  
  function previewImage(selected){
      if(selected == null){
          return;
      }
    $('#image-preview').attr('src', 'https://phase2hair.azurewebsites.net/uploads/'+selected);
    $("#viewFileModal").modal()
}

  $(function(){
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });

     //Datemask dd/mm/yyyy
     $("#datemask").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    
  })
</script>
</body>
</html>
