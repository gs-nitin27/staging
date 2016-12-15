<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Getsporty | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/default.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"></head>
<body>
 <div class="pre-loader">
        <div class="load-con">
            <img src="<?php echo base_url('img/logo.png');?>" class="animated fadeInDown" alt=""> 
        </div>
    </div>


  <div class = "container">
	<div class="wrapper">
		<form action="<?php echo site_url('forms/login'); ?>" method="post" name="Login_Form" class="form-signin">  
		  <h3 class="form-signin-heading">Sign In</h3>
			<hr class="colorgraph"><br>
			<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
			<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
			<button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
		</form>		
    <div id="error_text"><h3 style="text-align: center;color: red"><?php echo $this->session->flashdata('error'); ?></h2></div>	
	</div>
</div>
</body>
</html>