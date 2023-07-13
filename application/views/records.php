<?php $this->load->view('header')?>

<?php 
$bg1=https://phase2hair.azurewebsites.net/assets/img/mar.jpg';

$page = $_SERVER['PHP_SELF'];
$sec = "30";
$selectedStylist = 0;
if($_SESSION['user']->type==0){
  $selectedStylist = $_SESSION['user']->id;
}
if(isset($_GET['stylist'])){
  $selectedStylist = (int)$_GET['stylist'];
}
$curr_date = Date('d/M/Y');
if(isset($_GET['date'])){
  $curr_date = $_GET['date'];
}

$hidden = true;



$total = 0;

?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
    #more {display: none;}
</style>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-8koo{background-color:#cbcefb;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-8nuh{background-color:#fffe65;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-8jgo{border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-5kg3{font-size:100%;background-color:#cbcefb;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-vvj7{background-color:#9aff99;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-f8tr{background-color:#ffccc9;border-color:#ffffff;text-align:center;vertical-align:top}
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
      <!-- LOGGED IN BOX LOGGED IN BOX LOGGED IN BOX LOGGED IN BOX -->
      
      
      
      
                
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
          <div class="row">
            <div class="col-xs-12 col-lg-6 col-md-6">
              <form method="get" action="<?=site_url()?>admin/stylist-records">
                <div class="row">
                <div class="col-xs-2" style="line-height: 35px;">Stylist: </div>
                <div class="col-xs-7">
              <select class="form-control stylists" name="stylist" onchange="setActiveStylist(this.value)" required>
                <option selected>Select a Stylist</option>
                <?php foreach ($stylists as $key) {?>
                  <option value="<?=$key->id?>" <?php echo  set_select('stylist', $key->id, $key->id==$selectedStylist) ?>><?=$key->first_name.' '.$key->last_name?></option>  
                <?php } ?>
              </select>
                </div>
                <div class="col-xs-3">
                  <button class="btn btn-primary">Go</button>
                </div>
              </div>
              </form>
            </div>
            <div class="col-xs-12 col-lg-6 col-md-6">
              <form method="get" action="<?=site_url()?>admin/stylist-records">
                <div class="row">
                  <input type="hidden" name="stylist" value="<?=$selectedStylist?>">
                  
                  
        <!--
                  <div class="col-xs-2" style="line-height: 35px;">Previous: </div>
                  <div class="col-xs-7">
                <input class="datepicker form-control" name="date" placeholder="Pick a date"/>
                  </div>
                  <div class="col-xs-3">
                    <button class="btn btn-primary">Go</button>
                  </div>
        -->
                  
                  
                  
                </div>
            </form>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-lg-12" style="padding-left: 40px;"><h3>Date: <?=$curr_date?></h3></div>
          </div>
        </div>
        
        
        
        
        
        
        
        
        
<!-- STYLIST TABLE -->        
        <div class="box-body">
        <div class="table-responsive col-xs-12 col-lg-9">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Item</th>
            <th>Style</th>
            <th>Cost</th>
            <th>Discounted</th>
            <?php if((int)$_SESSION['user']->type === 1){ ?>
              <th>Action</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php if(count($activities)==0){?>
            <tr class="text-center">
              <td colspan="5">Select a stylist to view activities</td>
            </tr>
          <?php }else{ $count = 1; foreach ($activities as $activity) { ?>
           <tr>
             <td><?=$count?></td>
             <td><?=$activity->style?></td>
             <td><?=$activity->cost?></td>
             <td><?=$activity->discounted?"TRUE":"FALSE"?></td>
             <?php if((int)$_SESSION['user']->type === 1){ ?>
               <td>
                  <span onclick="deleteTreatment('<?=$activity->id?>')" style="text-decoration: underline; cursor: pointer;">Remove</span>
               </td>
              <?php } ?>
           </tr>
          <?php $count = $count + 1;$total = $total+(int)$activity->cost;} }?>
          <tr>
              <td colspan="3" class="text-right">Total</td>
              <td>£<?=number_format($total, 2)?></td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>    
    <!-- /.box-footer-->
    </div>
    <!-- /.box -->









    <div class="box">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12 col-lg-4 col-md-3">
              <h4><font color="red">1st </font> Select Style</h4>
              <div class="form-group">
                <label>Cut, Design And Texture</label>
                <select class="form-control cdnt" style="background:#ccffcc; color:black;" onchange="setActiveStyle(this.value, 'cdnt')" required>
                  <option selected>Select Style</option>
                  <?php foreach ($cdnt as $key) { ?>
                    <option value="<?=$key->id?>"><?=$key->style?></option>
                  <?php } ?>
              </select>
              </div>

              <div class="form-group">
                <label>Colouring</label>
                <select class="form-control colouring" style="background:#ccffcc; color:black;" onchange="setActiveStyle(this.value, 'colouring')" required>
                  <option selected>Select Style</option>
                  <?php foreach ($colouring as $key) { ?>
                    <option value="<?=$key->id?>"><?=$key->style?></option>
                  <?php } ?>
              </select>
              </div>


              <div class="form-group">
                <label>Foiling</label>
                <select class="form-control foiling" style="background:#ccffcc; color:black;" onchange="setActiveStyle(this.value, 'foiling')" required>
                  <option selected>Select Style</option>
                  <?php foreach ($foiling as $key) { ?>
                    <option value="<?=$key->id?>"><?=$key->style?></option>
                  <?php } ?>
              </select>
              </div>


              <div class="form-group">
                <label>Treatments</label>
                <select class="form-control treatments" style="background:#ccffcc; color:black;" onchange="setActiveStyle(this.value, 'treatments')" required>
                  <option selected>Select Style</option>
                  <?php foreach ($treatments as $key) { ?>
                    <option value="<?=$key->id?>"><?=$key->style?></option>
                  <?php } ?>
              </select>
              </div>


              <div class="form-group">
                <label>Extras</label>
                <select style="background:#ccffcc; color:black;" class="form-control extras" onchange="setActiveStyle(this.value, 'extras')" required>
                  <option selected>Select Style</option>
                  <?php foreach ($extras as $key) { ?>
                    <option value="<?=$key->id?>"><?=$key->style?></option>
                  <?php } ?>
              </select>
              </div>
              
              <h4 style="color: #fff;" class="hidden-xs">Select Style</h4>
                  <div class="form-group">
                    <label><font color="red">2nd</font> Now Select A Stylist Level</label>
                    <select style="background:#ffe6ff; color:black;" class="form-control" onchange="setCurrentCost(this.value)" name="stylist" required>
                      <option selected>Select Stylist Level</option>
                     <option value="0">Stylist</option>
                     <option value="1">Senior Stylist</option>
                     <option value="2">Senior Designer</option>
                  </select>
                  
                  <br>
                  <br>
                 <?php if((int)$_SESSION['user']->type === 1 ||(int)$_SESSION['user']->type === 2)
                  { ?>
                <label><font color="red">3rd</font> Select full price or discounted price</label>
                <div class="btn-group btn-group-justified hidden-md">
                <div class="btn-group">
                  <button onclick="fullPrice()" class="btn btn-primary"><span class="hidden-md">Add at </span>Full Price</button>
                 </div>
                  <div class="btn-group">
                  <button onclick="setDiscount()" class="btn btn-info"><span class="hidden-md">Add at </span>Discounted Price</button>
                  </div>
                  </div>
                  
                  <div class="visible-md visible-xs">
                      <button onclick="fullPrice()" class="btn btn-primary"><span class="hidden-md">Add at </span>Full Price</button>
                      <button onclick="setDiscount()" class="btn btn-info"><span class="hidden-md">Add at </span>Discounted Price</button>
                  </div>
                  <?php } ?>
                 
            
                  
                  
                  
                  
                  </div>
                  
                  
            </div>
            <div class="col-xs-12 col-md-7 col-lg-6">
               
               
                    <h3>Common Buttons</h3>
                    <div>
                    <div class="row">
                        <?php foreach($commons as $btn){?>
                            <div class="col-lg-3 col-xs-3 col-md-3" style="padding-left:5px !important; padding-right: 5px !important;">
                              <!-- small box -->
                              <div class="small-box bg-aqua">
                                <div class="inner">
                                  <p><?=substr($btn->style, 0, 15)?></p>
                                </div>
                                <div class="small-box-footer">
                                  <div class="btn-group btn-group-justified">
                                      <div class="btn-group">
                                      <button onclick="add('0', '<?=$btn->id?>','<?=$btn->category?>')" class="btn btn-flat bg-purple btn-xs">Sty</button>
                                      </div>
                                      <div class="btn-group">
                                      <button onclick="add('1', '<?=$btn->id?>','<?=$btn->category?>')" class="btn btn-flat bg-purple btn-xs">SrS</button>
                                      </div>
                                      <div class="btn-group">
                                      <button onclick="add('2', '<?=$btn->id?>','<?=$btn->category?>')" class="btn btn-flat bg-purple btn-xs">SrD</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php } ?>
                    </div>
                      <!-- /.row -->
                
<!-- ADD EDIT AND DELETE BUTTONS -->               
                <br>
                 <?php if((int)$_SESSION['user']->type === 1 ||(int)$_SESSION['user']->type === 2)
                  { ?>
                  
                    <div class="btn-group btn-group-justified">
                          <div class="btn-group">
                          <button onclick="createModal()" class="btn btn-success">Add New Style</button>
                          </div>
                          <div class="btn-group">
                          <button onclick="editStyle()" class="btn btn-warning">Edit Style and Cost</button>
                          </div>
                          <div class="btn-group">
                          <button onclick="deleteStyle()" class="btn btn-danger">Delete Old Style</button>
                          </div>
                    </div>
                    <?php } ?>
            </div>
                          <br>
                          Sty = Stylist<br>
                          SrS = Senior stylist<br>
                          SrD = Senior Designer<br>
                          <br>
                          *All data gets wiped at midnight
            
            
            
            
     
     
            
<!-- RIGHT HAND COLUMN WHICH DISPLAYS TOTALS DATA -->    


            </div>
            <div class="col-xs-12 col-lg-2 col-md-2 table-responsive" style="padding-left: 30px;">
                <?php if((int)$_SESSION['user']->type === 1 && $hidden === true)
                  { ?>
                <h3>Totals:</h3>
               <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Stylist</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($totals)==0){?>
                    <tr class="text-center">
                      <td colspan="5">No Treatments today yet.</td>
                    </tr>
                  <?php }else{ $count = 0; foreach ($total_stylists as $sty) { ?>
                   <tr>
                     <td><?=explode(" ", $sty)[0]?></td>  <!-- .' '.substr(explode(" ",$sty)[1], 0, 1).'.' -->
                     
                     <td>£<?=number_format($totals[$count], 2)?></td>
                   </tr>
                  <?php $count = $count + 1;} }?>
                </tbody>
              </table>
              <?php } ?>
            </div>
          </div>

         



        </div>    
      </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Dash]
  </footer>












   <!-- Modal -->
