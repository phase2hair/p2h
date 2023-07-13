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
    
    $days = [
        31,29,31,30,31,30,31,31,30,31,30,31
    ]

?>

<?php 
$bg1=https://phase2hair.azurewebsites.net/assets/img/p2h-mailinglist-bg.jpg';

?>



<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register New Client</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://phase2hair.azurewebsites.net/assets/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<https://phase2hair.azurewebsites.net/assets/css/AdminLTE.min.css">
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
        cursor: pointer;
        /* margin: 1px; */
    }

    
  </style>
  
  <script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}
</script>

<script>
function myFunction() {
  alert("If you have filled this page out previously, please let the receptionist or stylist aware that you are already registered in the system");
}
</script>
  
  
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
  
</head>
<body class="hold-transition lockscreen">
<!--    <body onload="myFunction()"> -->
<!-- Automatic element centering -->
<div class="">
<div class="text-center" style="background-image: url(<?=$bg1?>); color: #fff; background-repeat: no-repeat;background-size: cover;background-position: center; height: 300px;">
    <div class="lockscreen-logo" >
        <a href="<?=site_url()?>" ><b><font color="white">Salon</font></b></a>
    </div>
    <h3 style="margin-top: 200px;" align="right"><a class="btn btn-primary fa fa-home" href="<?=site_url()?>home"> </a> &nbsp</h3>
</div>






<div style="height: 400px; overflow-y: scroll; padding-top: 10px;">
<?php if(isset($error)){ ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert !</h4>
            <?=$error?>
        </div>
    <?php }?>

     <?php if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Successfull !</h4>
            <?=$success?>
        </div>
    <?php }?>
    
 <h3 align="center">If you have filled out this screen before, please let the receptionist or stylist aware that you are already registered in this system.</h3>
    
    
    <form action="<?=site_url()?>home/saveClient" method="post" style="margin-bottom: 50px">
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"><i class="far fa-id-card fa-lg"></i> First Name</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" value="<?php echo set_value('first_name'); ?>" name="first_name" class="form-control" onkeyup="letOnly(this)" placeholder="First Name">
                <br>
            </div>
        </div>
        
        
        
        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"><i class="far fa-id-card fa-lg"></i> Last Name  </label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" value="<?php echo set_value('last_name'); ?>" name="last_name" onkeyup="letOnly(this)" class="form-control" placeholder="Last Name">
                <br>
            </div>
        </div>
        
         
        
        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"><i class="fas fa-map-marked-alt fa-lg"></i> Postal Code ( ZZZZ XXX or ZZZ XXX )</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" value="<?php echo set_value('postal_code'); ?>" name="postal_code" style="text-transform:uppercase" onkeyup="postOnly(this)" class="form-control" placeholder="Postal Code ( ZZZZ XXX or ZZZ XXX )">
                <br>
            </div>
        </div>  
        
        
        
        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"> <i class='fa fa-calendar fa-lg'></i> Birth Month</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
            <select class="form-control months" name="birth_month" onchange="changeDays(this.value)" placeholder="Birth Month">
                <option value="">Select</option>
                
            <?php foreach ($months as $key => $value) {  ?>
                    <option value="<?=$key?>" <?php echo  set_select('birth_month', $key, (isset($data['birth_month'])&&$data['birth_month']==$key)); ?>><?=$value?></option>
                <?php } ?>
            </select>
            <br>
            </div>
        </div>
        
        
        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"> <i class='fa fa-calendar fa-lg'></i> Birth Day </label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="hidden" id="day" value="<?php echo set_value('birth_day'); ?>"/>
            <select class="form-control" value="<?php echo set_value('birth_day'); ?>" name="birth_day" id="days" placeholder="Day of Birth">
                <option value="">Select</option>
            </select>
            <br>
            </div>
        </div>
        
        
        
        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"><i class='fa fa-phone fa-lg'></i> Mobile Number - 07xxx xxxxxx</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" value="<?php echo set_value('mobile_number'); ?>" onkeyup="numOnly(this)" name="mobile_number" class="form-control" placeholder="07XXX XXXXXX">
                <br>
            </div>
        </div>
        

        
        
        <div class="form-group">
            <label class="col-sm-12 col-md-12 col-lg-12 control-label"><i class="far fa-envelope fa-lg"></i> Email</label>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="email" value="<?php echo set_value('email_address'); ?>" name="email_address" onkeyup="emailOnly(this)" class="form-control" placeholder="Email Address" >
                <br>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        

            <div class="form-group">
            <label class="col-sm-12 col-lg-12 control-label"><i class="far fa-calendar fa-lg"></i> Date of Alergy/Skin Test</label>
            <div class="col-sm-12 col-lg-12">
                <input type="date" value="<?php echo date('Y-m-d') ?>" name="skin_test_date" class="form-control col-lg-3 col-sm-12" readonly>
            </div>

        
        
        
        
<!--        
        <div class="form-group">
     <label class="col-sm-12 col-lg-12 control-label">Any Reaction to Allergy/Skintest?</label>
     <div class="col-lg-12">
             <label for="">
               <input type="radio" value="1" <?php echo set_checkbox('skin_test_allergy'); ?> name="skin_test_allergy" > Yes <br />
             </label><br/>

             <label for="">
               <input type="radio" value="0" <?php echo set_checkbox('skin_test_allergy'); ?> name="skin_test_allergy" > No <br>
             </label><br/>

     </div>
 </div>
 -->
 
     
