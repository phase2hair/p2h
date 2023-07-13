<?php $this->load->view('header')?>

<?php 
$bg1=https://phase2hair.azurewebsites.net/assets/img/mar.jpg';

$page = $_SERVER['PHP_SELF'];
$sec = "30";

?>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    #more {display: none;}
</style>
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
  
  
  
  
    <a  href="<?=site_url()?>admin/dashboard" class="btn btn-warning">DASHBOARD</a>
    &nbsp&nbsp

    <a  href="<?=site_url()?>admin/dashboard" onclick="alert('This is now completed and will be soon switched on, Lee will be in for training in the next couple of days')" class="btn btn-success">STYLIST RECORDS</a>
    &nbsp&nbsp

    <a  href="<?=site_url()?>home/register_new_client" class="btn btn-primary">REGISTER A CLIENT</a>
    &nbsp&nbsp


    <a  href="<?=site_url()?>admin/dashboard" onclick="alert('This has been turned off by the owner request')" class="btn btn-danger" disabled>BOOK A CLIENT - Disabled</a>
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
  
  
  
  
  
  
      

      <!-- LOGGED IN BOX LOGGED IN BOX LOGGED IN BOX LOGGED IN BOX -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class='fa fa-calendar-check-o fa-lg'></i> Clients That Have Checked In Today</h3>
        </div>
        <div class="box-body">
        <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Action</th>
            <th>ID</th>
            <th>First Name</th>
            <th><i class="fas fa-sort-down fa-lg"></i> Last Name</th>
            <th>Postal Code</th>
            <th>Last Visit</th>
            <th>Visits</th>
            <th>Last Photo</th>
            <th>Allergy Test</th>
            <th>Treatments</th>
            <th>Finish</th>
          </tr>
        </thead>
        <tbody>
            <?php if(is_array($checked_in)){ 
               if(count($checked_in)==0){ ?>
                <tr>
        <td class="text-center" colspan="4">
            No Clients found
        </td>
      </tr>
           <?php }
           
                $t = 0;
                $sty = json_encode($stylists);
                foreach ($checked_in as $key ) { 
                    if(strlen($key->old_styles)>0){
                        $photos = explode('--',$key->old_styles);
                    }else{
                        $photos = [];
                    }
                
                ?>
                
                  <tr>
                        <td><a href="<?=site_url()?>admin/modify_client/<?=$key->Id?>">EDIT <i class="fas fa-user-edit fa-lg"></i></a></td>
                        <td><?=$key->Id?></td>
                        <td><?=$key->first_name?></td>
                        <td><?=$key->last_name?></td>
                        <td><i class="fas fa-map-marked-alt fa-lg"></i> &nbsp <?=$key->postal_code?></td>
                        <td><i class="far fa-calendar-alt fa-lg"></i> &nbsp <?=$key->last_visit?$key->last_visit:'No Visits Yet'?></td>
                        <td><i class="fas fa-cut fa-lg"></i> &nbsp<?=$key->total_visits?></td>
                        <?php if(count($photos)>0){?>
                            <td><a href="javascipt:void(0)" onclick="previewImage('<?=end($photos)?>')"><i class="fas fa-camera"></i> Preview Photo</a></td>
                        <?php }else{ ?>
                        <td>No Photo Found</td>
                        <?php } ?>
                        
                        <td>
                            

                            
                        </td>
                        
                        
                        
                        <td><button class="btn btn-success btn-xs" onclick='requir("<?=$t?>")'> TREATMENT BRIEF</button>
                        <span id="treatment<?=$t?>" style="display: none"><?=$key->requirement?></span>
                        <span id="user<?=$t?>" style="display: none"><?=$key->first_name." ".$key->last_name?></span>
                        <span id="stylist<?=$t?>" style="display: none"><?=$key->stylist_first_name.' '.$key->stylist_last_name?></span></td>
                        
                        <td>
                            <?php if($key->allow_checkout == 1){ ?>
                        <a href="<?=site_url()?>home/check_out/<?=$key->Id?>">CHECKOUT <i class="fa fa-handshake-o fa-lg"></i></a>
                            <?php }else{
                            echo "<span style='color:red'><i class='far fa-arrow-alt-circle-left fa-lg'></i> INCOMPLETE<span>" ;
                            } ?> 
                        </td>
                        
                    </tr> 
            <?php $t = $t+1; } ?>
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
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
<!-- NEWS BOX-body -->
            
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:1px 5px;vertical-align:middle;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-hfk9{background-color:#000000;border-color:#000000;text-align:left;vertical-align:middle}
.tg .tg-0lax{text-align:left;vertical-align:middle}
.tg .tg-baqh{text-align:center;vertical-align:middle}
</style>







<table class="tg" valign="center" align="center">




</table>  


<!--

    <span id="dots"></span><span id="more">
        <br>
        <table class="tg" align="center">
              <tr>
    <td class="tg-0lax">UD019:</td>
    <td class="tg-0lax">23RD JAN</td>
    <td class="tg-baqh"><font color="red"> <i class="fa fa-check"></i></font> </td>
    <td class="tg-0lax">Working on allergy test on the client registration screen</td>
  </tr>
          <tr>
            <td class="tg-0lax">UD016:</td>
            <td class="tg-0lax">20TH FEB</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-calculator"></i></font> </td>
            <td class="tg-0lax">Completed stylist record screen where you can work out clients and costs for the day</td>
          </tr>          
          <tr>
            <td class="tg-0lax">UD014:</td>
            <td class="tg-0lax">28TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-history"></i></font> </td>
            <td class="tg-0lax">Changed update window to be interactive and save space</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD013:</td>
            <td class="tg-0lax">27TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="far fa-images"></i></font> </td>
            <td class="tg-0lax">Added preview photo on the search box</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD012:</td>
            <td class="tg-0lax">26TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-stamp"></i></font> </td>
            <td class="tg-0lax">Auto-stamps stylist name to the treaments box</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD011:</td>
            <td class="tg-0lax">22ND JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-bug"></i></font> </td>
            <td class="tg-0lax">Fixed bug when you click the clients photo to popup with a larger image</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD010:</td>
            <td class="tg-0lax">20TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-text-height"></i></font> </td>
            <td class="tg-0lax">Created script to change the case of client records to keep all records similar</td>
          </tr> 
          <tr>
            <td class="tg-0lax">UD009:</td>
            <td class="tg-0lax">19TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-camera"></i></font> </td>
            <td class="tg-0lax">Last photo taken autoloads and you can click it to see it full size</td>
          </tr> 
          <tr>
            <td class="tg-0lax">UD008:</td>
            <td class="tg-0lax">18TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-mouse-pointer"></i></font> </td>
            <td class="tg-0lax">Disclaimer popup on the main screen for the clients to read</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD007:</td>
            <td class="tg-0lax">16TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="far fa-address-card"></i></font> </td>
            <td class="tg-0lax">Fixed underscore and hyphens in email addresses</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD006:</td>
            <td class="tg-0lax">15TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-camera"></i></font> </td>
            <td class="tg-0lax">Added facility to upload photos direct from the APP</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD005:</td>
            <td class="tg-0lax">15TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-text-width"></i></font> </td>
            <td class="tg-0lax">Forced only allowed characters for clients</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD004:</td>
            <td class="tg-0lax">15TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fab fa-stumbleupon"></i></font> </td>
            <td class="tg-0lax">Added company logo to the welcome screen</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD003:</td>
            <td class="tg-0lax">14TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-bug"></i></font> </td>
            <td class="tg-0lax">Fixed the stylist not being selected bug</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD002:</td>
            <td class="tg-0lax">14TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-history"></i></font> </td>
            <td class="tg-0lax">Added 2nd and 3rd visits to the client screen</td>
          </tr>
          <tr>
            <td class="tg-0lax">UD001:</td>
            <td class="tg-0lax">12TH JAN</td>
            <td class="tg-baqh"><font color="red"> <i class="fas fa-mouse-pointer"></i></font> </td>
            <td class="tg-0lax">General layout changes</td>
          </tr>
          </table>
    </span></p>
<div align="center">
<button onclick="moreFunction()" id="myBtn">More Updates</button>
</div>
<script>
function moreFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "More Updates"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Less updates"; 
    moreText.style.display = "inline";
  }
}
</script>