<div id="discountModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set a discount</h4>
      </div>
      <div class="modal-body">
        <form method="post">
           <div class="row">
             <div class="col-xs-12 col-lg-8">
              <div class="form-group">
                <label>Full Value</label>
                <input class="form-control fullValue" disabled required/>
              </div>


              <div class="form-group">
                <label>Discount Percent</label>
                <input class="form-control discPercent" required/>
              </div> 

              <div class="form-group">
                <button onclick="calculateDiscount()" type="button" class="btn btn-danger">Calculate</button>
              </div>  

             </div>

             <div class="col-xs-12 col-lg-4">
                <div class="form-group">
                  <label>Discount Total</label>
                  <input class="form-control discTotal" disabled required/>
                </div>
             </div>

           </div>
            <div class="modal-footer">
            <button type="button" onclick="discountClient()" class="btn btn-primary">Add at discounted price</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create a new Style</h4>
      </div>
      <div class="modal-body">
        <form action="<?=site_url()?>admin/add-new-style" method="post">
           <div class="row">
             <div class="col-xs-12 col-lg-12">
              <div class="form-group">
                <label>Style Category</label>
                <select class="form-control" name="category" required>
                  <option selected>Select Category</option>
                  <option value="cdnt">C, D and T</option>
                  <option value="colouring">Colouring</option>
                  <option value="foiling">Foiling</option>
                  <option value="treatments">Treatments</option>
                  <option value="extras">Extras</option>
              </select>
              </div>
               <div class="form-group">
                <label>Style Name</label>
                <input type="text" class="form-control" name="style" required/>
              </div>

               <div class="form-group">
                <label>Stylist Cost</label>
                <input type="number" step="0.01" name="stylist_cost" class="form-control" required>
              </div>

               <div class="form-group">
                <label>Senior Stylist Cost</label>
                <input type="number" step="0.01" name="senior_stylist_cost" class="form-control" required>
              </div>


               <div class="form-group">
                <label>Senior Designer Cost</label>
                <input type="number" step="0.01" name="senior_designer_cost" class="form-control" required>
              </div>


             </div>
           </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Now</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>




