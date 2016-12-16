
<!-- <link rel="stylesheet" href="<?php // echo base_url('assets/crop/css/style.css') ?>" />
<script src="<?php //echo base_url('assets/crop/js/jquery.Jcrop.min.js')?>"></script>
<link rel="stylesheet" href="<?php //echo base_url('assets/crop/css/jquery.Jcrop.min.css')?>"/> -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/ css" media="all" />

 <script>

$(document).ready(function(){
   
$('#save').click(function(){

var summary1=$("#rsummary").val();

var summary12=summary1.toString();
var string = summary12.replace(/[\/\\'\.\"<>~{}]/g, '');

var description1=$("#rdescription").val();
var description2=description1.toString();
var description3 = description2.replace(/[\/\\<>~\{}]/g, '');
	
var data1 = {
    "id"                      : "", 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : description3, 
    "summary"                 : string,
    "keyword"                 : "",
    "status"                  : 0,
    "location"                : $("#rlocation").val(), 
    "topic_of_artical"        : $("#article").val(), 
    "image"                   : $("#photo_url").val(),
    "date_created"            : $("#date_created").val(),
	  "token"                   : $("#token").val(),
    "sport"                   : $("#sport").val()
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/SavecreateResources'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
       
    //   alert(result.response);
      

    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
  window.location.href = url+"/forms/getResources";
    }
});  
});});

</script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Create  Resources  
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
    <?php if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    <div class=" alert alert-success" id="msgdiv" >
      <strong>Info! <span id = "msg"><?php echo $msg;?></span></strong> 
    </div>
    <?php }?>
<div class="col-md-12">
      <div class="box box-primary">
       
            <!-- /.box-header -->

        
            <form>
              <div class="box-body">

            <?php
          $data=$this->session->userdata('item');
          $name=$data['userid'];
        {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $name;?>">
            </div>
        <?php }?>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="token" id="token" value="1">
                </div>

            <script>
            $(document).ready(function() {
            $('#types').change(function(){
            if($('#types').val() == 'video')
           {
            $('#abc').hide();     
            }
            if($('#types').val() == 'text')
            {
             $('#abc').show();
            }
            });
            });
            </script>
             <div class="form-group">
            
                      <label for="exampleInputEmail1">Resource Type</label>
                     <select  id="types" class="form-control" >
                     <option >-Select-</option> 
                     <option value="text">Text</option>
                     <option value="video">Video</option>
                     </select>
              </div >

               <?php
              
                date_default_timezone_set("Asia/Kolkata");
             {
              ?>

              <div class="form-group">
                  <input type="hidden" class="form-control" name="date_created" id="date_created" value= "<?php  echo date("Y-m-d h:i:sa");?>">
                </div>
                  <?php
                  }?>



                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" maxlength="50" name="rtitle" id="rtitle" placeholder="Enter title">
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Summary</label>
                   <textarea class="form-control" maxlength="308" name="summary" id="rsummary" placeholder="Place some text here(Maximum 308 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div id="rem"></div>

            <script>
            document.getElementById('rsummary').onkeyup = function () {
            document.getElementById('rem').innerHTML = "Characters left: " + (308 - this.value.length);
                };
            </script>
                
                

           <div class="form-group" id="abc">
           <label for="exampleInputEmail1">Description</label>
                   <textarea class="form-control" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter Location">
                </div>
<!-- 
              <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                   
                  <div>
                   <select id="location" name="location" style="width:700px;"><?php //echo $value['location']; ?>
                   </select>
                      </div>
                   </div> -->
               <!--  <div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                  <input type="text" class="form-control" name="keyword" id="rkeyword" placeholder="Enter title" value="<?php //echo $value['keyword']; ?>">
                </div> -->



                <div class="form-group">
                     <label for="eventtype">Topic Of The Article</label>
                     <select id="article" class="form-control" name="topic_of_artical">
                     <option value="">- Select -</option> 
                     <option value ="Jobs">Jobs </option>
                     <option value ="Tournaments">Tournaments</option>
                      <option value="Event">Event</option> 
                     <option value ="news_aticle">News Aticle </option>
                     <option value ="t&k">Training & Knowledge</option>
                      <option value ="other">Other</option>
                     </select>
                  </div>




                <div class="form-group">
                        <?php  $sports = $this->register->getSport();?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" name="sport">
                        <option ></option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div>



         
         <!--  <div class="container">
        <div class="content">
            <span class="upload_btn" onclick="show_popup('popup_upload')">Click to upload photo</span>
            <div id="photo_container">
            </div>
             
        </div>
    </div> -->

       <!--  <div id="popup_crop">
        <div class="form_crop">
            <span class="close" onclick="close_popup('popup_crop')">x</span>
            <h2>Crop photo</h2>
            This is the image we're attaching the crop to
            <img id="cropbox" />  
            This is the form that our event handler fills 
           
                <input type="hidden" id="x" />
                <input type="hidden" id="y"/>
                <input type="hidden" id="w"/>
                <input type="hidden" id="h"/>
                <input type="hidden" id="photo_url"  name="image"/>
                <input type="button" value="Crop Image" id="crop_btn" onclick="crop_photo()"/>
            
        </div>
    </div> -->
                <!-- <div id="message"></div> -->
         <!--  <script>
            document.getElementById('crop_btn').onfocus = function () {
              var d=$('#crop_btn').val();
              if(d!="")
              {
            document.getElementById('message').innerHTML = "Image Successfully Uploaded";
               }
                };
            </script> -->
            <!--   </div> -->
              <!-- /.box-body -->

            </form>




      <form name="multiform" id="multiform" action="<?php echo site_url('forms/imageupload'); ?>" method="POST" enctype="multipart/form-data">
               Image : <input type="file" name="file" id="file" />

               <div class="form-group">
                  <input type="hidden" class="form-control" name="oldimageid" id="pid" value="0">
                </div>
          </form>
               <input  type="button" id="multi-post" value="Submit Image"></input>

              <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img> 

               <input type="hidden" class="form-control" name="photo" id="photo_url"> 



              <div id="mess" hidden>Image Uploded</div>



         <!-- <form role="form" enctype='multipart/form-data' id="form_resource"  action="<?php// echo site_url('forms/imageupload'); ?>"   method="post">

               <div class="form-group">
                  <label for="file">File input</label>
                  <input type="file" id="file" name="file" accept="image/*">
                  <p class="help-block">Upload image file only.</p>
                </div>
            <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save1" onclick="" value="Submit Image" name="Create">
              </div> 
      </form> -->
       <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Create">
              </div>
 <!-- <script>
                
              $('#save').click(function(){
                if($('#photo_url').val() =="")
                         {
                        if(!confirm("Do you want to continue without uploading the photo"))
                                          {
                                            return false;
                                          }
                     
                       }

});

