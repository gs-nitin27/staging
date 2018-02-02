<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
<style type="text/css">
    /* USER PROFILE PAGE */
 .card {
    margin-top: 20px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;

}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-name {
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
    top :140px;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>


<script>
$(document).ready(function(){
 
$('#module').click(function(){
$("#imagelodar").show();

var data = {

    "id"                       : $("#uid").val(),
    "event"                    : $("#EVENT").val(),
    "tournament"               : $("#TOURNAMENT").val(),
    "job"                      : $("#JOB").val(), 
    "resources"                : $("#RESOURCES").val(), 
    "content"                  : $("#CONTENT").val(),
    "performace"               : $("#PERFORMANCE").val(),
    "usermenu"                 : $("#USER_ROLE_MANAGEMENT").val()
};
console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveuserModule'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    // alert(result);
      if(result == '1')
      {
          // $("#imagelodar").hide();
        $.confirm({
        title: 'Congratulations!',
        content: 'Module is Created.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();
                 //window.location.href = url+"/forms/getContent?Content";
                }
            },
            close: function () {
              $("#imagelodar").hide();
             //window.location.href = url+"/forms/getContent?Content";
            }
        }
    });
      }
      else
      {
             // $("#imagelodar").hide();
             $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });
      }
    }
});   
});});
</script>  

