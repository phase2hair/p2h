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
    
    
    if(strlen($client->old_styles)>0){
        $photos = explode('--',$client->old_styles);
    }else{
        $photos = [];
    }

?>


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


<?php $this->load->view('header')?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
        <small>Client Management</small>
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
          <h3 class="box-title">Modify Client</h3>
          
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
    
    <?php if(isset($_SESSION['error_message'])){ ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?=$_SESSION['error_message']?>
        </div>
    <?php }?>

     <?php if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Successfull!</h4>
            <?=$success?>
        </div>
    <?php }?>
     <?php if(isset($_SESSION['success_message'])){ ?>
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Successfull!</h4>
            <?=$_SESSION['success_message']?>
        </div>
    <?php }?>
    <form action="<?=site_url()?>admin/updateClient/<?=$client->Id?><?=isset($_GET['client'])?'/?client=true':''?>" method="post" style="margin-bottom: 50px">
        <div class="row">





<!-- FIRST NAME BOX -->  
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label class="col-sm-12 control-label">First Name </label>

                    <div class="col-sm-12">
                        <input style="background:#D6EAF8; color:black;" type="text" value="<?=$client->first_name?>" name="first_name" onkeyup="letOnly(this)" class="form-control" placeholder="First Name">
                    </div>
                </div>
 
 
 
 
<!-- LAST NAME BOX -->   
                <div class="form-group">
                    <label class="col-sm-12 control-label">Last Name </label>

                    <div class="col-sm-12">
                        <input style="background:#D6EAF8; color:black;" type="text" value="<?=$client->last_name?>" name="last_name" onkeyup="letOnly(this)" class="form-control" placeholder="Last Name">
                    </div>
                </div>





<!-- POST CODE -->  
                <div class="form-group">
                    <label class="col-sm-12 control-label">Postal Code </label>

                    <div class="col-sm-12">
                        <input style="background:#D6EAF8; color:black;" type="text" value="<?=$client->postal_code?>" name="postal_code" onkeyup="postOnly(this)" class="form-control" placeholder="Postal Code">
                    </div>
                </div>  