<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modify a Style</h4>
      </div>
      <div class="modal-body">
        <form action="<?=site_url()?>admin/modify-style" method="post">
           <div class="row">
             <div class="col-xs-12 col-lg-12">
                <input type="hidden" name="id" class="id">
               <div class="form-group">
                <label>Style Category</label>
                <select class="form-control category_edit" name="category" required>
                  <option selected>Select Category</option>
                  <option value="cdnt">C, D and T</option>
                  <option value="colouring">Colouring</option>
                  <option value="foiling">Foiling</option>
                  <option value="treatments">Treatments</option>
                  <option value="extras">Extras</option>
              </select>
              </div>
               <div class="form-group">
                <label>Style Name</label>
                <input type="text" class="form-control style_edit" name="style" required/>
              </div>

               <div class="form-group">
                <label>Stylist Cost</label>
                <input type="number" step="0.01" name="stylist_cost" class="form-control cost1_edit" required>
              </div>

               <div class="form-group">
                <label>Senior Stylist Cost</label>
                <input type="number" name="senior_stylist_cost" class="form-control cost2_edit" required>
              </div>


               <div class="form-group">
                <label>Senior Designer Cost</label>
                <input type="number" name="senior_designer_cost" class="form-control cost3_edit" required>
              </div>

             </div>
             
           </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Now</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
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
    var activeStyle = null;
    var activeStylist = null;
    var currentCost = null;
    $('.datepicker').datepicker();
    $('.datepicker').datepicker('update', '<?=$curr_date?>');

    function createModal() {
      $("#myModal").modal()
    }

    function setActiveStyle(e, category){
      if(e!=="Select Style"){
        $('.cdnt').val('Select Style');
        $('.colouring').val('Select Style');
        $('.foiling').val('Select Style');
        $('.treatments').val('Select Style');
        $('.extras').val('Select Style');
        var obj = null;
        if(category == 'cdnt'){
          obj = <?php echo json_encode($cdnt);?>;
        }
        if(category == 'colouring'){
          obj = <?php echo json_encode($colouring);?>;
        }
        if(category == 'foiling'){
          obj = <?php echo json_encode($foiling);?>;
        }
        if(category == 'treatments'){
          obj = <?php echo json_encode($treatments);?>;
        }
        if(category == 'extras'){
          obj = <?php echo json_encode($extras);?>;
        }
        var active = obj.find(ea=>ea.id==e);
        activeStyle = active;
        $('.'+category).val(active.id);
      }
    }

    function setActiveStylist(e){
      
        if(e!=="Select Stylist"){
          var obj = <?php echo json_encode($stylists);?>;
          var active = obj.find(ea=>ea.id==e||ea.id==$('.stylists').val());
          console.log(active);
          activeStylist = active;
        }
    }
    function add(level, style, cat){
        if(activeStylist !==undefined){
            setActiveStyle(style, cat);
            setCurrentCost(level);
            fullPrice();
          }else{
            alert("Select a stylist !!");
          }
    }
    function setCurrentCost(e){
      if(activeStyle==null){
        alert("You must first select a style")
      }else{
        if(e!=="Select Stylist"){
        //   var obj = <?php echo json_encode($stylists);?>;
        //   var active = {level: Number(e)};
        //   activeStylist = active;
          if(Number(e) == 0){
            $('.cost').val(activeStyle.stylist_cost);
            currentCost = activeStyle.stylist_cost;
          }

          if(Number(e) == 1){
            $('.cost').val(activeStyle.senior_stylist_cost);
            currentCost = activeStyle.senior_stylist_cost;
          }

          if(Number(e) == 2){
            $('.cost').val(activeStyle.senior_designer_cost);
            currentCost = activeStyle.senior_designer_cost;
          }
          
        }
      }
    }

    function fullPrice(){
      if(activeStyle!==null && activeStylist !==null && currentCost !== null){
        location.href = "<?=site_url()?>admin/saveTreatment/"+activeStyle.style+"/"+activeStylist.id+"/"+currentCost;
      }else{
        alert("Something isnt working here !!");
      }
    }

    function discountClient(){
      var perce = Number($('.discPercent').val());
      var rell = Number($('.fullValue').val());
      var total = Number($('.discTotal').val());
      if(perce>0 && rell > 0 && total>0){
        location.href = "<?=site_url()?>admin/saveTreatment/"+activeStyle.style+"/"+activeStylist.id+"/"+total+'/'+1;
      }else{
        alert("Calculate the discount first");
      }
    }

    function setDiscount(){
      if(activeStyle!==null && activeStylist !==null && currentCost !== null){
        if(activeStylist.level==0){
          $('.fullValue').val(activeStyle.stylist_cost);
        }else if(activeStylist.level == 1){
          $('.fullValue').val(activeStyle.senior_stylist_cost);
        }else if(activeStylist.level ==2){
          $('.fullValue').val(activeStyle.senior_designer_cost);
        }
        $('#discountModal').modal();
      }else{
        alert("You must select a style and a stylist first");
      }
    }

    function calculateDiscount(){

      var perce = Number($('.discPercent').val());
      var rell = Number($('.fullValue').val());
      if(perce>0){
        var tot = rell - ((perce / 100) * rell);
        $('.discTotal').val(tot);
      }else{
        alert("You must enter a discount percent");
      }
    }

    function editStyle(){
      if(activeStyle!==null){
        $('.category_edit').val(activeStyle.category);
        $('.style_edit').val(activeStyle.style);
        $('.cost1_edit').val(activeStyle.stylist_cost);
        $('.cost2_edit').val(activeStyle.senior_stylist_cost);
        $('.cost3_edit').val(activeStyle.senior_designer_cost);
        $('.id').val(activeStyle.id);

        $('#editModal').modal();
      }else{
        alert("You must select a style and a stylist first");
      }
    }

    function deleteStyle(){
      if(activeStyle!==null ){
        var r = confirm("Are you sure to delete "+activeStyle.style+"?");
        if (r == true) {
            location.href="<?=site_url()?>admin/deleteStyle/"+activeStyle.id;
        } else {
            return false;
        }
      }else{
        alert("You must select a style and a stylist first");
      }
    }

    function deleteTreatment(treat){
        var r = confirm("Are you sure to delete this?");
        if (r == true) {
            location.href="<?=site_url()?>admin/delete-treatment/"+treat+"?stylist=<?=$_GET['stylist']?>";
        } else {
            return false;
        }
      
    }
      
</script>
<script>
  $(document).ready(function(){
      if($('.stylists').val()!=="Select Stylist") {
        var obj = <?php echo json_encode($stylists);?>;
          var active = obj.find(ea=>ea.id==$('.stylists').val());
          activeStylist = active;
      console.log(activeStylist)   
      }
  })
</script>
<!--
<?php phpinfo(); ?>
-->
</body>
</html>