<?php  


      $profile = $this->register->profile($id); 


     // print_r($profile[0]['prof_id']);die;

     foreach ($profile as $value) 
      {

              $event      = $this->register->event($value['userid']);
              $tournament = $this->register->tournament($value['userid']);
              $job        = $this->register->job($value['userid']);
              $resources  = $this->register->resources($value['userid']);
              $Content    = $this->register->content($value['userid']); 
             
              {
      ?>
       <input type="hidden" class="form-control" name="event"  id="event_graph" value="<?php echo $event; ?>">
       <input type="hidden" class="form-control" name="tournament"  id="tournament_graph" value="<?php echo $tournament; ?>">
       <input type="hidden" class="form-control" name="job"  id="job_graph" value="<?php echo $job; ?>">
       <input type="hidden" class="form-control" name="resources"  id="resources_graph" value="<?php echo $resources; ?>">
       <input type="hidden" class="form-control" name="Content"  id="Content_graph" value="<?php echo $Content; ?>">
      <?php }?>
  <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
<div class="wrapper">
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-11 col-sm-11">
    <div class="card hovercard">
        <div class="card-background">

             
          <!--   <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/"> -->
            <!-- http://lorempixel.com/850/280/people/9/ -->
             <img class="card-bkimg" alt="" src="<?php echo base_url('img/background.jpg');?>" alt="User profile picture">


        </div>
        <div class="useravatar">

            <?php 
                   if($value['user_image']) {
             ?>
           <img class="card-bkimg" alt="" src="<?php echo $value['user_image'];?>" alt="User profile picture">
             <?php } else { if($value['gender'] == 'Female') { ?>
                <img class="card-bkimg" alt="" src="<?php echo base_url('img/female.jpg');?>" alt="User profile picture">
           <?php } else { ?>
          <img class="card-bkimg" alt="" src="<?php echo base_url('img/user.jpg');?>" alt="User profile picture">
            <?php } } ?>


        </div>
         
   

        <div class="card-info"><span class="card-title"><?php echo $value['name'];?></span></div>
      <?php if($value['prof_name']) {?>
      
         <div class="card-name" ><span ><b><?php echo $value['prof_name'];?></b></span></div>
         <?php }?>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Activity</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <div class="hidden-xs">Basic Details</div>
            </button>
        </div>
<!--         <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Rating</div>
            </button>
        </div> -->
        <!-- <div class="btn-group" role="group">
            <button type="button" id="basic" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div> -->
    </div>


      <div class="tab-content">
       <div class="tab-pane fade in active" id="tab1">
           
           <div class="row">
          <!--  <div class="col-md-6">
         
           <div class="chart">
             <canvas id="areaChart" style="height:250px"></canvas>
          </div>
          <div  class="box box-primary" style="margin-top:-45%;">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            </div>

            </div> -->
             <div class="col-md-6">
         <div class="box box-primary " style="margin-top:5%;">
            <div class="box-header with-border">
              <h3 class="box-title">Activity</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Tournament</li>
                    <li><i class="fa fa-circle-o text-green"></i> JOB</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Content</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Event</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Resources</li>
                   <!--  <li><i class="fa fa-circle-o text-gray"></i> Navigator</li> -->
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Cricket
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">Football <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">running
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div> -->
            <!-- /.footer -->
          </div>
          </div>



            <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-body box-profile">
          

             
              <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['userid']; ?>">

              <input type="hidden" class="form-control" name="access_module"  id="access_module_id" value="<?php echo $value['access_module']; ?>">

              <ul class="list-group list-group-unbordered">
              <?php 
               $module_list = $value['access_module'];


               $module_no = explode(',', $module_list); 
              {     
                 $usertype=$value['userType']; 
                  if($usertype==101 || $usertype==102 )
                   {
                    ?>
              <li class="list-group-item">
              <label for="USER_ROLE_MANAGEMENT" class="btn btn-danger">USER ROLE MANAGEMENT<input type="checkbox" id="USER_ROLE_MANAGEMENT" class="badgebox"><span class="badge">&check;</span></label>
              
               


                 <label for="PERFORMANCE" class="btn btn-warning">PERFORMANCE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="PERFORMANCE" class="badgebox"><span class="badge">&check;</span></label>



                </li>
           <?php } ?>
              <li class="list-group-item">
                 <label for="JOB" class="btn btn-info">job &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="JOB" class="badgebox"><span class="badge" >&check;</span></label>
                
                <label for="EVENT" class="btn btn-info">Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="EVENT" class="badgebox"><span class="badge">&check;</span></label>
                 <!--  <b>Followers</b> -->  <!-- <a class="pull-right">1,322</a> -->
                </li>
                <li class="list-group-item">

                 <label for="CONTENT" class="btn btn-warning">Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="CONTENT" class="badgebox"><span class="badge">&check;</span></label>

                
                 <label for="RESOURCES" class="btn btn-primary">Resources &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="RESOURCES" class="badgebox"><span class="badge">&check;</span></label>
                 <!--  <b>Friends</b> <a class="pull-right">13,287</a> -->
                </li>
                <li class="list-group-item">
                <label for="TOURNAMENT" class="btn btn-primary">Tournament &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="TOURNAMENT" class="badgebox"  ><span class="badge">&check;</span></label>
                 <!--  <b>Following</b> <a class="pull-right">543</a> -->
                </li>
              <!-- </ul> -->
               <li class="list-group-item">
              <button type="button" class="btn btn-success btn-block" id="module"><b>Save Module</b></button></li>
              <li class="list-group-item">
              <?php $list=array('a' => 0,
                                'b' => 1,
                                'c' => 2,
                                'd' => 3,
                                'e' => 4,
                                'f' => 5,
                                'g' => 6,
                                'h' => 7,
                                'i' => 8,
                                'j' => 9);
                                 $num=$value['userid']; //your value
                                 $temp='';
                                 $arr_num=str_split ($num);
                                foreach($arr_num as $data)
                                {
                                $temp.=array_search($data,$list);
                                }
                                $num=$temp;
                                {  ?>
                    <input type="hidden" class="form-control" name="string_userid"  id="string_userid" value="<?php echo $num; ?>">
                    <?php }?>
                  <?php $email = $value['email'];
                  { ?>
              <button class="btn btn-success btn-block" onclick="myfunction('<?php echo $email;?>');"><?php echo "Password Reset";?></button>
               <?php } ?>
                </li>
                </ul>
            </div>
          </div>
          <?php } ?>

</div>
     
            </div>

        </div>
        <div class="tab-pane fade in" id="tab2">




<div class="w3-light-grey">
<div class="w3-content w3-margin-top" style="max-width:1400px;">
<div class="w3-row-padding">
  

    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
          <br>
              <strong><i class="fa fa-venus-double margin-r-5"></i><b> Gender : </b></strong>
              
                <?php echo $value['gender'];?>
              </p>
              <hr>
              <strong>
              <i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $value['address1'];?></p>

              <p class="text-muted"><?php echo $value['address2'];?></p>
               <p class="text-muted"><?php echo $value['location'];?></p>
              <p class="text-muted"><?php echo $value['address3'];?></p>
              <hr>
            <strong><i class="fa fa-mobile margin-r-5"></i>Contact No :</strong>
            <?php echo $value['contact_no'];?></p>
            <hr>

          <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport :</strong>
          
                <?php echo $value['sport'];?>
            </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB : </strong>
            <?php echo $value['dob'];?></p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills :</strong>
            <p>
            <span class="label label-danger"><?php echo $value['prof_language'];?></span>
            <span class="label label-success"><?php echo $value['other_skill_name'];?></span>
            <span class="label label-info"><?php echo $value['other_skill_detail'];?></span>
               <!--  <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
            </p>
            <hr>
            <strong><i class="fa fa-envelope margin-r-5"></i>Email : </strong>
            <?php echo $value['email'];?></p>

            <button style="margin-left: 71%;" id="ebutton"><i class="fa fa-pencil margin-r-5"></i></button>
            

              <script>
              $(document).ready(function(){
                  // alert("sdg");
                 $("#activity").addClass('active');
                $("#newemail").hide();
                $("#ebutton").click(function(){
                $("#newemail").toggle();
                });
              });
               </script>
               <div id="newemail">
                <div class="form-group">
                <input type="text" class="form-control" id="updateemail" placeholder="Enter Email">
                 <input type="hidden" class="form-control" name="UserId"  id="euid" value="<?php echo $value['userid']; ?>">
                </div><div class="form-group">
                <input type="button" class="btn btn btn-primary" id="emailsave" onclick="" value="Update" name="Update">
                </div >
              </div>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p><?php echo $value['about_me'];?></p>
        </div>
      </div><br>
    <!-- End Left Column -->
    </div>
    <!-- Right Column -->
    <div class="w3-twothird">

<?php 
$prof_data = $this->register->prof_data($id);
    //  print_r($prof_data);
//die;
if($prof_data)
{
  /// die;
$profiledata = json_decode($prof_data['user_detail']);
 
if($value['userType'] == 103)
{

 ?>
  <div class="w3-container w3-card w3-white w3-margin-bottom">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2>
<?php 
    foreach ($profiledata->HeaderDetails as $key => $value) 
    {
    ?>
    <h5 class="w3-opacity"><b><?php echo ucwords($key); ?> : </b><?php echo $value; ?></h5>
    <?php     
    }
?>
</div>
<?php 
    foreach($profiledata->Education as $key => $value) 
    {
       
   ?>

  
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo ucwords($key); ?></h2>
 <?php
// print_r($value);
      foreach ($value as $key1 => $value1)

      { ?>

      <div class="w3-container">
      <h5 class="w3-opacity"><b>Organisation :</b> <?php echo ucfirst($value1->organisation); ?></p>
      <h5 class="w3-opacity"><b>Degree :</b> <?php echo ucwords($value1->degree); ?></p>
      <h5 class="w3-opacity"><b>Stream :</b> <?php echo $value1->stream; ?></p>   
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->courseDuration ;?></h6>
  
      <hr>
      </div>

        <?php 
        }
      ?>
       </div>
       <br>
      <?php
      }

      foreach ($profiledata->Experience as $key => $value) 
      {
      ?> 
      
      <div class="w3-container w3-card w3-white w3-margin-bottom" id="exphide">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo ucwords($key);?></h2>

      <?php
        foreach ($value as $key1 => $value1) {
      if($key == 'experienceAsPlayer')
      {  

        if($profile[0]['prof_id'] == 2 || $profile[0]['prof_id'] == 8 ){
       ?>
      
        
    <div class="w3-container">
    <h5 class="w3-opacity"><b>Organisation :</b> <?php echo $value1->organisationName ;?></p>
    <h5 class="w3-opacity"><b>Designation :</b> <?php echo $value1->designation ;?></p> 
    <h5 class="w3-opacity"><b>Description :</b> <?php echo $value1->description ;?></p> 
    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $value1->dateFrom; ?> -  <span class="w3-tag w3-teal w3-round"><?php echo $value1->dateTo; ?></span></h6>
    <hr>
    </div>
    <?php } else{
    ?>
     <script type="text/javascript">
       
       $("#exphide").hide();
     </script>
  

 <?php }  } else { ?>  
 
    <div class="w3-container">
    <h5 class="w3-opacity"><b> Organisation:</b> <?php echo $value1->organisationName ;?></p>
    <h5 class="w3-opacity"><b>Designation :</b> <?php echo $value1->designation ;?></p> 
    <h5 class="w3-opacity"><b>Description :</b> <?php echo $value1->description ;?></p> 
    <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $value1->dateFrom; ?> -  <span class="w3-tag w3-teal w3-round"><?php echo $value1->dateTo; ?></span></h6>
    <hr>
    </div>

<?php 
   } }
  ?>
  </div>
  <?php 
}
}
else if($value['userType'] == 104)
{
if($profiledata)
{ ?>
<div class="w3-container w3-card w3-white">
<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Header Details</h2>
<div class="w3-container">
 <?php 
foreach ($profiledata->Header as $key => $value) 
{
?>
<h5 class="w3-opacity"><b><?php echo ucwords($key); ?> : </b></h5><p><?php echo $value; ?></p>
<?php } ?>
 <hr>
</div>
</div>
<br>
<?php 
foreach ($profiledata->Achivement as $key => $value) 
  {
 if($key =='awards'){
?>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Best Awards</h2>
 <?php
foreach ($value as $key1 => $value1) 
  { 
  ?>

      <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Award :</b> <?php echo $value1->nameOfAward; ?></p>
      <h5 class="w3-opacity"><b>Description : </b><?php echo $value1->description; ?></p>
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->date ;?></h6>
      <hr>
      </div> 
        <?php 
        }
      
      ?>
       </div>
       <br>

<?php  } else if($key =='bestResult'){ 

  ?>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Best Result</h2>
 <?php
      foreach ($value as $key1 => $value1) 
      { 
        ?>
      <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Comptation:</b><?php echo $value1->nameComptation; ?></p>
      <h5 class="w3-opacity"><b>Rounds :</b> <?php echo $value1->rounds; ?></p>
      <h5 class="w3-opacity"><b>Result :</b><?php echo $value1->result; ?></p>   
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->date ;?></h6>
      <hr>
      </div> 
        <?php 
        }
      
      ?>
       </div>
       <br>
<?php
}
}
?>
<div class="w3-container w3-card w3-white">
<h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Bio</h2>
<div class="w3-container">
<?php 
foreach ($profiledata->Bio as $key => $value) 
{
?>
<h5 class="w3-opacity"><?php echo ucwords($key); ?> : <?php echo $value; ?></p>
<?php 
}
?>
 <hr>
</div>
</div>
<br>
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Latest Result</h2>
 <?php
      foreach ($profiledata->LatestResults as $key => $value1) 
      {
        ?>
  <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Competation : </b></h5><p><?php echo $value1->nameOfCompetation;?></p> 
        <h5 class="w3-opacity"><b>Detail :</b> <?php echo $value1->detail;?></p> 
      <h5 class="w3-opacity"><b>Opponent :</b> <?php echo $value1->opponent; ?></p>
      <h5 class="w3-opacity"><b>Round :</b> <?php echo $value1->round; ?></p> 
      <h5 class="w3-opacity"><b>Score :</b> <?php echo $value1->score; ?></p>  
      <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo 
        $value1->dateOfCompetation ;?></h6> 
   <hr> 
      </div> 
        <?php 
           }
      ?>
       </div>
       <br>

<?php 
}
?>
    </div>
  </div>
</div>
</div>

<?php
}
?>

<!--  <div class="row">  -->
<!--         <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-venus-double margin-r-5"></i>Gender</strong>
              <p class="text-muted">
                <?php// echo $value['gender'];?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php// echo $value['address1'];?></p>
              <p class="text-muted"><?php// echo $value['address2'];?></p>
               <p class="text-muted"><?php// echo $value['location'];?></p>
              <p class="text-muted"><?php/// echo $value['address3'];?></p>
              <hr>
              <strong><i class="fa fa-mobile margin-r-5"></i>Contact No</strong>
               <p><?php //echo $value['contact_no'];?></p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
              <button style="margin-left: 71%;" id="ebutton"><i class="fa fa-pencil margin-r-5"></i></button>
              <p><?php// echo $value['email'];?></p>
              
              <script>
              $(document).ready(function(){
                  // alert("sdg");
                 $("#activity").addClass('active');
                $("#newemail").hide();
                $("#ebutton").click(function(){
                $("#newemail").toggle();
                });
              });
               </script>
               <div id="newemail">
                <div class="form-group">
                <input type="text" class="form-control" id="updateemail" placeholder="Enter Email">
                 <input type="hidden" class="form-control" name="UserId"  id="euid" value="<?php //echo $value['userid']; ?>">
                </div><div class="form-group">
                <input type="button" class="btn btn btn-primary" id="emailsave" onclick="" value="Update" name="Update">
                </div >
              </div>
            </div>
          </div> -->
          <?php 
        }
        else { ?>
             


  

<!--     <div class="w3-third">-->
    
  <div class="w3-container w3-card w3-white">
  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>No Details Is Present</h2>

<!--   <div class="w3-container">
      <h5 class="w3-opacity"><b>Name Of Competation : </b></h5><p><?php //echo $value1->nameOfCompetation;?></p> 
        <h5 class="w3-opacity"><b>Detail : </b></h5><p><?php //echo $value1->detail;?></p> 
      <h5 class="w3-opacity"><b>Opponent : </b></h5><p><?php //echo $value1->opponent; ?></p>
      <h5 class="w3-opacity"><b>Round : </b></h5><p><?php// e//cho $value1->round; ?></p> 
      <h5 class="w3-opacity"><b>Score : </b></h5><p><?php// echo $value1->score; ?></p>  
     
   <hr> 
      </div>  -->
       </div>


<!-- </div>-->
        <?php 
      }
    }


          ?>

         <!--  </div> -->

           <!--  <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
            <h3 class="box-title">About Proffession</h3>
            </div>
            <div class="box-body">
            <strong><i class="fa fa-futbol-o margin-r-5"></i>Sport</strong>
            <p class="text-muted">
                <?php// echo $value['sport'];?>
            </p>
            <hr>
            <strong><i class="fa fa-calendar-check-o margin-r-5"></i>DOB</strong>
            <p class="text-muted"><?php //echo $value['dob'];?></p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
            <p>
            <span class="label label-danger"><?php// echo $value['prof_language'];?></span>
            <span class="label label-success"><?php// echo $value['other_skill_name'];?></span>
            <span class="label label-info"><?php// echo $value['other_skill_detail'];?></span>
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i>About Me</strong>
            <p><?php// echo $value['about_me'];?></p>
            </div>
            </div>
            </div>
 -->

           <!--  </div> -->



             
        </div>