<!--   
        <div class="form-group">
            <label class="col-sm-12 col-lg-12 control-label"><i class="far fa-calendar fa-lg"></i> Date of last PHASE 2 colour treatment</label><br/>
            <div class="col-lg-12">
                <input type="date" value="<?php echo set_value('last_treatment_date'); ?>" name="last_treatment_date" class="form-control col-lg-3 col-sm-12">
            </div>
        </div>
-->        
        
        

<!--        
        <div class="form-group">
          <label class="col-lg-12" for="">Any Reaction to last colour treatment?</label>
          <div class="col-lg-12">
              <label class="">
                  <input type="radio" value="1" <?php echo set_checkbox('last_treatment_reaction'); ?> name="last_treatment_reaction" > Yes <br>
              </label><br/>
              <label class="">
                  <input type="radio" value="0" <?php echo set_checkbox('last_treatment_reaction'); ?> name="last_treatment_reaction" > No <br>
              </label><br/>
          </div>
      </div>
-->      
      
      
<!--      
        <div class="form-group">
            <label class="col-lg-12">Ever had an allergic reation to any hair colour product?</label>
            <div class="col-lg-12">
                <label class="">
                    <input type="radio" value="1" <?php echo set_checkbox('prior_hair_color_reaction'); ?> name="prior_hair_color_reaction" >Yes <br>
                </label><br/>
                <label class="">
                    <input type="radio" value="0" <?php echo set_checkbox('prior_hair_color_reaction'); ?> name="prior_hair_color_reaction" > No <br>
                </label><br/>
            </div>
        </div>
-->        
        

<!--        
        <div class="form-group">
            <label class="col-lg-12">Taking any medication to treate allergies?</label>
            <div class="col-lg-12">
                <label class=""> 
                    <input type="radio" value="1" <?php echo set_checkbox('taking_medication'); ?> name="taking_medication" > Yes <br>
                </label><br/>
                <label class=""> 
                    <input type="radio" value="0" <?php echo set_checkbox('taking_medication'); ?> name="taking_medication" > No <br>
                </label><br/>
            </div>
        </div>
-->




<!--
        <div class="form-group">
            <label for="" class="col-lg-12">Any Reaction to Tattoo, Henna, Black Tattoo or any form of permanent makeup since last professional colour?</label>
            <div class="col-lg-12">
                <label> 
                    <input type="radio" value="1" <?php echo set_checkbox('tattoo_reaction'); ?> name="tattoo_reaction"> Yes <br>
                </label><br/>
                <label> 
                    <input type="radio" value="1" <?php echo set_checkbox('tattoo_reaction'); ?> name="tattoo_reaction">No <br>
                </label><br/>
            </div>
        </div>
-->        
        
        
        
<!--            
            <div class="form-group">
                 <label class="col-lg-12" for="">Do you have sensitive/damaged scalp? (e.g. suffer from eczema or psoriasis)</label>
                <div class="col-lg-12">
                    <label class="">
                         <input type="radio" value="1" <?php echo set_checkbox('damaged_scalp'); ?> name="damaged_scalp"> Yes <br>
                     </label><br/>
                     <label class="">
                         <input type="radio" value="0" <?php echo set_checkbox('damaged_scalp'); ?> name="damaged_scalp"> No <br>
                     </label><br/>
                </div>
            </div>
-->



<!--            
<div style="padding-top: 50px;">
    <br><br><br><br><br><br>
            <h4>I consent for you to proceed with my colour treatment</h4>
        <hr/>
</div>
        
        <div class="form-group">
            
                <label class="col-lg-12 col-sm-12 control-label"> Initials/Signature</label>
            <div class="col-lg-3 col-sm-12">
                <input type="text" value="<?php echo set_value('signature'); ?>" name="signature" class="form-control col-sm-3">
            </div>
        </div>
-->        
        
        
        
        
        </div>
        
        
        
        <div class="form-group text-center">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>






<br>
<p align=center>Under the GDPR We only collect certain data about you, this data will <u>not</u> be distributed to any other parties and will be used to monitor style information such as dyes used, bleaching pecentages, previous styles, etc. If you do not consent to this, do not submit this form and speak to the receptionist about this.</p>
  
 <!--
 <div class="lockscreen-footer text-center navbar-fixed-bottom">
 Copyright &copy; The EasyPC Company <b>Lee Fowler</b> <?=Date('Y')?> [New_Client]
  </div>
-->
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
        
        location.href = "<?=site_url()?>home/getUsers/?month="+month+'&&day='+day;
     }
     
     function changeDays(month){
         var days = [31,29,31,30,31,30,31,31,30,31,30,31];
         var newSel = document.getElementById("days");
         if (month.length == 0) document.getElementById("days").innerHTML = "<option>Select</option>";
         for (var i=1; len=days[Number(month)]+1, i<len; i++) {
                    opt = document.createElement("option");
                    opt.value = i;
                    opt.text = i;
                    newSel.appendChild(opt);
              }
     }
     
     $( document ).ready(()=>{
         var days = [31,29,31,30,31,30,31,31,30,31,30,31];
         var month = $('.months').val();
         var newSel = document.getElementById("days");
         var sl = $('#day').val();
         if (month.length == 0) document.getElementById("days").innerHTML = "<option>Select</option>";
         for (var i=1; len=days[Number(month)]+1, i<len; i++) {
                    $('#days').append($("<option></option>").attr("value",i).text(i));
              }
        $('#days').val(sl);
        
        
     })

     
</script>
</body>
</html>