</script>
 -->
   <!--  <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload photo</h2>
            <form action="<?php // echo base_url('assets/crop/upload_photo.php')?>" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()">
                <input type="file" name="photo" id="photo" class="file_input">
                <div id="loading_progress"></div>
                <input type="submit" value="Upload photo" id="upload_btn">
            </form>
            <iframe name="upload_frame" class="upload_frame"></iframe>
        </div>
    </div> -->

          </div>
    </div>
    
</div>
</div>
</section>

</div>


<script type="text/javascript">
$(document).ready(function(){
 
$("#multiform").submit(function(e)
{
    $('#loader_img').show();

    var formObj = $(this);
    var formURL = formObj.attr("action");

if(window.FormData !== undefined)  
    {
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data:  formData,
            dataType: 'json',
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                $('#loader_img').hide();
                $('#mess').show();
                $("#photo_url").val(data.response);   
            }
                  
       });
        e.preventDefault();
        e.unbind();
   }
});


$("#multi-post").click(function()
    {
    //sending form from here
    $("#multiform").submit();
});
});

</script>


<!-- <script >
var TARGET_W = 1112;
var TARGET_H = 640;

// show loader while uploading photo
function submit_photo() {
  // display the loading texte
  $('#loading_progress').html('<img src="<?php //echo base_url('/assets/crop/images/loader.gif')?>"> Uploading your photo...');
}

// show_popup : show the popup
function show_popup(id) {
  // show the popup
  $('#'+id).show();
}

// close_popup : close the popup
function close_popup(id) {
  // hide the popup
  $('#'+id).hide();
}

// show_popup_crop : show the crop popup
function show_popup_crop(url) {
   //  alert(url);

     var purl="<?php// echo base_url('/assets/crop/');?>";
  // change the photo source
  $('#cropbox').attr('src',purl+'/'+url);
  //alert(purl+'/'+url);
  // change the photo source
  //$('#cropbox').attr('src', url);
  // destroy the Jcrop object to create a new one
  //alert(url);

  try {
    jcrop_api.destroy();
  } catch (e) {
    // object not defined
  }
  // Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
    $('#cropbox').Jcrop({
      aspectRatio: TARGET_W / TARGET_H,
      setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
      onSelect: updateCoords
    },function(){
        jcrop_api = this;
    });

    // store the current uploaded photo url in a hidden input to use it later
 $('#photo_url').val(url);

  // hide and reset the upload popup
  $('#popup_upload').hide();
  $('#loading_progress').html('');
  $('#photo').val('');

  // show the crop popup
  $('#popup_crop').show();
}

// crop_photo : 
function crop_photo() {
  var x_ = $('#x').val();
  var y_ = $('#y').val();
  var w_ = $('#w').val();
  var h_ = $('#h').val();
  var photo_url_ = $('#photo_url').val();
 
  // hide thecrop  popup
  $('#popup_crop').hide();

  // display the loading texte
  $('#photo_container').html('<img src="<?php// echo base_url('/assets/crop/images/loader.gif')?>"> Processing...');
  // crop photo with a php file using ajax call
  $.ajax({
   url: "<?php //echo base_url('/assets/crop/crop_photo.php')?>",
    type: 'POST',
    data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
    success:function(data){

       // var purl="<?php //echo base_url('/assets/crop/');?>";
       // var value=purl+'/'+data;
      // display the croped photo
      $('#photo_container').html(data);
    }
  });
}


// updateCoords : updates hidden input values after every crop selection
function updateCoords(c) {
  $('#x').val(c.x);
  $('#y').val(c.y);
  $('#w').val(c.w);
  $('#h').val(c.h);
}
</script> -->

 <style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/
  
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
  
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
            }
        </style>
          
        <script type="text/javascript">
        $(this).ready( function() {
            $("#rlocation").autocomplete({
                minLength: 1,

                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo site_url('forms/getCityName'); ?>",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                            else
                            {
                              alert("Choose Currect City Name");
                              $("#rlocation").val("");
                            }
                        },
                    });
                }
                
            });
        });
        </script>