<!-- <div class="tab-pane fade in" id="tab3"> -->































    <!--      <?php //$rating = $this->register->getrating($value['userid']);
         //  {
        //  $q1 =0; $q2=0; $q3=0; $q4=0; $q5=0; $total_rating=0; $i=0;
        //  $tq1  =0; $tq2 =0; $tq3 =0; $tq4 =0; $tq5 =0; $ttotal_rating =0;
        //  $fq1  =0; $fq2 =0; $fq3 =0; $fq4 =0; $fq5 =0; $ftotal_rating =0;
//
        //  foreach ($rating as $key => $value) 
        ///      {
         //     $i++;
          //    $q1               = $q1 + $value['q1'];
          //    $q2               = $q2 + $value['q2'];
          //    $q3               = $q3 + $value['q3'];
           //   $q4               = $q4 + $value['q4'];
           //   $q5               = $q5 + $value['q5'];
          //    $total_rating     = $total_rating + $value['total_rating'];
          //    }
         //   if($i)
         //   {
         //   $tq1 = $q1/$i; 
        //    $fq1 = $q1/$i*20;

         //   $tq2 = $q2/$i;  
          //  $fq2 = $q2/$i*20;
            
           // $tq3 = $q3/$i; 
          //  $fq3 = $q3/$i*20;
            
          //  $tq4 = $q4/$i; 
           // $fq4 = $q4/$i*20;
            
          //  $tq5 = $q5/$i; 
          //  $fq5 = $q5/$i*20;
            
          //  $ttotal_rating = $total_rating/$i; 
          //  $ftotal_rating = $total_rating/$i*20;
          //   }     
          ?> -->