<!-- BIRTH MONTH BOX -->  
                <div class="form-group">
                    <label class="col-sm-12 control-label">Birth Month </label>

                    <div class="col-sm-12">
                    <select style="background:#D6EAF8; color:black;" class="form-control" value="<?=$client->birth_month?>" name="birth_month" placeholder="Birth Month">
                        
                        <?php for ($i=0; $i < 12; $i++) {  ?>
                            <option <?=$client->birth_month==$i?'selected':''?> value="<?=$i?>"><?=$months[$i]?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>






<!-- BIRTHDAY DAY BOX -->  
                <div class="form-group">
                    <label class="col-sm-12 control-label">Birth Day </label>

                    <div class="col-sm-12">
                    <select style="background:#D6EAF8; color:black;" class="form-control" value="<?=$client->birth_day?>" name="birth_day" placeholder="Day of Birth">
                        <?php for ($i=1; $i < 32; $i++) {  ?>
                            <option <?=$client->birth_day==$i?'selected':''?>><?=$i?></option>
                        <?php } ?>
                    </select>
                    </div>
                </div>





<!-- MOBILE ENUMBER BOX -->  
                <div class="form-group">
                    <label class="col-sm-12 control-label">Mobile Number </label>
                    <div class="col-sm-12">
                        <input style="background:#D6EAF8; color:black;" type="text" value="<?=$client->mobile_number?>" name="mobile_number" onkeyup="numOnly(this)" class="form-control" placeholder="Mobile Number">
                    </div>
                </div>





<!-- EMAIL ADDRESS BOX -->  
                <div class="form-group">
                    <label class="col-sm-12 control-label">Email </label>

                    <div class="col-sm-12">
                        <input style="background:#D6EAF8; color:black;" type="email" value="<?=$client->email_address?>" name="email_address" onkeyup="emailOnly(this)" class="form-control" placeholder="Email Address">
                    </div>
                </div>
            



<!-- LAST VISIT DATE -->               
                <div class="form-group">
                    <div class="col-sm-3">
                        <b>Last Colour or Skin Test</b><input type="text" value="<?=$client->last_visit?>" disabled class="form-control" placeholder="Last Visit">
                    </div>
                    
                    
                    <div class="col-sm-3">
                        <b>Previous Visit 1</b><input type="text" value="<?=$client->last_visit2?>" disabled class="form-control" placeholder="No 2nd Visit">
                    </div>
                    

                    <div class="col-sm-3">
                        <b>Previous Visit 2</b><input type="text" value="<?=$client->last_visit3?>" disabled class="form-control" placeholder="No 3rd Visit">
                    </div>

                    <!--
                    <div class="col-sm-3">
                        <b>Haircut Cost</b><input type="text" value=""<?=$client->hair_cost?>"" disabled class="form-control" placeholder="Disabled">
                    </div>
                    -->
                    
                    
                    
                    

                    
                    
                </div>








<!-- LINE ONE OF THE ALLERGY CODE -->


<div>

    
                        <div class="col-sm-4">
                            <b><br/>Any Reaction to Phase2Hair's Allergy/Skintest?</b><br>
                            <label for="">
                                <input type="radio" value="1" <?php echo set_checkbox('skin_test_allergy'); ?> name="skin_test_allergy" > Yes <br />
                            </label><br/>
                            <label for="">
                                <input type="radio" value="2" <?php echo set_checkbox('skin_test_allergy'); ?> name="skin_test_allergy" > No <br>
                            </label>
                            <?php
                            if ($client->skin_test_allergy == 1)
                            {
                            echo "<br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->skin_test_allergy == 2)
                            {
                            echo "<br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                        </div>
    
    
    
    
    
                        <div class="col-sm-4">
                            <br/>
                            <b>Any Reaction to your last colour treatment?</b><br>
                            <label for="">
                                <input type="radio" value="1" <?php echo set_checkbox('last_treatment_reaction'); ?> name="last_treatment_reaction" > Yes <br>
                            </label><br/>
                            <label class="">
                                <input type="radio" value="2" <?php echo set_checkbox('last_treatment_reaction'); ?> name="last_treatment_reaction" > No <br>
                            </label>
                            <?php
                            if ($client->last_treatment_reaction == 1)
                            {
                            echo "<br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->last_treatment_reaction == 2)
                            {
                            echo "<br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                        </div>





                        <div class="col-sm-4">
                            <br/>
                            <b>Ever had an allergic reation to any hair colour product?</b><br>
                            <label for="">
                                <input type="radio" value="1" <?php echo set_checkbox('prior_hair_color_reaction'); ?> name="prior_hair_color_reaction" > Yes <br>
                            </label><br/>
                            <label class="">
                                <input type="radio" value="2" <?php echo set_checkbox('prior_hair_color_reaction'); ?> name="prior_hair_color_reaction" > No <br>
                            </label>
                            <?php
                            if ($client->prior_hair_color_reaction == 1)
                            {
                            echo "<br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->prior_hair_color_reaction == 2)
                            {
                            echo "<br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                        </div>


<!-- LINE TWO OF THE ALLERGY CODE -->


                        <div class="col-sm-4">
                            <b>Taking any medication to treat allergies?</b><br>
                            <label class=""> 
                                <input type="radio" value="1" <?php echo set_checkbox('taking_medication'); ?> name="taking_medication" > Yes <br>
                            </label><br/>
                            <label class=""> 
                                <input type="radio" value="2" <?php echo set_checkbox('taking_medication'); ?> name="taking_medication" > No <br><br><br>
                            </label>
                            <?php
                            if ($client->taking_medication == 1)
                            {
                            echo "<br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->taking_medication == 2)
                            {
                            echo "<br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                        </div>




                        <div class="col-sm-4">
                            <b>Any Tattoo, Henna, Black Tattoo or any form of permanent makeup since last Phase 2 colour?</b><br>
                            <label class=""> 
                                <input type="radio" value="1" <?php echo set_checkbox('tattoo_reaction'); ?> name="tattoo_reaction"> Yes <br>
                            </label><br/>
                            <label> 
                                <input type="radio" value="2" <?php echo set_checkbox('tattoo_reaction'); ?> name="tattoo_reaction"> No <br>
                            </label>
                            <?php
                            if ($client->tattoo_reaction == 1)
                            {
                            echo "<br><br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->tattoo_reaction == 2)
                            {
                            echo "<br><br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                        </div>




                        <div class="col-sm-4">
                            <b>Do you have sensitive/damaged scalp? (e.g. suffer from Eczema or Psoriasis)</b><br>
                            <label class=""> 
                                 <input type="radio" value="1" <?php echo set_checkbox('damaged_scalp'); ?> name="damaged_scalp"> Yes <br>
                             </label><br/>
                             <label class="">
                                 <input type="radio" value="2" <?php echo set_checkbox('damaged_scalp'); ?> name="damaged_scalp"> No <br><br>
                            </label>
                            <?php
                            if ($client->damaged_scalp == 1)
                            {
                            echo "<br>Last Answer = <b><u><font color='red'>Yes</font></u></b>";
                            }
                            elseif ($client->damaged_scalp == 2)
                            {
                            echo "<br>Last Answer = <b><u>No</u></b>";
                            }
                            else
                            {
                            echo "<br><font color='red'>Not previously answered</font>";
                            }
                            ?>
                            <hr>
                            
                        </div>


<!-- LINE THREE OF THE ALLERGY CODE -->

<div class="col-sm-4">
<a>By initalling in the box, you are consenting that you are happy to continue with treatments from Phase2Hair and that you accept you have no allergies/reactions detailed in the above questions.</a>
</div>                   
                        

                        <div class="col-sm-4">
        
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label"> <font color="blue">Initial to Authorise Treatment</font></label>
                                <div class="col-lg-7 col-sm-7">
                                    <input type="text" value="<?=$client->signature?>" name="signature" class="form-control col-sm-3" onkeyup="this.value = this.value.toUpperCase();">
                                </div>
                        </div>
                        </div>
                        
                        
                        <div class="col-sm-4">

                        <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label"> <font color="blue">Todays Date</font></label>
                                <div class="col-lg-7 col-sm-7">
                                    <input type="text" value="<?php echo date('Y-m-d') ?>" name="skin_test_date" class="form-control col-sm-3" readonly>
                                </div>
                        </div>
                        </div>
                        
                        
                        <div class="col-sm-4">
                            <h3><font color="red">&nbsp;ONCE COMPLETED<br>PLEASE PRESS SAVE</font></H>
                            </div>
                        

</div>

</div>

 
            <div class="col-xs-12 col-md-6">
                
                


 
 
 
            
 
 
<!-- STYLIST DROPDOWN -->   
            <?php if(!isset($_GET['client'])){ ?>
            
            <div class="form-group col-sm-8">
                <label class="control-label">Stylist </label>
                <select style="background:#FEEFEE; color:black;" class="form-control" name="stylist" placeholder="Stylist">
                    <option <?php echo  set_select('stylist', '', ''==$client->stylist); ?>>Select a stylist</option>
                    <?php foreach ($stylists as $key) {  ?>
                    <option value="<?=$key->id?>" <?php echo  set_select('stylist', $key->id, $key->id==$client->stylist); ?>><?=$key->first_name.' '.$key->last_name?></option>
                    <?php } ?>
                </select>
                
                
                
                
                
                
                
                
<!-- TREATMENTS -->                   
                 <label>Treatments <font color="red">ADD TO THE BOTTOM ONLY</font></label>
                <div>
                    <textarea style="background:#FEEFEE; color:black;" name="requirement" id="" rows="14" class="form-control"><?=$client->requirement?></textarea>
                </div>
            </div>
            
                <div class="form-group col-sm-4">
                
                
                
                



<!-- PREVIOUS PHOTO DROPDOWN -->
                <div class="form-group">
                    <label>Previous Photos</label>
                    <div>
                        <select style="background:#D6EAF8; color:black;" class="form-control images" placeholder="Previous Photos">
                            
                            <?php if(empty($photos)){
                                echo "<option>No Previous Photos</option>";
                            }
                            foreach($photos as $photo){ ?>
                                <option value="<?=$photo?>"><?=$photo?></option>
                            <?php } ?>
                        </select>
            
                    </div>
                </div>
                
 
 
 
<!-- PHOTO BOX -->               
                 <div class="form-group">
                    <label>Photo</label>
                    <div>
                        <img id="imgs" class="img-thumbnail" style="height: 220px; width: 100%;" onclick="previewImage()">
                    </div>
                    
                    
                    
                    
<!-- UPLOAD PHOTO BUTTON -->
                    <button onclick="uploadOpen()" type="button" class="btn btn-success btn-block" style="margin-top: 20px;"><i class="fas fa-camera fa-lg"></i> Take a photo with the iPad</button>
                </div>
                </div>
            <div>
            </div>
                        






<!-- NO CHANGES CHECKBOX -->                 
                                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="checkbox" value="No_Change" name="last_change"><b><font color="blue">&nbsp No changes we're made to the clients treatment</b></font><br>
                                </div>
                </div>
                
                
                
                




<!-- LAST EDITED BOX -->                
                <div class="form-group">
                    <label class="col-sm-12 control-label">Last Edited</label>
                    <div class="col-sm-4">
                        <input type="disabled" value="<?=$client->last_edited?>" disabled class="form-control" placeholder="Requirements Box Last Edited on DATESTAMP">
                    </div>
                </div>
                
                
                
                
                
                
                

                
                
                
 <!-- CHECKOUT ENABLER CHECKBOX -->                 
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="checkbox" value="1" name="allow_checkout"> <font color="red"><b>&nbsp REQUIRED TO ENABLE CLIENT CHECKOUT</b></font><br>You are confirming that <b>YOU</b> have updated the <b>Treatments box</b> or that <b>no changes</b> were made on this visit
                    </div>
                </div>                

                <!-- onclick="alert('If the customer is willing, please take a photo')" -->
                
                
                
                
                <?php } ?>
                
            </div>
        
            
            
        </div>
        
        <div class="form-group text-center">
            <button class="btn btn-success" style="margin-top: 20px;"><i class="far fa-save fa-lg"></i> &nbsp Save Changes</button>
            
            
            
         
             <?php if(!isset($_GET['client'])){ ?>
          <a  href="<?=site_url()?>admin/dashboard" style="margin-top: 20px;" class="btn btn-danger btn-md"><i class="fa fa-lg fa-backward"></i> &nbsp Previous Screen</a>  
          <?php }else{ ?>
          <a  href="<?=site_url()?>home" style="margin-top: 20px;" class="btn btn-danger btn-md"><i class="fa fa-lg fa-backward"></i> &nbsp Previous Screen</a>  
         <?php } ?>
          
          
            <?php if(isset($_GET['client'])){ ?>
          <a href="<?=site_url()?>home/check_in/<?=$client->Id?>" style="margin-top: 20px;" class="btn btn-md btn-primary"><i class="far fa-calendar-check fa-lg"></i>&nbsp Check in Here</a>
          <?php }?>
            
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
  Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [Modify]
  </footer>
  
  
  <div id="newFileModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload a new Photo</h4>
      </div>
      <div class="modal-body">
            <form action="<?=site_url()?>admin/upload_style_photo/<?=$client->Id?>" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <label class="fileName text-center"></label>
                    <img src="<?=assets_url()?>img/camera-way.png" class="user-image" alt="Camera Orientation"><br><br>
                  <button onclick="openDialog()" type="button" class="btn btn-block btn-default">1) TAKE A PHOTO</button>
                  <input type="file" ref="fileInput" class="hiddenfile" name="file" />
                  <button type="submit" style="margin-top: 10px" class="btn btn-sm btn-primary btn-block">2) UPLOAD THE PHOTO</button>
                </div>
            </form>
      </div>

  </div>
</div>

</div>



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
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=assets_url()?>js/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=assets_url()?>js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- AdminLTE App -->
<script src="<?=assets_url()?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?=assets_url()?>js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=assets_url()?>js/demo.js"></script>
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5({
      toolbar: {
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": false, //Button to insert a link. Default true
        "image": false, //Button to insert an image. Default true,
        "color": false, //Button to change color of font  
        "blockquote": true, //Blockquote  
      }
    });
    $('.hiddenFile').click(function(evt) {
        $(this).val("");
    });
    $('.hiddenFile').on('change',function(evt) {
        $('.fileName').text(this.files[0].name)
    });
});

var selected = '';

$(document).ready(function(){
    selected = '<?=end($photos)?>';
    $('#imgs').attr('src', '<?=site_url()?>uploads/<?=end($photos)?>')
    $('.images').on('change', function(){
    	var demovalue = $(this).val(); 
    	selected = demovalue;
        $('#imgs').attr('src', '<?=site_url()?>uploads/'+demovalue)
    });
});

function uploadOpen(){      
    $("#newFileModal").modal()
}

function previewImage(){
    $('#image-preview').attr('src', '<?=site_url()?>uploads/'+selected);
    $("#viewFileModal").modal()
}

function openDialog(){      
    $(".hiddenFile").trigger('click');
}
</script>
</body>
</html>

<style>
.flash-button{
	background:blue;
	padding:5px 10px;
	color:#fff;
	border:none;
	border-radius:5px;
	
	animation-name: flash;
	animation-duration: 1s;
	animation-timing-function: linear;
	animation-iteration-count: infinite;

	//Firefox 1+
	-webkit-animation-name: flash;
	-webkit-animation-duration: 1s;
	-webkit-animation-timing-function: linear;
	-webkit-animation-iteration-count: infinite;

	//Safari 3-4
	-moz-animation-name: flash;
	-moz-animation-duration: 1s;
	-moz-animation-timing-function: linear;
	-moz-animation-iteration-count: infinite;
}

@keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}

//Firefox 1+
@-webkit-keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}

//Safari 3-4
@-moz-keyframes flash {  
    0% { opacity: 1.0; }
    50% { opacity: 0.5; }
    100% { opacity: 1.0; }
}    
    
    
input[type=checkbox] {
  transform: scale(1.3);
}

.hiddenfile {
 width: 0px;
 height: 0px;
 overflow: hidden;
}
</style>