-->

        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- SEARCH BOX SEARCH BOX SEARCH BOX SEARCH BOX SEARCH BOX -->      
      
<hr size="2">
<form action="<?=site_url()?>admin/dashboard">
                  <div class="input-group input-group-lg">
                    <input style="background:#ffffff; color:black;" type="text" name="query" placeholder="Search Clients" class="form-control">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary btn-lg btn">Search <i class='fa fa-search fa-lg'></i></button>
                        </span>
                  </div>
                </form>
                <font color="white">Search for either <u>ALL</u> or <u>PART</u> of <b>First Name</b> or <b>Last Name</b> or <b>Postcode</b> - Or press search on its own to show all clients</font>
                
<br>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class='fa fa-users fa-lg'></i> Clients</h3>
        </div>
        <div class="box-body">
        <?php if(count($clients)!==0){ ?>
                <tr>
        <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Action</th>
            <th>ID</th>
            <th>First Name</th>
            <th><i class="fas fa-sort-down fa-lg"></i> Last Name</th>
            <th>Postal Code</th>
            <th>Last Visit</th>
            <th>Last Photo</th> 
            <th>Allergy Test</th>
            <th>Manual Check In</th>
            <th>Delete User</th>
          </tr>
        </thead>
        <tbody>
            <?php if(is_array($clients)){ 
               if(count($clients)==0){ ?>
                <tr>
        <td class="text-center" colspan="4">
            No Users found
        </td>
      </tr>
           <?php }
                foreach ($clients as $key ) { 
                if(strlen($key->old_styles)>0){
                        $photos = explode('--',$key->old_styles);
                    }else{
                        $photos = [];
                    }
                
                ?>
                  <tr>
                        <td>
                            <a href="<?=site_url()?>admin/modify_client/<?=$key->Id?>">EDIT <i class="fas fa-user-edit fa-lg"></i></a> 
                            <!-- <a href="#" onclick="book('<?=$key->Id?>','<?=$key->first_name.' '.$key->last_name?>')">Book</a> -->
                        </td>
                        <td><?=$key->Id?></td>
                        <td><?=$key->first_name?></td>
                        <td><?=$key->last_name?></td>
                        <td><i class="fas fa-map-marked-alt fa-lg"></i> &nbsp <?=$key->postal_code?></td>
                        <td><i class="far fa-calendar-alt fa-lg"></i> &nbsp <?=$key->last_visit?$key->last_visit:'No Visits Yet'?></td>
      
                        <?php if(count($photos)>0){?>
                            <td><a href="javascipt:void(0)" onclick="previewImage('<?=end($photos)?>')"><i class="fas fa-camera"></i> Preview Photo</a></td>
                        <?php }else{ ?>
                            <td> </td>
                        <?php } ?>
                        
                        <td>
                            <?php
                            if ($key->skin_test_allergy == 1)
                            {
                            echo "<font color='red'><b>Yes</b></font>";
                            }
                            elseif ($key->skin_test_allergy == 2)
                            {
                            echo "<b>None</b>";
                            }
                            else
                            {
                            echo "<font color='lightgrey'>Unknown</font>";
                            }
                            ?>
                        
                        </td>
                        
                        <td><a href="<?=site_url()?>admin/check_in/<?=$key->Id?>"><i class="fas fa-user-check fa-lg"></i>&nbsp Check In</a></td>
                        <td><font color="red"><i class="fas fa-user-times fa-lg"></i> <font color=#808080>&nbsp Disabled Fea</font><a href="#" onclick="return delete_user('<?=site_url()?>admin/delete_client/<?=$key->Id?>', '<?=$key->first_name.' '.$key->last_name?>')">t</a><font color=#808080>ure</font></td>
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
            
            <a href="<?=site_url()?>admin/dashboard?query=<?=$_GET['query']?>&&page=<?=$i?>" class="btn  <?=$d?>"><?=$i?></a>
        <?php } }?>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



<a href="<?=site_url()?>admin/last_year">Run - 12 Month Query [<i>Shows all clients not visited within 12 months</i>]</a></br>
<a href="<?=site_url()?>admin/duplicateInfo">Run - Duplicate Query [<i>Shows all clients that COULD be duplicated in the database</i>]</a>










      

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