<!--          <div class="col-md-6">
            <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
            <h3 class="box-title">Goal Completion</h3>
            </div>
            <div class="box-body">
            <div class="progress-group">
                    <span class="progress-text">Q1</span>
                    <span class="progress-number"><b><?php// echo $tq1 ;?></b>/5</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width:<?php// echo $fq1."%";?>"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                 <!--  <div class="progress-group">
                    <span class="progress-text">Q2</span>
                    <span class="progress-number"><b><?php// echo $tq2 ;?></b>/5</span>
                        <?php// $a=60;?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: <?php// echo $fq2.'%';?>"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                 <!--  <div class="progress-group">
                    <span class="progress-text">Q3</span>
                    <span class="progress-number"><b><?php //echo $tq3 ;?></b>/5</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width:<?php// echo $fq3.'%';?>"></div>
                    </div>
                  </div>
                   <div class="progress-group">
                    <span class="progress-text">Q4</span>
                    <span class="progress-number"><b><?php //echo $tq4 ;?></b>/5</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-blue" style="width: <?php// echo $fq4.'%';?>"></div>
                    </div>
                  </div>
                   <div class="progress-group">
                    <span class="progress-text">Q5</span>
                    <span class="progress-number"><b><?php// echo $tq5 ;?></b>/5</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php// echo $fq5.'%';?>"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">Total Rating</span>
                    <span class="progress-number"><b> <?php/// echo $ttotal_rating ;?></b>/5</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width:<?php// echo $ftotal_rating.'%';?>"></div>
                    </div>
                  </div>
            </div>
            </div>
            </div> -->  
           <!--  <?php //}?> -->



<!--         </div> -->
      </div>
    </div>
     </div>
      </div>
    </div>
    
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    </script>
<script>
  $(function () {
    
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: $('#event_graph').val(),
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Event"
      },
      {
        value: $('#job_graph').val(),
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Job"
      },
      {
        value: $('#tournament_graph').val(),
        color: "#dd4b39",
        highlight: "#dd4b39",
        label: "Tournament"
      },
      {
        value: $('#resources_graph').val(),
        color: "#5262ca",
        highlight: "#5262ca",
        label: "Resources"
      },
      {
        value: $('#Content_graph').val(),
        color: "#e08e0b",
        highlight: "#e08e0b",
        label: "Content"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
  });
</script>

<script type="text/javascript">
$(document).ready(function(){

 

var module = $("#access_module_id").val();
//alert(module);
var mod = module.split(',');
window.onload = loadData();
function loadData(){

if(mod[0]==1 ){
 $('#EVENT').prop('checked',true);
 }
if(mod[1] ==2){
 $('#TOURNAMENT').prop('checked',true);
 }
 if(mod[2] ==3){
 $('#JOB').prop('checked',true);
 }
 if(mod[3] ==4){
 $('#RESOURCES').prop('checked',true);
 }
 if(mod[4] ==5){
 $('#CONTENT').prop('checked',true);
 }
 if(mod[5]==6 ){
 $('#PERFORMANCE').prop('checked',true);
 }
 if(mod[6]==7 ){
 $('#USER_ROLE_MANAGEMENT').prop('checked',true);
 }
}

    $('#EVENT').val(mod[0]);
    $('#TOURNAMENT').val(mod[1]);
    $('#JOB').val(mod[2]);
    $('#RESOURCES').val(mod[3]);
    $('#CONTENT').val(mod[4]);
    $('#PERFORMANCE').val(mod[5]);
    $('#USER_ROLE_MANAGEMENT').val(mod[6]);

 });


$('#EVENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#EVENT").val(1);
               val=1;
          // alert(val);
        }
        else {
          var val=$("#EVENT").val(0);
               val=0;  
        }
    });

     $('#TOURNAMENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#TOURNAMENT").val(2);
               val=2;
           //alert(val);
        }
        else {
          var val=$("#TOURNAMENT").val(0);
               val=0;
            //alert(val);
        }
    });

      $('#JOB').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#JOB").val(3);
               val=3;
         // alert(val);
        }
        else {
          var val=$("#JOB").val(0);
               val=0;
          //  alert(val);
        }
    });
       $('#RESOURCES').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#RESOURCES").val(4);
               val=4;
         // alert(val);
        }
        else {
          var val=$("#RESOURCES").val(0);
               val=0;
            // alert(val);
        }
    });

        $('#CONTENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#CONTENT").val(5);
               val=5;
            //alert(val);
        }
        else {
          var val=$("#CONTENT").val(0);
               val=0;
          // alert(val);
        }
    });
     $('#PERFORMANCE').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#PERFORMANCE").val(6);
               val=6;
          //  alert(val);
        }
        else {
          var val=$("#PERFORMANCE").val(0);
               val=0;
           // alert(val);
        }
    });
     
        $('#USER_ROLE_MANAGEMENT').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#USER_ROLE_MANAGEMENT").val(7);
               val=7;
                   }
        else {
          var val=$("#USER_ROLE_MANAGEMENT").val(0);
               val=0;
            
        }
    });
</script>
<script type="text/javascript">
function myfunction(email)
{ 
    //alert(email); 
    $("#imagelodar").show();

    var id = $("#string_userid").val();
   // alert(email); 
    var data1 = {
    "email"                  :  email

};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/Passwordreset'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
      // alert("Mail has been sent");
      $.confirm({
        title: 'Congratulations!',
        content: 'Mail has been sent.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();
               //  window.location.href = url+"/forms/userprofile/" + id + "?module";
                }
            },
            close: function () {
              $("#imagelodar").hide();
                // window.location.href = url+"/forms/userprofile/" + id + "?module";
            }
        }
    });
   // window.location.href = url+"/forms/userprofile/" + id + "?module";
    }
});    
}
</script>


<script type="text/javascript">
$("#emailsave").click(function(){

var id = $("#string_userid").val();
if($("#updateemail").val())
{
var data23 = {

   "userid"  : $("#euid").val(),
   "email"   : $("#updateemail").val()
};
$("#imagelodar").show();

console.log(JSON.stringify(data23));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data23);
    $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/updateemail'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

       if(result == '1')
      {
         // $("#imagelodar").hide();
        $.confirm({
        title: 'Congratulations!',
        content: 'Email has been Updated.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/userprofile/" + id + "?module";
                }
            },
            close: function () {
                 window.location.href = url+"/forms/userprofile/" + id + "?module";
            }
        }
    });
      }
      else if(result == '0')
      {
        $.confirm({
        title: 'Sorry!',
        content: 'Email is already registered.',
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-red',
                action: function(){
                 window.location.href = url+"/forms/userprofile/" + id + "?module";
                }
            },
            close: function () {
                 window.location.href = url+"/forms/userprofile/" + id + "?module";
            }
        }
    });
      }
      else
      {
          $("#imagelodar").hide();
             $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                      }
                  },
                  close: function () {
                  }
              }
          });
      }
  }
});   
}
else
{
  $.confirm({
              title: '',
              content: 'please enter the email.',
              type: 'dark',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });
 // alert("");
} 

});
</script>
            
    